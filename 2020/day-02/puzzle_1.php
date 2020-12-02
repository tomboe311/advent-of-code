<?php
/**
 * Advent of code
 *
 * Part 1
 * @url https://adventofcode.com/2020/day/2
 */

$contents = explode("\n", file_get_contents("input"));

$passwords = [];
foreach ($contents as $content) {
  array_push($passwords, explode(": ", $content));
}

$sum = 0;
foreach ($passwords as $key => $password) {
  $credentials = explode(" ", $password[0]);
  $count = substr_count($password[1], $credentials[1]);
  $limits = explode('-', $credentials[0]);

  // possible solution 1
  if ($limits[0] <= $count && $count <= $limits[1]) {
    //$sum++;
  }
  // possible solution 2
  if (filter_var($count, FILTER_VALIDATE_INT, array('options' => array ('min_range' => $limits[0], 'max_range' => $limits[1],)))) {
    //$sum++;
  }

  // possible solution 3
  if (in_array($count, range($limits[0], $limits[1]))) {
    $sum++;
  }
}

echo $sum;
