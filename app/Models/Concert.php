<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'venue', 'date', 'city', 'country',
        'ticket_url', 'image', 'description', 'status'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function getFormattedDateAttribute()
    {
        return $this->date->format('F j, Y');
    }

    public function getFormattedTimeAttribute()
    {
        return $this->date->format('g:i A');
    }

    public function getLocationAttribute()
    {
        return $this->venue . ', ' . $this->city . ', ' . $this->country;
    }

    public function getStatusBadgeAttribute()
    {
        $statuses = [
            'upcoming' => 'primary',
            'ongoing' => 'success', 
            'completed' => 'secondary',
            'cancelled' => 'danger'
        ];

        return $statuses[$this->status] ?? 'secondary';
    }

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now())->where('status', 'upcoming');
    }

    public function scopePast($query)
    {
        return $query->where('date', '<', now())->orWhere('status', 'completed');
    }
}