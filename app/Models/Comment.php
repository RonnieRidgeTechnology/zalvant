<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'comment',
        'status',
        'website',
    ];

    /**
     * The user who posted the comment (nullable if guest).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The blog post that this comment belongs to.
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }
}
