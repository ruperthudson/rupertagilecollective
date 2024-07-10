<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>
        <?php
            echo 'Hey ' . htmlspecialchars($_POST["firstname"]);
        ?>
    </title>
</head>
<body>
    <p><?php

    echo 'Hello ' . htmlspecialchars($_POST["firstname"]) . ' ' . htmlspecialchars($_POST["secondname"]) . '!';

    ?></p>
</body>
</html>