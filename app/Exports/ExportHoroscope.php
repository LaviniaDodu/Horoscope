<?php

namespace App\Exports;

use App\Models\Horoscope;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportHoroscope implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Horoscope::select('id', 'description', 'date', 'sign')->get();
    }
}
