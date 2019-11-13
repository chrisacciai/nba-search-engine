<!doctype html>

<html lang="en">
    <head>
        <link rel="stylesheet" href="./stylesheet.css">
    </head>
    <body>
        <?php
            include_once("./library.php"); // To connect to the database
            $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
            // Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $arena_id = strval($_GET['arena_id']);
            $name = strval($_GET['name']);
            $city = strval($_GET['city']);
            $state = strval($_GET['state']);
            $capacity = strval($_GET['capacity']);
            $sql = "INSERT INTO Merchandise(arena_id, name, city, state, capacity) VALUES ('$arena_id', '$name', '$city', '$state', $capacity";
            $result = mysqli_query($con,$sql);
            echo $sql; 
            mysqli_close($con);
        ?>
    </body>
</html>
