<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'avatar', 'is_admin',
        'membership_status', 'membership_plan', 'membership_expires_at',
        'stripe_customer_id', 'billing_address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'membership_expires_at' => 'datetime',
        'billing_address' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->membership()->create([
                'plan' => 'free',
                'status' => 'active',
                'started_at' => now(),
                'expires_at' => null,
            ]);
        });
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    public function orderItems()
    {
        return $this->hasManyThrough(OrderItem::class, Order::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'user_favorites')->withTimestamps();
    }

    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        $initials = '';
        
        if (count($names) >= 2) {
            $initials = strtoupper($names[0][0] . $names[1][0]);
        } else {
            $initials = strtoupper(substr($this->name, 0, 2));
        }
        
        return $initials;
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/avatars/' . $this->avatar);
        }
        
        $colors = ['#7B1B1B', '#0A1A44', '#1B5E20', '#4A148C', '#B71C1C'];
        $color = $colors[crc32($this->name) % count($colors)];
        
        return "https://ui-avatars.com/api/?name=" . urlencode($this->name) . 
               "&color=FFFFFF&background=" . substr($color, 1) . 
               "&size=128&bold=true&format=svg";
    }

    public function getHasPremiumMembershipAttribute()
    {
        if (!$this->membership_expires_at) return false;
        return $this->membership_status === 'premium' && $this->membership_expires_at->isFuture();
    }

    public function getMembershipDaysRemainingAttribute()
    {
        if (!$this->membership_expires_at || !$this->has_premium_membership) return 0;
        return now()->diffInDays($this->membership_expires_at, false);
    }

    public function upgradeToPremium($planType = 'monthly', $expiryDate = null)
    {
        if (!$expiryDate) {
            $expiryDate = $planType === 'yearly' ? now()->addYear() : now()->addMonth();
        }

        $this->update([
            'membership_status' => 'premium',
            'membership_plan' => $planType,
            'membership_expires_at' => $expiryDate
        ]);

        $this->membership()->updateOrCreate(
            ['user_id' => $this->id],
            [
                'plan' => 'premium-' . $planType,
                'status' => 'active',
                'started_at' => now(),
                'expires_at' => $expiryDate,
            ]
        );

        return $this;
    }

    public function cancelMembership()
    {
        $this->update([
            'membership_status' => 'cancelled',
            'membership_expires_at' => now()
        ]);

        $this->membership()->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);

        return $this;
    }

    public function getDiscountPercentage()
    {
        return $this->has_premium_membership ? 10 : 0;
    }

    public function applyDiscount($price)
    {
        return $this->has_premium_membership ? $price * 0.9 : $price;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords(strtolower($value));
    }
}