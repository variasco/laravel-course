<?php

namespace App\Exports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    public function collection()
    {
        return (new News)->getAll();
    }
}
