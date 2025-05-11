<?php
/**
 * Problem 1: Reverse an Array
 * Task: Write a function that takes an array and returns the reversed version of that array.
 *
 * 🔹 Example:
 * Input:  [1, 2, 3, 4, 5]
 * Output: [5, 4, 3, 2, 1]
 * 🧠 Constraints:
 * Don’t use array_reverse().
 *
 * You can use loops.
 *
 * Bonus: Try doing it in-place (without creating a new array) if you feel confident
 */


function reverseArray(array $array)
{
    $arrayCount = count($array);

    $reversedArray = [];

    for ($i = $arrayCount - 1; $i >= 0; $i--) {
        $reversedArray[] = $array[$i];
    }

    return $reversedArray;
}

print_r(reverseArray([1, 2, 3, 4, 5]));
echo PHP_EOL;


/**
 * 1. Print Numbers from 1 to N
 * Write a function that takes a number n and prints numbers from 1 to n.
 */

function printNToNumbers(int $n)
{
    for ($i = 1; $i <= $n; $i++) {
        echo $i;
    }
}

print_r(printNToNumbers(6));
echo PHP_EOL;


/**
 * 2. Print Even Numbers from 1 to N
 * Print all even numbers from 1 to n.
 */

function printNevenNumbers(int $n)
{
    for ($i = 0; $i <= $n; $i += 2) {
        echo $i;
    }
}

print_r(printNevenNumbers(6));
echo PHP_EOL;


/**
 * 3. Print Multiplication Table of a Number
 * Given a number n, print its multiplication table from 1 to 10.
 */


function printMultiplicationTable(int $n)
{
    for ($i = 0; $i <= 10; $i++) {
        echo $i * $n;
    }
}

print_r(printMultiplicationTable(6));
echo PHP_EOL;

/**
 * 4. Factorial of a Number
 * Write a function to compute the factorial of a number using a for loop.
 *
 * 📌 Example:
 * Input: 5 → Output: 120
 */
function factorial(int $n)
{
    $factorial = 1;
    for ($i = 1; $i <= $n; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

print_r(factorial(5));
echo PHP_EOL;

/**
 * 5. Sum of Digits of a Number
 * Write a function to find the sum of the digits of a given number.
 *
 * 📌 Example:
 * Input: 123 → Output: 6 (1+2+3)
 */

function sumOfDigits(int $digits): int
{
    $sum = 0;;
    $d = strval($digits);
    for ($i = 0; $i < strlen($d); $i++) {
        $sum += (int)$d[$i];
    }

    return $sum;

}

print_r(sumOfDigits(123));
echo PHP_EOL;

/**
 * 6. Print Star Pattern (Right Triangle)
 * For input n, print:
 */

function nStarPattern(int $n)
{
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo '*';
        }
        echo PHP_EOL;
    }
}


print_r(nStarPattern(3));
echo PHP_EOL;


/**
 * Inverted Right Triangle Star Pattern
 * // For input n = 4, print:
 * // ****
 * // ***
 * // **
 * // *
 */

function nStarPatternReverse(int $n)
{
    for ($i = $n; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo '*';
        }
        echo PHP_EOL;
    }
}

print_r(nStarPatternReverse(3));

echo PHP_EOL;


//Array Loops, array_map, array_filter, array_reduce
/**
 * 🔁 1. Double the Numbers
 * Write a function that doubles every number in the array.
 * // Input: [1, 2, 3]
 * // Output: [2, 4, 6]
 */

$s = [1, 2, 3];
$doubledNumbers = array_map(function ($v) {
    return $v * 2;
}, $s);

print_r($doubledNumbers);
echo PHP_EOL;


/**
 * 2. Filter Even Numbers
 * Write a function that filters out only the even numbers from the array.
 * Input: [1, 2, 3, 4, 5]
 * Output: [2, 4]
 */
$input = [1, 2, 3, 4, 5];
$evenNumbers = array_filter($input, function ($i) {
    return $i % 2 === 0;
});

print_r($evenNumbers);
echo PHP_EOL;

/**
 * 3. Sum of All Elements
 * Use array_reduce to get the sum of all values in the array.
 * Input: [1, 2, 3, 4]
 * Output: 10
 */
$input = [1, 2, 3, 4];

$sum = array_reduce($input, function ($carry, $item) {
    echo "Carry " . $carry . "\n";
    echo "Item " . $item . "\n";
    return $carry + $item;
});

print_r($sum);
echo PHP_EOL;

/**
 * 💯 4. Square Only Even Numbers
 * Filter the even numbers and then square them.
 * Input: [1, 2, 3, 4]
 * Output: [4, 16]
 */

