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
            $vendor = strval($_GET['vendor']);
            $sort = strval($_GET['sort']);
            if ($vendor == "all"){
                $sql = "SELECT item_id, type, name, price FROM Vendor NATURAL JOIN Sells NATURAL JOIN Merchandise ORDER BY $sort";
            }
            else{
                $sql = "SELECT item_id, type, name, price FROM Vendor NATURAL JOIN Sells NATURAL JOIN Merchandise WHERE name = $vendor ORDER BY $sort";
            }
            $result = mysqli_query($con,$sql);
            echo "<table class='table-center2' id='merchandiseTable'>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Category</th>
                    <th>Vendor Name</th>
                    <th>Price</th>
                </tr>
            </thead>";
            // Print the data from the table row by row
            while($row = mysqli_fetch_array($result)) {
                echo "<tr><td>". $row['item_id'] ."</td><td>". $row['type'] ."</td><td>". $row['name'] ."</td><td>". $row['price'] ."</td></tr>";
            }
            echo "</table>";
            mysqli_close($con);
        ?>
    </body>
</html>
