<?php
    
    if(isset($_POST))
{
    $e = $_POST['email'];
    $t = $_POST['text'];
    
    $conn = mysqli_connect("localhost","root","root","kidan");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        $res->error_code = 1;
        $res = json_encode($res);

        echo $res;
        return;
    }


    if(strlen($t) < 40){
        $res->error_code = 3;
        $res = json_encode($res);

        echo $res;
        return;

    }

    if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        $res->error_code = 2;
        $res = json_encode($res);

        echo $res;
        return;
    }



    $sql = "INSERT INTO `feedback`(`email`, `text`) VALUES ('".$e."', '".$t."')";

  
   
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
    $res->error_code = 7;
    
    $res = json_encode($res);

    echo $res;
}
?>