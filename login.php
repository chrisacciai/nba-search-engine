<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./stylesheet.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            function verifyCredentials(callback){
                 if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                                    
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        callback(this.responseText);
                    }
                }
            xmlhttp.open("GET","verifyCredentials.php?username="+document.getElementById("username").value+"&password="+document.getElementById("password").value, true);
                xmlhttp.send();
            }

            function callback(response){
                if (response.length == 157){
                    document.getElementById("responseText").innerHTML = "<div class='errorPopup'> <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>Incorrect credentials. Check to make sure that both your username and password are correct.</div>";
                    document.getElementById("password").value = ""; 
                }
                else{
                    window.location.replace("./edit.html");
                }
            }

        </script>

        <script>
            function back() {
                window.location.href = "./index.html";
                return false;
            }
        </script>

    </head>

    <body>
        <div class="home-titles">
            <p class="home-title">Login as Database Admin</p>
            </br>
        </div>
        <div style="text-align: center" id="textFields">
            <div>
                Username: <input id="username"></input>
            </div>
            </br>
            <div>
                Password: <input id="password" type="password"></input>
            </div>
            </br>
            <div>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="verifyCredentials(callback)">Login</button>
            </div>
            </br>
            <div>
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="return back()">Back to Home</button>
            </div>
        </div>

        </br>
        </br>
    
        <div id="responseText" style="text-align: center; width: 100%">

        </div>
            
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>



