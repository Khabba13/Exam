<?php
function validateInt($time)
{
    if (!is_int($time)){
        return "ERROR! The type must be an integer";
    }
    return "OK! 200. The type is integer";
}

function validateMin($time, $min_value)
{
    if ($time <= $min_value){
        return "ERROR! The time should not be less min_value";
    }
    return "OK! 200. The time is not less than the minimum";
}

function validateMax($time, $max_value){
    if ($time >= $max_value){
        return  "The time should not be longer max_value";
    }
    return "OK! 200. The time is not more than the maximum";
}

function validateBox($value, $value_2)
{
    $x1 = 100;
    $x2 = 200;
    $y1 = 100;
    $y2 = 200;
    if ($value <= $x1 && $value >= $x2) {
        return "ERROR! latitude Outside in box";
    }
    if ($value_2 <= $y1 && $value_2 >= $y2) {
        return "ERROR! longitude Outside in box";
    }
    return "OK! 200. You are inside the desired range";
}



function validateCalculate($time)
{
    $v = 1490;
    $h = ($v*$time)/2;
    return "The depth of the ocean is equal to ".$h . " meters";
}

function validate($rules, $request)
{
    $message = [];
    $rules_in_array = explode("|", $rules);
    foreach ($rules_in_array as $rule)
    {
        $value =  explode(":", $rule);
        $parameters = array_slice($value, 1);
        if (count($value)==1){
            array_push($message, call_user_func_array("validate".ucfirst($value[0]), [$request]));
        }else{
            array_push($message, call_user_func_array("validate".ucfirst($value[0]), [$request, ...$parameters]));
        }
    }
    return $message;
}

function index($request)
{

    $rules = "int|min:100|max:300|box:23.22:24.21|calculate";
    $messages = validate($rules, $request);

    return count($messages)
        ? implode("<br>", $messages)
        : 'No Validation messages';
}

$request = 200;
echo index($request);