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
            $type = strval($_GET['type']);
            $name = strval($_GET['name']);
            $price = floatval($_GET['price']);
            
            $sql = "SELECT * FROM Vendor WHERE name = '$name'";
            $result = mysqli_query($con,$sql);
            if (mysqli_num_rows($result) == 0){
                echo "<div class='errorPopup'> <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>Error(s) encountered. Failed to insert new data.</div>";
            }
            else{
                $row = mysqli_fetch_assoc($result);
                $vendor_id = $row['vendor_id'];
                $sql2 = "INSERT INTO Merchandise(item_id, type) VALUES ('$item_id', '$type'); INSERT INTO Sells(vendor_id, item_id, price) VALUES ('$vendor_id', '$item_id', $price)";
                $result2 = mysqli_multi_query($con,$sql2);
                
                if (!$result2){
                    echo "<div class='errorPopup'> <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>Error(s) encountered. Failed to insert new data.</div>";
                }
                else{
                    echo "<div class='successPopup'> <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>New data successfully inserted!</div>";
                }
            }
            
            mysqli_close($con);
            
        ?>
    </body>
</html>

