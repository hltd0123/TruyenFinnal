<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    public $table = 'views';

    public $fillable = [
        'viewed_at',
        'status',
        'userId',
        'storyId',
        'chapterId'
    ];

    protected $casts = [
        'status' => 'integer',
        'userId' => 'integer',
        'storyId' => 'integer',
        'chapterId' => 'integer'
    ];

    public static array $rules = [
        
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
