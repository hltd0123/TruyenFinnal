<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    public $fillable = [
        'name',
        'description',
        'status'
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'status' => 'integer'
    ];

    public static array $rules = [
        'name' => 'required'
    ];

    
}
