<?php

include "./Stack.php";


/**
 * Challenge: Valid Parentheses
 * Given a string containing just the characters '(', ')', '{', '}', '[', ']', determine if the input string is valid.
 *
 * A string is valid if:
 * Open brackets are closed by the same type of brackets.
 *
 * Open brackets are closed in the correct order.
 */


function isParenthesisValid($string)
{

  $stack = [];

  $map = [
    ')' => '(',
    ']' => '[',
    '}' => '{',
  ];

  for ($i = 0; $i < strlen($string); $i++) {
    $char = $string[$i];

    if (isset($map[$char])) {

      if (empty($stack) || array_pop($stack) !== $map[$char]) {
        return false;
      }
    } else {
      $stack[] = $char;
    }
  }
  return empty($stack);
}

print_r(isParenthesisValid("([{}])"));
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


/**
 * Problem 2: Remove Adjacent Duplicates
 * Statement:
 * Given a string, repeatedly remove adjacent pairs of the same character. Return the final string.
 * removeDuplicates("abbaca") => "ca"
 */

$input = "abbaca";

function removeDuplicates(string $string)
{
  $stack = [];
  for ($i = 0; $i < strlen($string); $i++) {

    $c = $string[$i];

    if (!empty($stack) && end($stack) === $c) {
      array_pop($stack);
    } else {

      $stack[] = $string[$i];
    }
  }

  return implode(',', $stack);
}

print_r(removeDuplicates($input));
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


/**
 * Check for Duplicate Brackets
 * Problem Statement:
 * Given a string containing brackets and algebraic expressions, check if it contains duplicate brackets.
 * Duplicate bracket means an empty or unnecessary pair — like this:
 *
 * "((a+b))" → has duplicate brackets around a+b
 *
 * "(a+(b)/c)" → valid
 *
 * "((a))" → has duplicate
 *
 * hasDuplicateBrackets("(a + b)")       => false
 *
 * hasDuplicateBrackets("((a + b))")     => true
 *
 * hasDuplicateBrackets("(a + (b) + c)") => true
 *
 * hasDuplicateBrackets("(a + b) + c")   => false
 *
 */

function hasDuplicateBrackets(string $string)
{

  $stack  = new Stack();

  $normalizedString = str_replace(' ', '', $string);

  for ($i = 0; $i < strlen($normalizedString); $i++) {

    $c = $normalizedString[$i];

    if ($c === ')') {
      $top = $stack->pop();
      $hasContent = false;

      while ($top !== '(') {
        $hasContent = true;

        if ($stack->isEmpty()) {
          break;
        }

        $top = $stack->pop();
      }

      if (!$hasContent) {
        return true;
      }
    } else {
      $stack->push($c);
    }
  }
  return false;
}

print_r(hasDuplicateBrackets("(a + b)"));

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


/**
 * Challenge: Next Greater Element (NGE)
 *
 * Given an array of integers, for each element, find the next greater element to its right. If no such element exists, return -1 for that position.
 *
 *
 *
 * Input: [4, 5, 2, 10]
 *
 * Output: [5, 10, 10, -1]
 *
 * Explanation:
 *
 * 4 → next greater is 5
 *
 * 5 → next greater is 10
 *
 * 2 → next greater is 10
 *
 * 10 → no greater → -1
 */


function nextGreaterNumber(array $arr)
{

  $result = array_fill(0, count($arr), -1);
  $stack = [];
  $n = count($arr);


  for ($i = $n - 1; $i >= 0; $i--) {


    $current = $arr[$i];

    echo $current . PHP_EOL;

    while (!empty($stack) && $stack[count($stack) - 1] < $current) {
      array_pop($stack);
    }


    if (!empty($stack)) {
      $result[$i] = $stack[count($stack) - 1];
    }

    $stack[] = $current;
  }
  // return $stack;

  return $result;
}
$input = [4, 5, 2, 10];
print_r(nextGreaterNumber($input));

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


