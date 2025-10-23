<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'plan', 'status', 'started_at', 
        'expires_at', 'cancelled_at', 'price', 'payment_method'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'expires_at' => 'datetime',
        'cancelled_at' => 'datetime',
        'price' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
                    ->where(function($q) {
                        $q->whereNull('expires_at')
                          ->orWhere('expires_at', '>', now());
                    });
    }

    public function scopeExpired($query)
    {
        return $query->where('status', 'expired')
                    ->orWhere(function($q) {
                        $q->where('status', 'active')
                          ->where('expires_at', '<', now());
                    });
    }

    public function scopePremium($query)
    {
        return $query->where('plan', 'like', 'premium%');
    }

    public function getIsActiveAttribute()
    {
        return $this->status === 'active' && 
               (!$this->expires_at || $this->expires_at->isFuture());
    }

    public function getIsPremiumAttribute()
    {
        return strpos($this->plan, 'premium') === 0;
    }

    public function getDaysRemainingAttribute()
    {
        if (!$this->expires_at) return null;
        return now()->diffInDays($this->expires_at, false);
    }

    public function cancel()
    {
        $this->update([
            'status' => 'cancelled',
            'cancelled_at' => now()
        ]);
        return $this;
    }

    public function renew($period = 'month')
    {
        $expiry = $period === 'year' ? now()->addYear() : now()->addMonth();
        $this->update([
            'status' => 'active',
            'expires_at' => $expiry,
            'cancelled_at' => null
        ]);
        return $this;
    }
}