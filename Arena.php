<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="homepage.css">

    <title>NBA Search Engine</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">NBA Search Engine</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Arena.php">Arena</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Assistant Coaches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Head Coaches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Merchandise</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Players</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Teams</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Vendors</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <br>
    <div class="sort-menu">
            <form>
                <label class="sort-text">Sort:</label>
                <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Alphabetical
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Alphabetical</a>
                          <a class="dropdown-item" href="#">Capacity</a>
                        </div>
                      </div>
            </form>
        </div>
    <div class="filter-menu">
        <form>
            <label class="filter-text">Filter:</label>
            <div class="form-group">
            <label class="division-radio" for="formControlDivision">Division</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1">
                    <label class="form-check-label" for="gridRadios1">
                      North
                    </label>
                </div>
                <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                          South
                        </label>
                    </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                    <label class="form-check-label" for="gridRadios3">
                      East
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4">
                    <label class="form-check-label" for="gridRadios4">
                      West
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-2 btn-sm">Apply Filter</button>
        </form>
    </div>

<style>
th{
background-color: #17408B;
color: white;
}
th, td {
padding: 5px;
border-bottom: 1px solid #ddd;
}
table {
width: 70%;
align: center;
}
thead{
display: table-header-group;
}
tr:nth-child(odd) {
    background-color: #f2f2f2;
}
table.center{
    margin-left:auto;
    margin-right:auto;
    margin-top:-275px; 
}
</style>

<table class="center">
<thead>
  <tr>
    <th>Arena Name</th>
    <th>City</th>
    <th>State</th>
    <th>Team Name</th>
    <th>Capacity</th>
  </tr>
</thead>
  <?php
    include_once("./library.php"); // To connect to the database
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "SELECT a.name AS arena_name, a.city, a.state, t.name AS team_name, a.capacity FROM Arena AS a LEFT JOIN (SELECT * FROM Team NATURAL JOIN Plays_At) AS t ON a.arena_id = t.arena_id";
    $result = mysqli_query($con,$sql);
    // Print the data from the table row by row
    while($row = mysqli_fetch_array($result)) {
      echo "<tr><td>". $row['arena_name'] ."</td><td>". $row['city'] ."</td><td>". $row['state'] ."</td><td>". $row['team_name'] ."</td><td>". $row['capacity'] ."</td></tr>";
      }
      mysqli_close($con);
  ?>
</table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
