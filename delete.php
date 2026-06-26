<?php

include('dbconnection.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    mysqli_query(
        $con,
        "DELETE FROM users WHERE id='$id'"
    );
}

header("Location:index.php");

exit();

?>