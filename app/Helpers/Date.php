<?php
 
 namespace App\Helpers;

 use DatePeriod;
 use DateTime;
 use DateInterval;
 
 class Date
 {
     public static function range($start, $end, $interval = 'PT30M')
     {
         return new DatePeriod(
             new DateTime($start), new DateInterval($interval), new DateTime($end)
         );
     }

     public static function frequencies()
     {
         return [
             'daily' => 'Every day',
             'weekly' => 'Every week',
             'monthly' => 'Every month',
             'yearly' =>  'Every year'
         ];
     }

     public static function days()
     {
         return[
            1 => "Sunday",
            2 => "Monday",
            3 => "Tuesday",
            4 => "Wednesday",
            5 => "Thursday",
            6 => "Friday",
            7 => "saturday"
         ];
     }

     public static function ordinal($value)
     {
         $ends = ['th', 'st', 'nd', 'rd', 'th', 'th','th','th','th','th'];

         if((($value % 100)>= 11) && (($value %100)<=13))
         {
             return $value. 'th';
         }
         return $value. $ends[$value %10];
     }
 }


