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
            
            $username = strval($_GET['username']);
            $password = strval($_GET['password']);
            
            $sql = $con -> prepare("SELECT * FROM Users WHERE username = ? AND password = ?");
            $sql -> bind_param("ss", $username, $password);
            $sql -> execute();
            $result = $sql -> get_result();
            if ($result -> num_rows == 0){
                echo "fail";
            }
            else{
                echo "success";
            }
            
            mysqli_close($con);
            
        ?>
    </body>
</html>

