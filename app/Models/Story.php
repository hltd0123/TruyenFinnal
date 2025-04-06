<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public $table = 'stories';

    public $fillable = [
        'title',
        'description',
        'coverImage',
        'status',
        'authorId',
        'categoryId'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'coverImage' => 'string',
        'status' => 'boolean',
        'authorId' => 'integer',
        'categoryId' => 'integer'
    ];

    public static array $rules = [
        'title' => 'required'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'authorId');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'storyId');
    }
}
