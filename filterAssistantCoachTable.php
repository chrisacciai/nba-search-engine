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
                $sql = "SELECT a.first_name, a.last_name, a.year, t.name AS team_name, a.salary FROM Team AS t JOIN  (SELECT * FROM Assistant_Coach NATURAL JOIN Assistant_Coaches) AS a ON t.team_id = a.team_id WHERE a.year = $season ORDER BY $sort";
            }
            else if ($conference != "all" && $season == "all"){
                $sql = "SELECT a.first_name, a.last_name, a.year, t.name AS team_name, a.salary FROM Team AS t JOIN  (SELECT * FROM Assistant_Coach NATURAL JOIN Assistant_Coaches) AS a ON t.team_id = a.team_id WHERE t.conference = $conference ORDER BY $sort";
            }
            else if ($conference == "all" && $season == "all"){
                $sql = "SELECT a.first_name, a.last_name, a.year, t.name AS team_name, a.salary FROM Team AS t JOIN  (SELECT * FROM Assistant_Coach NATURAL JOIN Assistant_Coaches) AS a ON t.team_id = a.team_id ORDER BY $sort";
            }
            else{
                $sql = "SELECT a.first_name, a.last_name, a.year, t.name AS team_name, a.salary FROM Team AS t JOIN  (SELECT * FROM Assistant_Coach NATURAL JOIN Assistant_Coaches) AS a ON t.team_id = a.team_id WHERE t.conference = $conference AND a.year = $season ORDER BY $sort";
            }
            $result = mysqli_query($con,$sql);
            echo "<table class='table-center' style='margin-top: -384px'>
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
