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
            function filterTeamTable() {
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
            xmlhttp.open("GET","filterTeamTable.php?conference="+document.getElementById("conferenceDropdown").value+"&season="+document.getElementById("seasonDropdown").value+"&sort="+document.getElementById("sortDropdown").value, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function unfilterTeamTable() {
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
                document.getElementById("seasonDropdown").selectedIndex = 0;
                
                xmlhttp.open("GET","unfilterTeamTable.php", true);
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
                    <li class="nav-item">
                        <a class="nav-link" href="Player.php">Players</a>
                    </li>
                    <li class="nav-item active">
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
                    <select class="btn btn-secondary dropdown-toggle btn-sm" id="sortDropdown">
                        <option value="location">Location</option>
                        <option value="name">Team Name</option>
                        <option value="year_founded ASC">Year Fnd. &#8593;</option>
                        <option value="year_founded DESC">Year Fnd. &#8595;</option>
                        <option value="wins ASC">Wins &#8593;</option>
                        <option value="wins DESC">Wins &#8595;</option>
                        <option value="losses ASC">Losses &#8593;</option>
                        <option value="losses DESC">Losses &#8595;</option>
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
            <button class="btn btn-secondary btn-sm" onclick="filterTeamTable()">Apply Filters</button>
            <div>
                <br>
            </div>
            <button class="btn btn-secondary btn-sm" onclick="unfilterTeamTable()">Clear Filters</button>
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
            <a class = "exportLink" download="TeamData.xls" href="#" onclick="return ExcellentExport.excel(this, 'teamTable', 'Team Data');">Export as XLS</a>
            </br>
            <a class = "exportLink" download="TeamData.csv" href="#" onclick="return ExcellentExport.csv(this, 'teamTable');">Export as CSV</a>
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
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
