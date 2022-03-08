<?php

// Create connection
$con=mysqli_connect("localhost","salvo","","vue_login");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// ACTION 
$action = '';
if(isset($_GET['action'])){
    $action = $_GET['action'];
}
// echo "action : ",  $action , "<br>";

// echo $sql;
if ($action == 'login') {

    // TAKE DATA 
    var_dump($_POST);
    $email=$_POST["userdata"]["email"];
    $password=$_POST["password"];

    $sql = "SELECT * FROM `user` WHERE `email`=". $email ." AND `password`=". $password ." ";
    // Execute SQL
    echo $sql ;
    $query=$con->query($sql);
    $num_rows = mysqli_num_rows($query);
    if( $num_rows >=1){
        $result = TRUE;
    }else{
        $result = FALSE;
    }
}

echo json_encode($result);
 
// Close connections
mysqli_close($con);
// }
?>