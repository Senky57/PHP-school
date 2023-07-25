<?php

    require "assets/databse.php";
    require "assets/zak.php";

    // echo "Úspěšné vložení klobásy";

   $connection = connectionDB();

   $students = getAllStudents($connection, "id, first_name, second_name");
 
    // var_dump($students);
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
    <title>Žáci</title>
</head>
<body>
    <?php require "assets/header.php"; ?>

    <main>
        <section class="main-heading">
            <h1>Seznam žáků školy</h1>
        </section>

        <section class="student-list">
            
            <?php if(empty($students)): ?>
                <p>Nic nebylo zalezeno</p>
            <?php else: ?>
                <ul>
                    <?php foreach($students as $one_student): ?>
                        <li>
                            <?php echo htmlspecialchars($one_student["first_name"]). " " .
                            htmlspecialchars($one_student["second_name"])?>
                        </li>
                        <a href="jedenzak.php?id=<?= $one_student
                        ["id"] ?>">Více informací</a>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>  
            <a href="index.php">Zpětná úvodní strana</a> 
        </section>
    </main>

    <?php require "assets/footer.php"; ?>
</body>
</html>