<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comments';

    public $fillable = [
        'id',
        'content',
        'status',
        'userId',
        'storyId',
        'chapterId',
    ];

    protected $casts = [
        'content' => 'string',
        'status' => 'integer',
        'userId' => 'integer',
        'storyId' => 'integer',
        'chapterId' => 'integer|null'
    ];

    public static array $rules = [
        'content' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function story()
    {
        return $this->belongsTo(Story::class, 'storyId');
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class, 'chapterId');
    }
}
