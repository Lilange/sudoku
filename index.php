<?php

$numb = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$row = $numb;
shuffle($row);
$grille = [];

//découpe ma ligne en trois goupe
$l1 = array_slice($row, 0, 3);
$l2 = array_slice($row, 3, 3);
$l3 = array_slice($row, 6, 3);

//boucle qui permet de changer ma ligne en déplacent mes groupes
// ou mon groupe en déplacent mes cellules
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

//boucle qui permet de mettre le tableau multidimentionel dans un tableau
for ($index = 0; $index < count($grille); $index++) {
    if ($index == 0) {
        $sudokuTemp = array_merge($grille[$index]);
    } else {
        $sudokuTemp += array_merge($sudokuTemp, $grille[$index]);
    }
}

//recupere au hasard les index qui seront retirer compris entre 47 et 53 nombres
$remplacement = array_rand($sudokuTemp, rand(47, 53));

//boucle permet de retirer les chiffres du tableu
for ($index1 = 0; $index1 < count($remplacement); $index1++) {
    $sudokuTemp[$remplacement[$index1]] = "";
}

$sudoku = array_chunk($sudokuTemp, 9);
$grilleJson = json_encode((object) $grille);
$sudokuJson = json_encode((object) $sudoku);

echo $grilleJson . "\r\n";
echo $sudokuJson;
