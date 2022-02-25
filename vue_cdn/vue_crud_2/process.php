<?php
// $email = $_POST['email'];
// $password = $_POST['password'];
// $remember_me_check = $_POST['remember_me_check'];

// Create connection
$con=mysqli_connect("localhost","salvo","","vue_crud");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// Select all of our stocks from table 'stock_tracker'
$sql = "SELECT * 
        FROM  users";

// echo $sql;
 $users= array();
if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
    echo "<pre>";
    while ($row = $result->fetch_assoc()) {
        array_push($users , $row);
    }
    $result_2['users'] = $users ;
  }

  echo json_encode($result_2);
 
// Close connections
mysqli_close($con);
// }
?>