<?php
/**
 * Challenge 1: Reverse Words in a String
 * Reverse the order of words in a string without using built-in reverse functions
 */

// Input: "Hello world from PHP"
// Output: "PHP from world Hello"

function reverseWords($str): array
{
    $exploded = explode(" ", $str);
    $reversed = [];
    for ($i = count($exploded) - 1; $i >= 0; $i--) {
        $reversed[] = $exploded[$i];
    }
    return $reversed;
}


print_r(reverseWords("Hello world from PHP"));
echo PHP_EOL;


/**
 * Challenge 2: Find the First Non-Repeating Character
 * Return the first character in a string that does not repeat.
 */

// Input: "programming"
// Output: "p"

function firstNonRepeatingChar($str)
{
    $strLen = strlen($str);
    $occurences = [];
    for ($i = 0; $i < $strLen; $i++) {

        $char = $str[$i];
        if (isset($occurences[$char])) {
            $occurences[$char]++;
        } else {
            $occurences[$char] = 1;
        }
    }

    for ($i = 0; $i < $strLen; $i++) {
        $char = $str[$i];
        if ($occurences[$char] === 1) {
            return $char;
        }
    }

    return null;
}

print_r(firstNonRepeatingChar("programming"));
echo PHP_EOL;


/**
 * Merge Overlapping Intervals
 * Merge all overlapping intervals in an array of interval pairs.
 * Input: [[1,3], [2,6], [8,10], [15,18]]
 * Output: [[1,6], [8,10], [15,18]]
 */
function mergeIntervals($intervals)
{
    // If the array is empty or has only one interval, return it as is
    if (count($intervals) <= 1) {
        return $intervals;
    }

    // Sort intervals by start time
    usort($intervals, function ($a, $b) {
        return $a[0] - $b[0];
    });

    $result = [];
    $currentInterval = $intervals[0];

    for ($i = 1; $i < count($intervals); $i++) {
        $nextInterval = $intervals[$i];

        if ($currentInterval[1] >= $nextInterval[0]) {
            $currentInterval[1] = max($currentInterval[1], $nextInterval[1]);
        } else {
            $result[] = $currentInterval;
            $currentInterval = $nextInterval;
        }
    }
    $result[] = $currentInterval;
    return $result;
}

$intervals = [[1, 3], [2, 6], [8, 10], [15, 18]];
$merged = mergeIntervals($intervals);
print_r($merged);

echo PHP_EOL;




