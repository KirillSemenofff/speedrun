<?php

function changeTime($userTime, $city1, $time1, $time2, $city2, $city3, $time3)
{
    if (!preg_match('~[a-z]+~i', $userTime) and !preg_match('~[A-Z]+~i', $userTime) and $userTime > 0 and strlen($userTime) == 5) {
        $date = date_create($userTime);
        echo 'Time:' . PHP_EOL . "$city1 - " . $userTime . PHP_EOL;
        date_modify($date, $time1);
        echo "$city2 - " . date_format($date, 'H:i') . PHP_EOL;
        date_modify($date, $time2);
        date_modify($date, $time3);
        echo "$city3 - " . date_format($date, 'H:i') . PHP_EOL;
    } else {
        echo 'Uncorrectly enter time' . PHP_EOL;
    }
}

function getTime()
{
    echo 'Choose your city: Moscow, Omsk, Samara' . PHP_EOL;
    echo 'Enter your city: ';
    $city = readline();
    echo 'Enter your time: ';
    $userTime = readline();
    $excep = explode(':', $userTime);
    if ($excep[0] >= 24 or $excep[1] >= 60) {
        echo "Don't do this" . PHP_EOL;
    } else {

        if ($city == 'Moscow') {
            changeTime($userTime, 'Moscow', '+3 hours', '-3 hours', 'Omsk', 'Samara', '+2 hours');
        } elseif ($city == 'Omsk') {
            changeTime($userTime, 'Omsk', '-3 hours', '+3 hours', 'Moscow', 'Samara', '-1 hours');
        } elseif ($city == 'Samara') {
            changeTime($userTime, 'Samara', '-2 hours', '+2 hours', 'Moscow', 'Omsk', '+1 hours');
        } else {
            echo "$city isn't the city in array" . PHP_EOL;
        }
    }
}

do {
    getTime();
} while (
    true);