<?php 
class TimeHelper 
{
    public static function getDateNDaysBack($n)
{
    $currentDate = new DateTime(); // Get the current date
    $targetDate = clone $currentDate; // Clone the current date to modify it

    // Calculate the timestamp 'n' days ago
    $targetDate->sub(new DateInterval("P{$n}D"));

    return $targetDate;
}

public  static function getDateNMonthsBack($n)
{
    $currentDate = new DateTime(); // Get the current date
    $targetDate = clone $currentDate; // Clone the current date to modify it

    // Calculate the target month after subtracting 'n' months
    $targetDate->sub(new DateInterval("P{$n}M"));
    return $targetDate;
}
public static function startDate($timerange)
{
    if ($timerange == 'today') {
        $startDate = new DateTime();
         $startDate->setTime(0, 0, 0);
    } elseif ($timerange == '5days') {
        $startDate =TimeHelper::getDateNDaysBack(5);
    } elseif ($timerange == '10days') {
        $startDate = TimeHelper::getDateNDaysBack(10);
    } elseif ($timerange == '1month') {
        $startDate = TimeHelper::getDateNMonthsBack(1);
    } elseif ($timerange == '2months') {
        $startDate = TimeHelper::getDateNMonthsBack(2);
    } elseif ($timerange == '3months') {
        $startDate =TimeHelper::getDateNMonthsBack(3);
    }
    return $startDate;
}
}