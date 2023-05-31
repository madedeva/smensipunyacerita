<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curhat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'cerita',
        'status',
        'feedback',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
