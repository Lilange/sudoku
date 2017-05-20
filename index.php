<?php

$numb = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$row = $numb;
shuffle($row);
$grille = [];
$l1 = array_slice($row, 0, 3);
$l2 = array_slice($row, 3, 3);
$l3 = array_slice($row, 6, 3);
for ($i = 0; $i < 9; $i++) {
    $grille[$i] = array_merge($l1, $l2, $l3);
    $temp = $l1;
    $l1 = array_replace($l1, $l2);
    $l2 = array_replace($l2, $l3);
    $l3 = array_replace($l3, $temp);
    if ($i % 3 > 1) {
            $switchL1 = array_shift($l1);
            array_push($l1, $switchL1);
            $switchL2 = array_shift($l2);
            array_push($l2, $switchL2);
            $switchL3 = array_shift($l3);
            array_push($l3, $switchL3);
    }
}

echo rand(1, 9);