function sqOnlyEvens(array $input)
{
    $evenNumbers = array_filter($input, function ($i) {
        return $i % 2 === 0;
    });
    $sqNumbers = array_map(function ($i) {
        return $i * $i;
    }, $evenNumbers);

    return $sqNumbers;

}

$input = [1, 2, 3, 4, 5];
print_r(sqOnlyEvens($input));
echo PHP_EOL;


// Array Manipulations and logic

/**
 * 8. Flatten a Multidimensional Array
 * Write a function that flattens a 2D array into a single array.
 * Input: [[1, 2], [3, 4], [5]]
 * Output: [1, 2, 3, 4, 5]
 */

function flatten2DArray(array $array)
{
    $flat = [];
    foreach ($array as $key => $value) {
        foreach ($value as $k => $v) {
            $flat[] = $v;
        }
    }
    return $flat;
}


$input = [[1, 2], [3, 4], [5]];
print_r(flatten2DArray($input));
echo PHP_EOL;


/**
 * 9. Count Occurrences of Each Value
 * Write a function to count how many times each number appears.
 * Input: [1, 2, 2, 3, 3, 3]
 * Output:
 * [
 * 1 => 1,
 * 2 => 2,
 * 3 => 3
 * ]
 */

function findOccurencesOfNumber(array $input)
{
    $occurences = [];
    foreach ($input as $key => $value) {
        if (isset($occurences[$value])) {
            $occurences[$value]++;
        } else {
            $occurences[$value] = 1;
        }
    }

    return $occurences;
}


$input = [1, 2, 2, 3, 3, 3];
print_r(findOccurencesOfNumber($input));

echo PHP_EOL;

/**
 * 10. Get Unique Values Without array_unique()
 * Write a function that returns only the unique values from an array without using array_unique.
 * Input: [1, 2, 2, 3, 4, 4]
 * Output: [1, 2, 3, 4]
 */


function uniques(array $arr)
{
    $uniques = [];
    foreach ($arr as $value) {
        if (!in_array($value, $uniques)) {
            $uniques[] = $value;
        }
    }
    return $uniques;
}


$input = [1, 2, 2, 3, 4, 4];

print_r(uniques($input));
echo PHP_EOL;


/**
 * 11. Capitalize First Letter of Each Word
 * Input: ["hello", "world", "php"]
 * Output: ["Hello", "World", "Php"] G
 */


$input = ["hello", "world", "php"];
print_r(array_map('ucfirst', $input));
echo PHP_EOL;

/**
 * 12. Filter Strings Longer Than 3 Characters
 * Input: ["hi", "world", "ok", "chatgpt"]
 * Output: ["world", "chatgpt"]
 */
$input = ["hi", "world", "ok", "chatgpt"];
$a = array_filter($input, function ($i) {
    return strlen($i) > 3;
});

print_r($a);
echo PHP_EOL;


/**
 * 13. Count Total Characters in All Strings
 * Input: ["a", "bc", "def"]
 * Output: 6 (1 + 2 + 3)
 */
$input = ["a", "bc", "def"];
$b = array_reduce($input, function ($carry, $item) {
    return $carry + strlen($item);
}, 0);
print_r($b);
echo PHP_EOL;


/**
 * 14. Convert Temperatures from Celsius to Fahrenheit
 * Use formula F = C * 9/5 + 32
 * Input: [0, 10, 20, 30]
 * Output: [32, 50, 68, 86]
 */
$input = [0, 10, 20, 30];
$convertTemp = array_map(function ($i) {
    return $i * 9 / 5 + 32;
}, $input);

print_r($convertTemp);
echo PHP_EOL;


/**
 * 15. Find the Longest String
 * Input: ["a", "abc", "abcd", "ab"]
 * Output: "abcd"
 */
$input = ["a", "abc", "abcd", "ab"];

$longest = array_reduce($input, function ($carry, $item) {
    return strlen($item) > strlen($carry) ? $item : $carry;
}, '');

print_r($longest);
echo PHP_EOL;


/**
 * 16. Negate Numbers
 * Write a function that negates all the numbers in an array (turn positive to negative and vice versa).
 * Input: [1, -2, 3, -4] → Output: [-1, 2, -3, 4]
 */
$input = [1, -2, 3, -4];
$negatedNumbers = array_map(function ($i) {
    return -$i;
}, $input);

print_r($negatedNumbers);
echo PHP_EOL;

/**
 * 17. Remove Empty Strings
 * Filter out all empty strings ("") and strings with only spaces from an array.
 * Input: ["hello", "", " ", "world"] → Output: ["hello", "world"]
 */

