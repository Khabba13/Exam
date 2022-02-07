<?php

function num_temp($temperature_values_per_second){
    if ($temperature_values_per_second < 18)

        $heat_gear_first = ["name" => "Engine One", "is_off" => true, "current_temperature" => 18];

    return $heat_gear_first;

};
if ($temperature_values_per_second <= null)
    $heat_gear_second = ["name" => "Engine Two", "is_off" => true, "current_temperature" => null];


$temperature_values_per_second = range(-35, 50);

num_temp();

// Надо больше практикрваться и не упускать занятия (
