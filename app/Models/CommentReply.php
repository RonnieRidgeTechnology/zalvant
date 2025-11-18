<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment_id',
        'message',
        'name',
        'email',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