$input = ["hello", "", " ", "world"];

$removedEmptyStrings = array_filter($input, function ($i) {
    return !empty(trim($i));
});

print_r(array_values($removedEmptyStrings));
echo PHP_EOL;

/**
 * 18. Multiply All Even Numbers
 * From a list of numbers, multiply all the even numbers together.
 * Input: [2, 3, 4, 5] → Output: 8 (2 * 4)
 */

$input = [2, 3, 4, 5];

$evenNumbers = array_filter($input, function ($i) {
    return $i % 2 === 0;
});


$multipliedEvenNumbers = array_reduce(array_values($evenNumbers), function ($carry, $item) {
    return $carry * $item;
}, 1);

print_r($multipliedEvenNumbers);
echo PHP_EOL;

/**
 * 19. Make Words Uppercase
 * Capitalize all words in the array using strtoupper.
 * Input: ["php", "is", "fun"] → Output: ["PHP", "IS", "FUN"]
 */
$input = ["php", "is", "fun"];


$upperdCase = array_map('strtoupper', $input);
print_r($upperdCase);
echo PHP_EOL;


/**
 * 20. Count How Many Strings Are Uppercase
 * From an array of strings, count how many are completely uppercase.
 * Input: ["HELLO", "World", "PHP", "fun"] → Output: 2
 */
$input = ["HELLO", "World", "PHP", "fun"];
$upperdCase = array_filter($input, function ($i) {
    return strtoupper($i) === $i;
});
print_r(count($upperdCase));
echo PHP_EOL;


/**
 * 21. Normalize Numbers
 * Normalize all numbers in an array so they range between 0 and 1.
 *
 * Formula: (x - min) / (max - min)
 * Input: [10, 20, 30]
 * Output: [0, 0.5, 1]
 */
$input = [10, 20, 30];
$min = min($input);
$max = max($input);
$normalizedNumbers = array_map(function ($i) use ($min, $max) {
    return ($i - $min) / ($max - $min);
}, $input);

print_r($normalizedNumbers);
echo PHP_EOL;

/**
 * 22. Remove Duplicates Without array_unique
 * Write a function that removes duplicate values from an array without using array_unique().
 * // Input: [1, 2, 2, 3, 4, 4, 4]
 * // Output: [1, 2, 3, 4]
 */
$input = [1, 2, 2, 3, 4, 4, 4];
$uniques = [];

$removedDuplicatedNumbers = array_filter($input, function ($i) use (&$uniques) {
    if (in_array($i, $uniques)) {
        return false;
    }
    $uniques[] = $i;
    return true;
});

print_r($removedDuplicatedNumbers);
echo PHP_EOL;


/**
 * 23. Count Frequency of Each Element
 * Create a frequency map from an array of elements
 * // Input: ["apple", "banana", "apple", "apple", "banana", "cherry"]
 * // Output: ["apple" => 3, "banana" => 2, "cherry" => 1]
 */

$input = ["apple", "banana", "apple", "apple", "banana", "cherry"];
$seen = [];

//foreach ($input as $key => $value) {
//    if (isset($seen[$value])) {
//        $seen[$value]++;
//    } else {
//        $seen[$value] = 1;
//    }
//}

$seen = array_reduce($input, function ($carry, $item) {
    $carry[$item] = ($carry[$item] ?? 0) + 1;
    return $carry;
}, []);
print_r($seen);
echo PHP_EOL;

/**
 * Write a function using array_reduce() that takes an array of strings and returns the longest string in the array.
 * Input: ["cat", "hippopotamus", "dog", "elephant"]
 * Output: "hippopotamus"
 */
$input = ["cat", "hippopotamus", "dog", "elephant"];
$longesString = array_reduce($input, function ($carry, $item) {
    echo "Carry: " . $carry . "\n";
    echo "Item: " . $item . "\n";

    return strlen($item) > strlen($carry) ? $item : $carry;
}, '');

print_r($longesString);
echo PHP_EOL;
echo PHP_EOL;


/**
 * Challenge 24: Consecutive Sum Check
 * Write a function that checks if any two consecutive numbers in the array sum up to a given target.
 * // Input: [1, 3, 5, 2, 7], target = 9
 * // Output: true (because 2 + 7 = 9)
 * // */

$input = [1, 3, 5, 2, 7];
$target = 9;
$checksSum = false;

for ($i = 0; $i < count($input) - 1; $i++) {
    if ($input[$i] + $input[$i + 1] === $target) {
        $checksSum = true;
        break;
    }
}
var_dump($checksSum);
echo PHP_EOL;


