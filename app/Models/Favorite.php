<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $table = 'favorites';

    public $fillable = [
        'status',
        'userId',
        'storyId'
    ];

    protected $casts = [
        'status' => 'integer',
        'userId' => 'integer',
        'storyId' => 'integer'
    ];

    public static array $rules = [
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Truyện liên quan
     */
    public function story()
    {
        return $this->belongsTo(Story::class, 'storyId');
    }
}
