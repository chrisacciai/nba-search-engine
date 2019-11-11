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
            $team = strval($_GET['team']);
            $season = strval($_GET['season']);
            $sort = strval($_GET['sort']);
            if ($conference == "all" && $team == "all" && $season != "all"){
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id WHERE year = $season ORDER BY $sort";
            }
            else if ($conference == "all" && $team != "all" && $season != "all"){
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id WHERE t.name = $team AND year = $season ORDER BY $sort";
            }
            else if ($conference != "all" && $team == "all" && $season != "all"){
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id WHERE conference = $conference AND year = $season ORDER BY $sort";
            }
            else if ($conference != "all" && $team != "all" && $season != "all"){
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id WHERE conference = $conference AND t.name = $team AND year = $season ORDER BY $sort";
            }
            else if ($conference == "all" && $team == "all" && $season == "all"){
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id ORDER BY $sort";
            }
            else if ($conference == "all" && $team != "all" && $season == "all"){
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id WHERE t.name = $team ORDER BY $sort";
            }
            else if ($conference != "all" && $team == "all" && $season == "all"){
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id WHERE conference = $conference ORDER BY $sort";
            }
            else if ($conference != "all" && $team != "all" && $season == "all"){
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id WHERE conference = $conference AND t.name = $team ORDER BY $sort";
            }
            else {
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id WHERE conference = $conference AND t.name = $team AND year = $season ORDER BY $sort";
            }
            $result = mysqli_query($con,$sql);
            echo "<table class='table-center' style='margin-top: -465px; width: 75%; margin-left:224px'>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Alma Mater</th>
                    <th>Date of Birth</th>
                    <th>Team Name</th>
                    <th>Season</th>
                    <th>PPG</th>
                    <th>APG</th>
                    <th>RPG</th>
                    <th>Salary</th>
                </tr>
            </thead>";
            // Print the data from the table row by row
            while($row = mysqli_fetch_array($result)) {
                echo "<tr><td>". $row['first_name'] ."</td><td>". $row['last_name'] ."</td><td>". $row['alma_mater'] ."</td><td>". $row['date_of_birth'] ."</td><td>". $row['team_name'] ."</td><td>". $row['year'] ."</td><td>". $row['points_stats'] ."</td><td>". $row['assists_stats'] ."</td><td>". $row['rebounds_stats'] ."</td><td>". $row['salary'] ."</td></tr>";
            }
            echo "</table>";
            mysqli_close($con);
        ?>
    </body>
</html>
