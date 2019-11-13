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
            $sql = "SELECT location, name, conference, division, year_founded, year, wins, losses FROM Team NATURAL JOIN Yearly_Team ORDER BY location, year";
            $result = mysqli_query($con,$sql);
            echo "<table class='table-center3' id='teamTable'>
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Team Name</th>
                    <th>Conference</th>
                    <th>Division</th>
                    <th>Year Founded</th>
                    <th>Season</th>
                    <th>Wins</th>
                    <th>Losses</th>
                </tr>
            </thead>";
            // Print the data from the table row by row
            while($row = mysqli_fetch_array($result)) {
                echo "<tr><td>". $row['location'] ."</td><td>". $row['name'] ."</td><td>". $row['conference'] ."</td><td>". $row['division'] ."</td><td>". $row['year_founded'] ."</td><td>". $row['year'] ."</td><td>". $row['wins'] ."</td><td>". $row['losses'] ."</td></tr>";
            }
            echo "</table>";
            mysqli_close($con);
        ?>
    </body>
</html>
