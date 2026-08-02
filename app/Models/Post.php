<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'document',
        'user_id',
    ];

    // Relation : Un article appartient à un utilisateur (administrateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
