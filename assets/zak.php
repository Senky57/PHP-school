<?php

require "url.php";
/**
 * 
 * Získá jednoho žáka z databáze podle ID
 * 
 * @param object $connection- napojení na databázi
 * @param integer $id - id jednoho konkrétního žáka
 * 
 * @return mixed asociativní pole, které obsahuje informace o konkrétním žákovi nebo vráti null, pokud žák nebyl nalezen
 */

function getStudentData($connection, $id, $columns = "*"){
    $sql = "SELECT $columns 
            FROM student
            WHERE id= ?";


    $stmt = mysqli_prepare($connection, $sql);

    if(!$stmt){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_array($result, MYSQLI_ASSOC);

        }
    }
}

/**
 * 
 * Updatuje informace o žákovi v databázi
 * 
 * @param object $connection - napojení na databázi
 * 
 * @param string $first_name - křestní jméno žáka
 * @param string $second_name - přijmení žáka
 * @param integer $age - věk žáka
 * @param string $life - informace o žákovi
 * @param string $college - kolej žáka
 * @param integer $id - id žáka
 * 
 * @return void
 */

function updateStudent($connection, $first_name, $second_name, $age, $life, $college, $id){

    $sql = "UPDATE student 
                    SET first_name = ?,
                        second_name = ?,
                        age = ?,
                        life = ?,
                        college =?
                    WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if(!$stmt){
        echo mysqli_error($connection);

    } else{
        mysqli_stmt_bind_param($stmt, "ssissi", $first_name, $second_name, $age, $life, $college, $id);

        if(mysqli_stmt_execute($stmt)){


            redirectUrl("/www2databaze/jedenzak.php?id=$id");

        }
    }

}

/**
 * 
 * 
 * Vymaže studenta z databáze podle daného ID
 * 
 * @param object $connection - propojení s databází
 * @param integer $id - id daného žáka
 * 
 * @return void  //Proč? No protože nic nevrací
 */

function deleteStudent($connection, $id){
    $sql = "DELETE
            FROM student
            WHERE id= ?";

    $stmt = mysqli_prepare($connection, $sql);

    if(!$stmt){
        echo mysqli_error($connection);

    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if(mysqli_stmt_execute($stmt)){
            redirectUrl("/www2databaze/zaci.php");
        }
    }
}

/**
 * 
 * 
 * Vrátí všechny žáky v databázi
 * 
 * @param object $connection - připojení do databáze
 * 
 * @return array pole objektů, kde každý objekt je jeden žák
 */
function getAllStudents($connection){

    $sql = "SELECT * FROM student";

    $result = mysqli_query($connection, $sql);

    if($result === false){
        echo mysqli_error($connection);
    }else{
        $allstudents = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $allstudents;
    }
}

/**
 * 
 * 
 * Přidání žáka do databáze a přesměruje nás na profil žáka
 * 
 * @param object $connection - připojení do databáze
 * 
 * @param string $first_name - křestní jméno žáka
 * @param string $second_name - přijmení žáka
 * @param integer $age - věk žáka
 * @param string $life - informace o žákovi
 * @param string $college - kolej žáka
 * @param integer $id - id žáka
 * 
 * @return void
 */


    function createStudent($connection, $first_name, $second_name, $age, $life, $college){

        $sql = "INSERT INTO student (first_name, second_name, age, life, college) 
    VALUES (?, ?, ?, ?, ?)";

        

        $statement = mysqli_prepare($connection, $sql);

        if($statement === false){
            echo mysqli_error($connection);
        }else{
            mysqli_stmt_bind_param($statement, "ssiss", $first_name, $second_name, $age, $life, $college);

            if(mysqli_stmt_execute($statement)) {
                $id = mysqli_insert_id($connection);
                // echo "Úspěšně vložen žák s id: $id";

                redirectUrl("/www2databaze/jedenzak.php?id=$id");

            }else{
                echo mysqli_stmt_error($statement);
            }
        }
    }
    

?>