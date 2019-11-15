<section class="loginform cf">  
    <form name="login" action="index_submit" method="get" accept-charset="utf-8">  
        <ul>  
            <li><label for="username">Username</label>
            <input type="username" id="username" name="username" placeholder="username" required></li>
            <li><label for="password">Password</label>  
            <input type="password" id="password" name="password" placeholder="password" required></li>
            <li>  
            <button type="submit" value="Login" onclick="return verify()">Login</li>
        </ul>
    </form>
</section>

<script>
    function verify() {
        if (document.getElementById("username").value == "css8cw" && document.getElementById("password").value == "admin"){
            window.location.href = "edit.html";
        }
        else{
            document.getElementById("password").value = ""; 
        }
        return false;
    }
</script>


