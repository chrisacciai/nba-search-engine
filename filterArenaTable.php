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
            $conference = strval($_GET['conference']);
            $sort = strval($_GET['sort']);
            $sql = "SELECT a.name AS arena_name, a.city, a.state, t.name AS team_name, a.capacity AS capacity FROM Arena AS a JOIN (SELECT * FROM Team NATURAL JOIN Plays_At WHERE conference = $conference) AS t ON a.arena_id = t.arena_id ORDER BY $sort";
            $result = mysqli_query($con,$sql);
            echo "<table class='table-center'>
            <thead>
                <tr>
                    <th>Arena Name</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Team Name</th>
                    <th>Capacity</th>
                </tr>
            </thead>";
            // Print the data from the table row by row
            while($row = mysqli_fetch_array($result)) {
                echo "<tr><td>". $row['arena_name'] ."</td><td>". $row['city'] ."</td><td>". $row['state'] ."</td><td>". $row['team_name'] ."</td><td>". $row['capacity'] ."</td></tr>";
            }
            echo "</table>";
            mysqli_close($con);
        ?>
    </body>
</html>
