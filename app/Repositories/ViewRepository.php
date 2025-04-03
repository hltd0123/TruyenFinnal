<?php

namespace App\Repositories;

use App\Models\View;
use App\Repositories\BaseRepository;

class ViewRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return View::class;
    }
}
