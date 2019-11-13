<section class="loginform cf">  
    <form name="login" action="index_submit" method="get" accept-charset="utf-8">  
        <ul>  
            <li><label for="username">Username</label>
            <input type="username" id="username" name="username" placeholder="username" required></li>
            <li><label for="password">Password</label>  
            <input type="password" id="password" name="password" placeholder="password" required></li>
            <li>  
            <button type="submit" value="Login" onclick="verify()">Login</li>
        </ul>
    </form>
    <span id="login_failed"></span>
</section>

<script>
    function verify() {
        if (document.getElementById("username").value == "css8cw" && document.getElementById("password").value == "admin"){
            document.write("Hello world");
        }
        else{
            document.getElementById("login_failed").innerHTML = "Invalid admin credentials.";
            window.location = "https://cs4750.cs.virginia.edu/~css8cw/NBA_DB/login.php?"; 
        }
    }
</script>


