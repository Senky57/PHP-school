<?php

require "assets/databse.php";
require "assets/zak.php";

$connection = connectionDB();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    deleteStudent($connection, $_GET["id"]);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Smazat žáka</title>
</head>
<body>
    <?php require "assets/header.php";?>

    <main>
        <section class="delete-form">
            <form method="POST" >
                <p>Jste si jisti, že chcete danýho žáka smazat?</p>
                <button>Smazat</button>
                <a href="jedenzak.php?id=<?= $_GET['id']?>">Zrušit</a>
            </form>
        </section>
    </main>
    
    <?php require "assets/footer.php";?>

</body>
</html>