/**
 * Challenge 25: Group by First Letter
 * Group a list of words by their first letter into an associative array.
 * [
 * "a" => ["apple", "apricot", "avocado"],
 * "b" => ["banana", "blueberry"],
 * "c" => ["cherry"]
 * ]
 */
$input = ["apple", "banana", "apricot", "cherry", "blueberry", "avocado"];

$grouped = [];
foreach ($input as $key => $value) {
    $firstLetter = $value[0];
    if (!isset($grouped[$firstLetter])) {
        $grouped[$firstLetter] = [];
    }
    $grouped[$firstLetter][] = $value;
}


print_r($grouped);
echo PHP_EOL;


/**
 * Challenge 25: Palindrome Checker for Array of Words
 * Write a function that takes an array of words and returns only the ones that are palindromes (i.e., read the same backward as forward).
 * Output: ["level", "radar", "madam"]
 */

$input = ["level", "world", "radar", "hello", "madam"];

$palindromes = array_filter($input, function ($i) {
    $normalized = strtolower(str_replace(" ", "", trim($i)));
    return $normalized === strrev($normalized);
});


print_r(array_values($palindromes));
echo PHP_EOL;

/**
 * Challenge 26: Matrix Diagonal Sum
 * You are given a 2D square matrix (an array of arrays). Write a function to compute the sum of both diagonals.
 * Output: 1 + 5 + 9 (main diagonal) + 3 + 5 + 7 (anti-diagonal) = 30
 * But if the matrix has an odd length, make sure not to double-count the middle element (5 in this case).
 */
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

function sumMatrixDiag($matrix)
{
    $matrixLength = count($matrix);
    $sum = 0;

    for ($i = 0; $i < $matrixLength; $i++) {
        $sum += $matrix[$i][$i];
        $sum += $matrix[$i][$matrixLength - 1 - $i];
    }

    if ($matrixLength % 2 == 1) {
        $middleIndex = floor($matrixLength / 2);
        $sum -= $matrix[$middleIndex][$middleIndex];
    }

    return $sum;
}

print_r(sumMatrixDiag($matrix));
echo PHP_EOL;


/**
 * Challenge 26: Flatten a Nested Array
 * Write a function that flattens a multi-dimensional array into a single-dimensional one.
 * Output: [1, 2, 3, 4, 5, 6, 7]
 */
$input = [1, [2, 3], [4, [5, 6]], 7];

function flattenAnyArray(array $array)
{
    $flat = [];

    foreach ($array as $value) {
        if (is_array($value)) {
            $flat = array_merge($flat, flattenAnyArray($value));
        } else {
            $flat[] = $value;
        }
    }

    return $flat;
}


print_r(flattenAnyArray($input));
echo PHP_EOL;


/**
 * Challenge 26: Longest Word in Sentence
 * Write a function that finds the longest word in a given sentence.
 * Ignore punctuation and assume words are separated by spaces.
 */
$string = "The quick brown fox, jumped over the lazy dog!";
function longestString(string $string)
{
    $normalizedString = explode(" ", str_replace(['/', '.', '"', "'", ",", "!"], "", strtolower($string)));
    $longest = "";

    foreach ($normalizedString as $word) {
        if (strlen($word) > strlen($longest)) {
            $longest = $word;
        }
    }
    return $longest;
}

print_r(longestString($string));
echo PHP_EOL;


/**
 * Challenge 27: Anagram Checker
 * Write a function that checks if two strings are anagrams of each other (i.e., contain the same letters in different orders).
 *
 */

$str1 = "listen";
$str2 = "silent";

function checkTwoStringsAnagram(string $str1, string $str2)
{
    $is_anagram = false;
    $normalize = function ($str) {
        $str = strtolower($str);
        $str = preg_replace("/[^a-z]/", "", $str);
        $chars = str_split($str);
        sort($chars);
        return implode('', $chars);
    };

    return $normalize($str1) === $normalize($str2);
}

print_r(checkTwoStringsAnagram($str1, $str2));
echo PHP_EOL;


/**
 * Challenge 28: Group Anagrams
 * Task: Write a function that groups anagrams from a list of words.
 * output = [
 * ["listen", "silent", "enlist"],
 * ["google", "gooegl"],
 * ["abc", "cab"]
 * ]
 */

$input = ["listen", "silent", "enlist", "google", "gooegl", "abc", "cab"];

function groupAnagrams(array $words): array
{
    $groups = [];
    foreach ($words as $word) {
        $chars = str_split(strtolower($word));
        sort($chars);
        $key = implode('', $chars);

        $groups[$key][] = $word;
    }
    return array_values($groups);
}

print_r(groupAnagrams($input));
echo PHP_EOL;