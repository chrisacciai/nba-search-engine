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
            $arena = strval($_GET['arena']);
            if ($arena == "all"){
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
            }
            else{
                $sql = "SELECT v.name, lease_num FROM Arena AS a JOIN (SELECT * FROM Vendor NATURAL JOIN Operates_At) AS v ON a.arena_id = v.arena_id WHERE a.name = $arena ORDER BY v.name";
                $result = mysqli_query($con,$sql);
                echo "<table class='table-center' style='margin-top: -222px'>
                <thead>
                    <tr>
                        <th>Vendor Name</th>
                        <th>Lease Number</th>
                    </tr>
                </thead>";
                // Print the data from the table row by row
                while($row = mysqli_fetch_array($result)) {
                    echo "<tr><td>". $row['name'] ."</td><td>". $row['lease_num'] ."</td></tr>";
                }
                echo "</table>";
            }
            
            mysqli_close($con);
        ?>
    </body>
</html>
