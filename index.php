<?php
require('vendor/autoload.php');

$A = [1, 3, 6, 4, 1, 2, 5, 8, 7];
$A = [-1, -3, 6, 4, 0, 1, 2, 7];

function solutionA($A)
{

    // no values, 1 is the answer
    if (
        !is_array($A) ||
        empty($A)
    ) {
        return 1;
    }

    // get only positive values
    $positiveValues = array_filter($A, function ($item) {
        return $item > 0;
    });

    // we have no positive values in the array, the answer is 1
    if (empty($positiveValues)) {
        return 1;
    }

    // get unique values
    $uniquePositiveValues = array_unique($positiveValues);

    // sorted in ascending order
    // also resets the keys
    sort($uniquePositiveValues);

    // the lowest number is greater than 1, the answer is 1
    if (min($uniquePositiveValues) > 1) {
        return 1;
    }

    foreach ($uniquePositiveValues as $key => $value) {
        // compare our key + 1, against the value, if it doesn't match we've got a missing value
        $check = $key + 1;

        if ($check != $value) {
            return $check;
        }
    }

    // we made it this far, we don't have any gaps
    // the answer is the count of our values + 1
    return count($uniquePositiveValues) + 1;
}

function solutionB($A)
{
    $target = range(1, 1000000);

    $diff = array_diff($target, $A);

    return reset($diff);
}

$resA = solutionA($A);
echo $resA;
echo "\n";
echo "\n";

$resB = solutionB($A);
echo $resB;
echo "\n";
echo "\n";
