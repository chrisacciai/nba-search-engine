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
            function insertMerchandise() {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                    
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("responseText").innerHTML = this.responseText;
                        document.getElementById("item_id").value = "";
                        document.getElementById("type").value = "";
                        document.getElementById("name").value = "";
                        document.getElementById("vendor_id").value = "";
                        document.getElementById("price").value = "";
                    }
                }
            xmlhttp.open("GET","insertMerchandise.php?item_id="+document.getElementById("item_id").value+"&type="+document.getElementById("type").value+"&name="+document.getElementById("name").value+"&vendor_id="+document.getElementById("vendor_id").value+"&price="+document.getElementById("price").value, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function deleteMerchandise() {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                    
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("responseText_delete").innerHTML = this.responseText;
                        document.getElementById("item_id_delete").value = "";
                    }
                }
                xmlhttp.open("GET","deleteMerchandise.php?item_id="+document.getElementById("item_id_delete").value, true);
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
                        <a class="nav-link" href="#">Arenas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Assistant Coaches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Head Coaches</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="editMerchandise.php">Merchandise</a>
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
            </div>
        </nav>

        <div class="home-titles">
            <p class="home-title">Edit Merchandise table</p>
            </br>
        </div>

        <div id="insert/delete divs" style="width: 95%">
            <div style="text-align: center; float: left; width:50%; border-right: 1px solid gray" id="insertFields">
                </br>
                <div>
                    Item ID: <input id="item_id"></input>
                </div>
                </br>
                <div>
                    Category: <input id="type"></input>
                </div>
                </br>
                <div>
                    Vendor Name: <input id="name"></input>
                </div>
                </br>
                <div>
                    Vendor ID: <input id="vendor_id"></input>
                </div>
                </br>
                <div>
                    Price ($): <input id="price"></input>
                </div>
                </br>
                <div>
                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="insertMerchandise()">Insert</button>
                </div>
                </br>
                <div id="responseText" style="text-align: center">

                </div>
            </div>
            
            <div style="text-align: center; float: left; width: 50%; border-left: 1px solid gray; margin-left: -1px" id="deleteFields">
                </br>
                </br>
                </br>
                </br>
                </br>
                <div>
                    Item ID: <input id="item_id_delete"></input>
                </div>
                </br>
                <div>
                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="deleteMerchandise()">Delete</button>
                </div>
                </br>
                <div id="responseText_delete" style="text-align: center">

                </div>
            </div>
        </div>
            
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>

