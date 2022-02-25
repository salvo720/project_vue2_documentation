<?php

$email = $_POST['email'];
$password = $_POST['password'];
$remember_me_check = $_POST['remember_me_check'];

// Create connection
$con=mysqli_connect("localhost","salvo","","vue_crud");
if($con->connection_error){
    die("Connection fail " .$con->connection_error);
}else{
    echo "connected <br>";
}

$result = array('error'=>false);
$action = '';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

echo "action : ",  $action , "<br>";
if($action == 'read'){
    // Select all of our stocks from table 'stock_tracker'
    $sql = "SELECT * FROM  users ";
    echo "sql : ",$sql , "<br>";

    $result = mysqli_query($con, $sql);
    echo "result : ",$result , "<br>";

    $users = array();
    while($row = $result->fetch_assoc()){
        array_push($users , $row );
    }
    $result['users'] = $users;
}

echo json_encode($result);
 
// Close connections
mysqli_close($con);
// }
?>