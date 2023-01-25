<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    use HasFactory;

    protected $fillable = [
        'sign',
        'description',
        'date'
    ];

    public function sign()
    {
        return $this->belongsTo(Sign::class);
    }

    public static function getSign($date)
    {
        $newDate = new DateTime($date);
        $monthDay = $newDate->format('2001-m-d');

        switch ($monthDay) {
            case $monthDay >= date('Y-m-d', strtotime('2001-03-21')) && $monthDay <= date('Y-m-d', strtotime('2001-04-19')):
                return 'aries';
            case $monthDay >= date('Y-m-d', strtotime('2001-04-20')) && $monthDay <= date('Y-m-d', strtotime('2001-05-20')):
                return 'taurus';
            case $monthDay >= date('Y-m-d', strtotime('2001-05-21')) && $monthDay <= date('Y-m-d', strtotime('2001-06-22')):
                return 'gemini';
            case $monthDay >= date('Y-m-d', strtotime('2001-06-22')) && $monthDay <= date('Y-m-d', strtotime('2001-07-22')):
                return 'cancer';
            case $monthDay >= date('Y-m-d', strtotime('2001-07-23')) && $monthDay <= date('Y-m-d', strtotime('2001-08-22')):
                return 'leo';
            case $monthDay >= date('Y-m-d', strtotime('2001-08-23')) && $monthDay <= date('Y-m-d', strtotime('2001-09-22')):
                return 'virgo';
            case $monthDay >= date('Y-m-d', strtotime('2001-09-23')) && $monthDay <= date('Y-m-d', strtotime('2001-10-23')):
                return 'libra';
            case $monthDay >= date('Y-m-d', strtotime('2001-10-24')) && $monthDay <= date('Y-m-d', strtotime('2001-11-21')):
                return 'scorpio';
            case $monthDay >= date('Y-m-d', strtotime('2001-11-22')) && $monthDay <= date('Y-m-d', strtotime('2001-12-21')):
                return 'sagittarius';
            case $monthDay >= date('Y-m-d', strtotime('2000-12-22')) && $monthDay <= date('Y-m-d', strtotime('2001-01-19')):
                return 'capricorn';
            case $monthDay >= date('Y-m-d', strtotime('2001-01-20')) && $monthDay <= date('Y-m-d', strtotime('2001-02-18')):
                return 'aquarius';
            case $monthDay >= date('Y-m-d', strtotime('2001-02-19')) && $monthDay <= date('Y-m-d', strtotime('2001-03-20')):
                return 'pisces';
        }
    }

}
