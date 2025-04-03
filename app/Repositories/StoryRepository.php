<?php

namespace App\Repositories;

use App\Models\Story;
use App\Repositories\BaseRepository;

class StoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Story::class;
    }
}
