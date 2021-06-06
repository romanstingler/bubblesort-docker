<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405);
    exit;
}

$headers = getallheaders();

if (!array_key_exists('Secret', $headers) || $headers['Secret'] != 'R4Nd0M') {
    http_response_code(403);
    exit;
}

$input = file_get_contents("php://input");
$data = validateInput($input);

//return bubbleSort($data);
echo(implode(',', bubbleSort($data)));


function validateInput($input)
{
    $data = json_decode($input);
    // Sanity checks
    // * valid Json
    // * key 'value' has been provided
    // * 'value' is an array
    // * all elements are int
    // return <int>array from 'values' if valid
    if (json_last_error() != JSON_ERROR_NONE
        || empty($data->values)
        || !is_array($data->values)
        || !array_reduce($data->values, function ($result, $item) {
            return $result && is_int($item);
        }, true)
    ) {
        http_response_code(422);
        exit;
    }

    return $data->values;
}


function bubbleSort(&$input)
{
    $size = sizeof($input);

    for ($i = 0; $i < $size; $i++) {
        $swapped = false;
        for ($j = 0; $j < $size - $i - 1; $j++) {
            if ($input[$j] < $input[$j + 1]) {
                $t = $input[$j];
                $input[$j] = $input[$j + 1];
                $input[$j + 1] = $t;
                $swapped = true;
            }
        }

        if ($swapped === false)
            break;
    }
    return $input;
}


