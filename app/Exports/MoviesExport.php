<?php

namespace App\Exports;

use App\User;
use App\Movie;
use Maatwebsite\Excel\Concerns\FromCollection;

class MoviesExport
 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Movie::all();
    }
}
