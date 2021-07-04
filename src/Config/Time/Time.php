<?php

namespace App\Config\Time;

class Time
{
    public function frenchSchedule()
    {
        date_default_timezone_set('Europe/Paris');
        $hourFr = date("g:i a");
        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        $dateFr = strftime("%A %d %B");
        $year = strftime("%Y");
        return $dateFr . ' ' . $hourFr . ' ' . $year;
    }
}
