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
            $vendor_id = strval($_GET['vendor_id']);
            $price = floatval($_GET['price']);
            
            $sql2 = "SELECT * FROM Vendor WHERE vendor_id = '$vendor_id' AND name = '$name'";
            $result2 = mysqli_query($con,$sql2);
            if (mysqli_num_rows($result2) == 0){
                echo "<div class='errorPopup'> <span class='closebtn' onclick=\"this.parentElement.style.display='none';\">&times;</span>Error(s) encountered. Failed to insert new data.</div>";
            }
            else{
                $sql = "INSERT INTO Merchandise(item_id, type) VALUES ('$item_id', '$type'); INSERT INTO Sells(vendor_id, item_id, price) VALUES ('$vendor_id', '$item_id', $price)";
                $result = mysqli_multi_query($con,$sql);
                
                if (!$result){
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

