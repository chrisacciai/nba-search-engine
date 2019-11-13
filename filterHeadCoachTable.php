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
            $season = strval($_GET['season']);
            $sort = strval($_GET['sort']);
            if ($conference == "all" && $season != "all"){
                $sql = "SELECT c.first_name, c.last_name, c.year, t.name AS team_name, c.salary FROM Team AS t JOIN  (SELECT * FROM Head_Coach NATURAL JOIN Coaches) AS c ON t.team_id = c.team_id WHERE c.year = $season ORDER BY $sort";
            }
            else if ($conference != "all" && $season == "all"){
                $sql = "SELECT c.first_name, c.last_name, c.year, t.name AS team_name, c.salary FROM Team AS t JOIN  (SELECT * FROM Head_Coach NATURAL JOIN Coaches) AS c ON t.team_id = c.team_id WHERE t.conference = $conference ORDER BY $sort";
            }
            else if ($conference == "all" && $season == "all"){
                $sql = "SELECT c.first_name, c.last_name, c.year, t.name AS team_name, c.salary FROM Team AS t JOIN  (SELECT * FROM Head_Coach NATURAL JOIN Coaches) AS c ON t.team_id = c.team_id ORDER BY $sort";
            }
            else{
                $sql = "SELECT c.first_name, c.last_name, c.year, t.name AS team_name, c.salary FROM Team AS t JOIN  (SELECT * FROM Head_Coach NATURAL JOIN Coaches) AS c ON t.team_id = c.team_id WHERE t.conference = $conference AND c.year = $season ORDER BY $sort";
            }
            $result = mysqli_query($con,$sql);
            echo "<table class='table-center3' id='headCoachTable'>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Season</th>
                    <th>Team Name</th>
                    <th>Salary</th>
                </tr>
            </thead>";
            // Print the data from the table row by row
            while($row = mysqli_fetch_array($result)) {
                echo "<tr><td>". $row['first_name'] ."</td><td>". $row['last_name'] ."</td><td>". $row['year'] ."</td><td>". $row['team_name'] ."</td><td>". $row['salary'] ."</td></tr>";
            }
            echo "</table>";
            mysqli_close($con);
        ?>
    </body>
</html>
