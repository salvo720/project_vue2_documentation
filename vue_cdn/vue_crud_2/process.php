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

    // SQL
    $sql = "INSERT INTO users ('name','email','phone') 
        Value ('". $name ."','". $email ."','". $phone ."')";

    if($sql){
        $result['message'] = 'User added succcessfully';
    }else{
        $result['error'] = true;
        $result['message'] = 'Fialed to add user ';

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

    if($sql){
        $result['message'] = 'User Update succcessfully';
    }else{
        $result['error'] = true;
        $result['message'] = 'Fialed to Update user ';

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

    if($sql){
        $result['message'] = 'User Delete succcessfully';
    }else{
        $result['error'] = true;
        $result['message'] = 'Fialed to Delete user ';

    }
  }

  echo json_encode($result_2);
 
// Close connections
mysqli_close($con);
// }
?>