/**
 * Next Smaller Element to the Right
 * Just like Next Greater Element, but now you find the next smaller element on the right
 *
 * Given an array of integers, for each element, find the next smaller element to its right. If none exists, return -1.
 *
 * Input: [4, 8, 5, 2, 25]
 * Output: [2, 5, 2, -1, -1]
 */

function nextSmallerElement(array $arr)
{
  $result = array_fill(0, count($arr), -1);

  $stack = [];

  for ($i = count($arr) - 1; $i >= 0; $i--) {

    while (!empty($stack) && $stack[count($stack) - 1] >= $arr[$i]) {
      array_pop($stack);
    }

    if (!empty($stack)) {
      $result[$i] = $stack[count($stack) - 1];
    }

    $stack[] = $arr[$i];
  }



  return $result;
}

$input = [4, 8, 5, 2, 25];
print_r(nextSmallerElement($input));

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


/**
 * Reverse a String Using Stack
 * Given a string, reverse it using a stack (no built-in strrev() or array_reverse).
 *
 * Input: "hello"
 *
 * Output: "olleh"
 */

$input = "hello";

function reverseStringUsingStack(string $string)
{
  $stack = [];

  for ($i = 0; $i < strlen($string); $i++) {
    $stack[] = $string[$i];
  }

  $reversed = "";

  while (!empty($stack)) {
    $reversed .= array_pop($stack);
  }


  return $reversed;
}
print_r(reverseStringUsingStack($input));
echo PHP_EOL;


/**
 * Check if Stack is Palindrome
 * Problem Statement:
 *
 * Use a stack to reverse the string.
 * Compare the original string with the reversed version.
 * If both are equal → it's a palindrome.
 */

function isPalindromeUsingStack(string $str)
{
  $stack =  [];


  for ($i = 0; $i < strlen($str); $i++) {
    $stack[] = $str[$i];
  }

  $reversed = "";

  while (!empty($stack)) {
    $reversed .= array_pop($stack);
  }

  return $reversed === $str;
}

print_r(isPalindromeUsingStack("madam"));

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;


/**
 * Check for Balanced Parentheses
 * Write a function to check if all the opening and closing parentheses in a string are balanced.
 * Only consider: ( and   )
 * Input: "(a + b) + (c + d)"    → Output: true
 *
 * Input: "((a + b)"             → Output: false
 */

function isBalancedParentheses(string $str): bool
{
  $stack = [];

  for ($i = 0; $i < strlen($str); $i++) {
    $char = $str[$i];

    if ($char === '(') {
      print_r($stack);
      $stack[] = $char;
    }

    if ($char === ')') {
      if (empty($stack)) return false;
      array_pop($stack);
    }
  }

  return empty($stack);
}


var_dump(isBalancedParentheses('(a + b) + (c + d)'));
var_dump(isBalancedParentheses('((a + b)'));

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;



/**
 * Check for Balanced Brackets (All Types)
 * Write a function that checks if an expression with multiple types of brackets is balanced.
 * Handle:
 * ()
 * {}
 * []
 *
 * Input: "{[()]}"          → Output: true
 * Input: "{[(])}"          → Output: false
 * Input: "({[a + b]})"     → Output: true
 * Input: "((a + b) + [c)"  → Output: false
 */


function isBalancedBrackets(string $str)
{
  $stack = [];

  $map = [
    ')' => '(',
    '}' => '{',
    ']' => '[',
  ];

  for ($i = 0; $i < strlen($str); $i++) {

    $char = $str[$i];

    if (in_array($char, array_values($map))) {
      $stack[] = $char;
    }

    if (in_array($char, array_keys($map))) {

      if (empty($stack)) return false;

      $top = array_pop($stack);

      if ($top !== $map[$char]) {
        return false;
      }
    }
  }
  return empty($stack);
}

var_dump(isBalancedBrackets("({[a + b]})"));

echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
