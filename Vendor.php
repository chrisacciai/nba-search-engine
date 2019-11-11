<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./stylesheet.css">

        <title>NBA Search Engine</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            function filterVendorTable() {
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
                xmlhttp.open("GET","filterVendorTable.php?arena="+document.getElementById("arenaDropdown").value, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function unfilterVendorTable() {
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
                
                document.getElementById("arenaDropdown").selectedIndex = 0;
                
                xmlhttp.open("GET","unfilterVendorTable.php", true);
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
                    <li class="nav-item">
                        <a class="nav-link" href="Team.php">Teams</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Vendor.php">Vendors</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <br>
        <div class="filter-border">
            <div class="filter-items">
                <div>
                    <div>
                    <label>Arena:</label>
                    </div>
                    <div>
                    <select class="btn btn-secondary dropdown-toggle btn-sm" id="arenaDropdown" style="width: 75%">
                        <option value="all">All</option>
                        <option value="'Capital One Arena'">Capital One Arena</option>
                        <option value="'Barclays Center'">Barclays Center</option>
                        <option value="'American Airlines Arena'">American Airlines Arena</option>
                        <option value="'American Airlines Center'">American Airlines Center</option>
                        <option value="'Amway Center'">Amway Center</option>
                        <option value="'Chase Center'">Chase Center</option>
                        <option value="'Rocket Mortgage FieldHouse'">Rocket Mortgage FieldHouse</option>
                        <option value="'Chesapeake Energy Arena'">Chesapeake Energy Arena</option>
                        <option value="'Toyota Center'">Toyota Center</option>
                        <option value="'State Farm Arena'">State Farm Arena</option>
                    </select>
                    </div>
                </div>
            </div>
            <hr color = "#C9082A" width=130px>
            <button class="btn btn-secondary btn-sm" onclick="filterVendorTable()">Apply Filters</button>
            <div>
                <br>
            </div>
            <button class="btn btn-secondary btn-sm" onclick="unfilterVendorTable()">Clear Filters</button>
            <div>
                <br>
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
            mysqli_close($con);
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>
