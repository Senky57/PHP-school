<?php

    require "assets/databse.php";
    require "assets/zak.php";

    $connection = connectionDB();

    if ( isset($_GET["id"]) and is_numeric($_GET["id"])) {  //tahleta lajna je hrozně důležitá ohledně URL adresy, aby se nám v tom nikdo nehrabal. Zkrátka: Lepší bezpečnost
    $students = getStudentData($connection, $_GET["id"]);
    }

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
    <title>Individuální žák</title>
</head>
<body>
<?php require "assets/header.php"; ?>

    <main>
        <section class="main-heading">
            <h1>Informace o žákovi</h1>
        </section>

        <section>
            
            <?php if($students === null): ?>
                <p>Žák nenalezen</p>
            <?php else: ?>
                <h2><?php echo htmlspecialchars($students["first_name"]). " " .
                               htmlspecialchars($students["second_name"]) ?></h2>
                <p>Věk: <?= htmlspecialchars($students["age"]) ?></p>
                <p>Dodatečné info: <?= htmlspecialchars($students["life"]) ?></p>
                <p>Kolej: <?= htmlspecialchars($students["college"]) ?></p>
            <?php endif ?>
        </section>
        
        <section class="buttons">
                <a href="editace-zaka.php?id=<?= $students['id']?>">Editovat</a>
                <a href="delete-student.php?id=<?php echo $students["id"]?>">Vymazat</a>
        </section>
    </main>

    <?php require "assets/footer.php"; ?>
    
</body>
</html>