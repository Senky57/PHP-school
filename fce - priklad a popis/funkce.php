<?php

/**
 * Popis studenta
 * 
 * @param je prostě parametr
 * @param string $first_name 
 * @param string $second_name
 * @param integer $age
 * 
 * @return string popis studenta
 * 
 * První u vytvoření fce je PARAMETR 
 * a
 * Druhé u použití je ARGUMENT
 */

// Vytvoření funkce
function studentDescription($first_name, $second_name, $age){
    return "Toto je " . $first_name . " " . $second_name . ". Věk studenta je " . $age . " let.";
}


// Použití
echo studentDescription("Harry", "Potter", 15);
echo studentDescription("Ron", "Weasley", 14);
echo studentDescription("Hermiona", "Grangerová", 15);
echo $student;
