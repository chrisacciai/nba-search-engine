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
            $sql = "SELECT name FROM Vendor ORDER BY name";
            $result = mysqli_query($con,$sql);
            echo "<table class='table-center' style='margin-top: -222px'>
            <thead>
                <tr>
                    <th>Vendor Name</th>
                </tr>
            </thead>";
            // Print the data from the table row by row
            while($row = mysqli_fetch_array($result)) {
                echo "<tr><td>". $row['name'] ."</td></tr>";
            }
            echo "</table>";
            mysqli_close($con);
        ?>
    </body>
</html>
