<?php


// Create connection
$con=mysqli_connect("localhost","salvo","","vue_crud");
 
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
if ($action == 'create') {

    // POST
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    // $remember_me_check = $_POST['remember_me_check'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    var_dump($_POST);

    // SQL
    $sql = "INSERT INTO users (name,email,phone) 
        Value ('". $name ."','". $email ."','". $phone ."')";
    // Execute SQL
    $query=$con->query($sql);
    var_dump($sql);
    var_dump($query);


    if($query){
        $result['message'] = 'User added succcessfully';
    }else{
        $result['error'] = true;
        $result['message'] = 'Failed to add user ';

    }
  }

  // UPDATE
if ($action == 'update') {

    // POST
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    // $remember_me_check = $_POST['remember_me_check'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL
    $sql = "UPDATE users  SET 'name'='". $name ."' , 'email'='". $email ."', 'phone'='". $phone ."' 
    WHERE id'='". $id ."'";
    // Execute SQL
    $query=$con->query($sql);

    if($query){
        $result['message'] = 'User Update succcessfully';
    }else{
        $result['error'] = true;
        $result['message'] = 'Failed to Update user ';

    }
  }

    // echo $sql;
if ($action == 'delete') {

    // POST
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    // $remember_me_check = $_POST['remember_me_check'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // SQL
    $sql = "DELETE from users WHERE id'='". $id ."'";

    // Execute SQL
    $con->query($sql);

    if($query){
        $result['message'] = 'User Delete succcessfully';
    }else{
        $result['error'] = true;
        $result['message'] = 'Failed to Delete user ';

    }
  }

  echo json_encode($result);
 
// Close connections
mysqli_close($con);
// }
?>