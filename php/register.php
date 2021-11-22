<?php
    // $login = $_POST["login"];
    // // $email = $_POST["email"];
    // // $pasw = $_POST["pasw"];
    // // $res = $login + " | " + $email + " | " + $pasw;
    // echo "ASDASD" + $login;
    
    if(isset($_POST))
{
    $l = $_POST["login"];
    $e = $_POST["email"];
    $p = $_POST["pasw"];


    $databaseName = 'kidan';
    $databaseUser = 'tudor';
    $databasePassword = 'tudor';
    $databaseHost = 'localhost';
    
    $conn = mysqli_connect("localhost","root","root","kidan");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        $res->error_code = 1;
        echo $res;
    }

    $sql = "INSERT INTO `users`(`login`, `email`, `pasw`) VALUES ('".$l."', '".$e."', '".$p."')";

  
   
    $rs = mysqli_query($conn, $sql);


    if(!$rs)
    {
        $res->error_code = mysqli_error();
    }
    else
    {
        $res->error_code = 0;
    }
    $res = json_encode($res);

    echo $res;
   
}
else
{
    echo 'Data not comes here';
}
?>