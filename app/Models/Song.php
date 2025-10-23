<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'album', 'duration', 'file_path', 
        'cover_image', 'description', 'lyrics', 'stream_count'
    ];

    protected $casts = [
        'stream_count' => 'integer'
    ];

    public function getAudioUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }

    public function getCoverUrlAttribute()
    {
        return asset('storage/' . $this->cover_image);
    }

    public function incrementStreamCount()
    {
        $this->increment('stream_count');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('stream_count', 'desc');
    }

    public function scopeFromAlbum($query, $album)
    {
        return $query->where('album', $album);
    }
}