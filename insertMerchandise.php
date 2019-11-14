<?php
    include_once("./library.php"); // To connect to the database
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "INSERT INTO Merchandise(item_id, type) VALUES ('$_POST[item_id]', '$_POST[type]')";
    if (!mysqli_query($con,$sql)) {
        echo $sql;
        die('Error: ' . mysqli_error($con));
    }
    echo "1 record added";
    mysqli_close($con);
?>

