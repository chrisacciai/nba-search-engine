<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./stylesheet.css">

        <title>NBA Search Engine</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="excellentexport.js"></script>

        <script>
            function filterPlayerTable() {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("table-component").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET","filterPlayerTable.php?conference="+document.getElementById("conferenceDropdown").value+"&team="+document.getElementById("teamDropdown").value+"&season="+document.getElementById("seasonDropdown").value+"&sort="+document.getElementById("sortDropdown").value, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function unfilterPlayerTable() {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("table-component").innerHTML = this.responseText;
                    }
                }
                
                document.getElementById("sortDropdown").selectedIndex = 0;
                document.getElementById("conferenceDropdown").selectedIndex = 0;
                document.getElementById("teamDropdown").selectedIndex = 0;
                document.getElementById("seasonDropdown").selectedIndex = 0;
                
                xmlhttp.open("GET","unfilterPlayerTable.php", true);
                xmlhttp.send();
            }
        </script>

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <div class="media">
                    <img class="logo" src="./nbalogo.png" class="mr-3" alt="logo" height="44" width="44">
                </div>
                <a class="navbar-brand" href="index.html">NBA Search Engine</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="Arena.php">Arenas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AssistantCoach.php">Assistant Coaches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="HeadCoach.php">Head Coaches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Merchandise.php">Merchandise</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Player.php">Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Team.php">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Vendor.php">Vendors</a>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <div class="filter-border">
            <div class="filter-items">
                <div>
                    <label>Sort by:</label>
                </div>
                <div>
                    <select class="btn btn-secondary dropdown-toggle btn-sm" id="sortDropdown">
                        <option value="first_name">First Name</option>
                        <option value="last_name">Last Name</option>
                        <option value="date_of_birth ASC">Date of Birth &#8593;</option>
                        <option value="date_of_birth DESC">Date of Birth &#8595;</option>
                        <option value="team_name">Team Name</option>
                        <option value="points_stats ASC">PPG &#8593;</option>
                        <option value="points_stats DESC">PPG &#8595;</option>
                        <option value="assists_stats ASC">APG &#8593;</option>
                        <option value="assists_stats DESC">APG &#8595;</option>
                        <option value="rebounds_stats ASC">RPG &#8593;</option>
                        <option value="rebounds_stats DESC">RPG &#8595;</option>
                        <option value="salary ASC">Salary &#8593;</option>
                        <option value="salary DESC">Salary &#8595;</option>
                    </select>
                </div>
                <div>
                    <br>
                </div>
                <div>
                    <label>Conference:</label>
                    <select class="btn btn-secondary dropdown-toggle btn-sm" id="conferenceDropdown">
                        <option value="all">All</option>
                        <option value="'Eastern'">Eastern</option>
                        <option value="'Western'">Western</option>
                    </select>
                </div>
                <div>
                    <br>
                </div>
                <div>
                    <label>Team:</label>
                </div>
                <div>
                    <select class="btn btn-secondary dropdown-toggle btn-sm" id="teamDropdown">
                        <option value="all">All</option>
                        <option value="'Cavaliers'">Cavaliers</option>
                        <option value="'Celtics'">Celtics</option>
                        <option value="'Hawks'">Hawks</option>
                        <option value="'Lakers'">Lakers</option>
                        <option value="'Nets'">Nets</option>
                        <option value="'Rockets'">Rockets</option>
                        <option value="'Suns'">Suns</option>
                        <option value="'Thunder'">Thunder</option>
                        <option value="'Warriors'">Warriors</option>
                        <option value="'Wizards'">Wizards</option>
                    </select>
                </div>
                <div>
                    <br>
                </div>
                <div>
                    <label>Seasons:</label>
                    <select class="btn btn-secondary dropdown-toggle btn-sm" id="seasonDropdown">
                        <option value="all">All</option>
                        <option value="'2019-20'">2019-20</option>
                        <option value="'2018-19'">2018-19</option>
                        <option value="'2017-18'">2017-18</option>
                        <option value="'2016-17'">2016-17</option>
                        <option value="'2015-16'">2015-16</option>
                    </select>
                </div>
            </div>
            <hr color = "#C9082A" width=130px>
            <button class="btn btn-secondary btn-sm" onclick="filterPlayerTable()">Apply Filters</button>
            <div>
                <br>
            </div>
            <button class="btn btn-secondary btn-sm" onclick="unfilterPlayerTable()">Clear Filters</button>
            <div>
                <br>
            </div>
        </div>

        <div>
            </br>
        <div>

        <div class="filter-border">
            <div>
                </br>
            </div>
            <a class = "exportLink" download="PlayerData.xls" href="#" onclick="return ExcellentExport.excel(this, 'playerTable', 'Player Data');">Export as XLS</a>
            </br>
            <a class = "exportLink" download="PlayerData.csv" href="#" onclick="return ExcellentExport.csv(this, 'playerTable');">Export as CSV</a>
            <div>
                </br>
            </div>
        </div>

        <div id="table-component">
            <?php
                include_once("./library.php"); // To connect to the database
                $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
                // Check connection
                if (mysqli_connect_errno())
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $sql = "SELECT p.first_name, p.last_name, p.alma_mater, p.date_of_birth, t.name AS team_name, p.year, p.points_stats, p.assists_stats, p.rebounds_stats, p.salary FROM Team AS t JOIN  (SELECT * FROM Player NATURAL JOIN Plays_For) AS p ON t.team_id = p.team_id ORDER BY first_name, year";
                $result = mysqli_query($con,$sql);
                echo "<table class='table-center4' id='playerTable'>
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
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
