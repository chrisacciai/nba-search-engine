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
            
            $item_id = strval($_GET['item_id']);
            
            $sql2 = "SELECT * FROM Merchandise WHERE item_id = '$item_id'";
            $result2 = mysqli_query($con,$sql2);
            if (mysqli_num_rows($result2) == 0){
                echo "<div class='errorPopup'> <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>Error(s) encountered. Failed to delete data.</div>";
            }
            else{
                $sql = "DELETE FROM Sells WHERE item_id = '$item_id'; DELETE FROM Merchandise WHERE item_id = '$item_id'";
                $result = mysqli_multi_query($con,$sql);
                
                if (!$result){
                    echo "<div class='errorPopup'> <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>Error(s) encountered. Failed to delete data.</div>";
                }
                else{
                    echo "<div class='successPopup'> <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>Data successfully deleted.</div>";
                }
            }
            
            mysqli_close($con);
            
        ?>
    </body>
</html>

