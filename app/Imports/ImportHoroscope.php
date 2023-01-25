<?php

namespace App\Imports;

use App\Models\Horoscope;
use DateTime;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportHoroscope implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ini_set('max_execution_time', 600);
        return new Horoscope([
            'description' => $row[1],
            'date' => date('Y-m-d H:i:s' , strtotime($row[2])),
            'sign' => $row[3],
        ]);
    }
}
