<?php

namespace App\Repositories;

use App\Models\Chapter;
use App\Repositories\BaseRepository;

class ChapterRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'chapterTitle',
        'content',
        'chapterNumber'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Chapter::class;
    }
}
