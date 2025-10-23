<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'user_id', 'total', 'status', 'customer_info',
        'shipping_address', 'payment_method', 'payment_proof', 'notes'
    ];

    protected $casts = [
        'customer_info' => 'array',
        'shipping_address' => 'array',
        'total' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }

    public function getCustomerNameAttribute()
    {
        return $this->customer_info['name'] ?? 'N/A';
    }

    public function getCustomerEmailAttribute()
    {
        return $this->customer_info['email'] ?? 'N/A';
    }

    public function getShippingAddressTextAttribute()
    {
        if (!$this->shipping_address) return 'N/A';
        
        $address = $this->shipping_address;
        return implode(', ', array_filter([
            $address['street'] ?? '',
            $address['village'] ?? '',
            $address['district'] ?? '',
            $address['city'] ?? '',
            $address['province'] ?? '',
            $address['postal_code'] ?? ''
        ]));
    }

    public function getStatusBadgeAttribute()
    {
        $statuses = [
            'pending' => 'warning',
            'processing' => 'info',
            'completed' => 'success',
            'cancelled' => 'danger'
        ];

        return $statuses[$this->status] ?? 'secondary';
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function markAsCompleted()
    {
        $this->update(['status' => 'completed']);
        return $this;
    }

    public function markAsCancelled()
    {
        $this->update(['status' => 'cancelled']);
        return $this;
    }
}