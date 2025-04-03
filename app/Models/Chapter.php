<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public $table = 'chapters';

    public $fillable = [
        'chapterTitle',
        'content',
        'chapterNumber',
        'status'
    ];

    protected $casts = [
        'chapterTitle' => 'string',
        'content' => 'string',
        'chapterNumber' => 'integer',
        'status' => 'integer'
    ];

    public static array $rules = [
        'chapterTitle' => 'required',
        'content' => 'required',
        'chapterNumber' => 'required|min:1'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class, 'storyId');
    }
}
