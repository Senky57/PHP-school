<?php

// XSS - cross-site scripting
require "assets/databse.php";
// require "assets/url.php";
require "assets/zak.php";

$first_name = null;
$second_name = null;
$age = null;
$life = null;
$college = null;

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $age = $_POST["age"];
    $life = $_POST["life"];
    $college = $_POST["college"];

    $connection = connectionDB();

    createStudent($connection, $first_name, $second_name, $age, $life, $college);

    


        // var_dump($sql);
        // exit;

        // $result = mysqli_query($connection, $sql);

        // if($result === false){
        //     echo mysqli_error($connection);
        // } else {
        //     $id = mysqli_insert_id($connection);
        //     echo "Úspěšně vložen žák s id: $id";
        // }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://kit.fontawesome.com/358f1af4e2.js" crossorigin="anonymous"></script>
    <title>Přidat žáka</title>
</head>
<body>
    <?php require "assets/header.php"; ?>

    <main>
        <section class="add-form">
        
        <?php require "assets/formular-zak.php" ?>

        </section>
    </main>


    <?php require "assets/footer.php"; ?>
    
</body>
</html>