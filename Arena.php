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
            function filterArenaTable() {
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
            xmlhttp.open("GET","filterArenaTable.php?conference="+document.getElementById("conferenceDropdown").value+"&sort="+document.getElementById("sortDropdown").value, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function unfilterArenaTable() {
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
                
                xmlhttp.open("GET","unfilterArenaTable.php", true);
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
                    <li class="nav-item active">
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
                    <select class="btn btn-secondary dropdown-toggle btn-sm" id="sortDropdown">
                        <option value="arena_name">Arena Name</option>
                        <option value="capacity ASC">Capacity &#8593;</option>
                        <option value="capacity DESC">Capacity &#8595;</option>
                    </select>
                </div>
                <div>
                    <br>
                </div>
                <div>
                    <label>Conference:</label>
                    <select class="btn btn-secondary dropdown-toggle btn-sm" id="conferenceDropdown">
                        <option value="'Eastern' OR conference = 'Western'">All</option>
                        <option value="'Eastern'">Eastern</option>
                        <option value="'Western'">Western</option>
                    </select>
                </div>
            </div>
            <hr color = "#C9082A" width=130px>
            <button class="btn btn-secondary btn-sm" onclick="filterArenaTable()">Apply Filters</button>
            <div>
                <br>
            </div>
            <button class="btn btn-secondary btn-sm" onclick="unfilterArenaTable()">Clear Filters</button>
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
            <a class = "exportLink" download="ArenaData.xls" href="#" onclick="return ExcellentExport.excel(this, 'arenaTable', 'Arena Data');">Export as XLS</a>
            </br>
            <a class = "exportLink" download="ArenaData.csv" href="#" onclick="return ExcellentExport.csv(this, 'arenaTable');">Export as CSV</a>
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
                $sql = "SELECT a.name AS arena_name, a.city, a.state, t.name AS team_name, a.capacity FROM Arena AS a JOIN (SELECT * FROM Team NATURAL JOIN Plays_At) AS t ON a.arena_id = t.arena_id ORDER BY arena_name";
                $result = mysqli_query($con,$sql);
                echo "<table class='table-center2' id='arenaTable'>
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
        </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    </body>
</html>
