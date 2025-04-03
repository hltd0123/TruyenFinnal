<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $table = 'authors';

    public $fillable = [
        'name',
        'bio',
        'status',
        'userId'
    ];

    protected $casts = [
        'name' => 'string',
        'bio' => 'string',
        'status' => 'integer',
        'userId' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required'
    ];

    public function stories()
    {
        return $this->hasMany(Story::class, 'author_id'); // assuming story has 'author_id'
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
