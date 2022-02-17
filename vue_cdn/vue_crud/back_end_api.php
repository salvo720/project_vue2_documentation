<?php

$email = $_POST['email'];
$password = $_POST['password'];
$remember_me_check = $_POST['remember_me_check'];

// Create connection
$con=mysqli_connect("localhost","salvo","","swift_pku_db");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// Select all of our stocks from table 'stock_tracker'
$sql = "SELECT * 
        FROM  user
        WHERE email= '".$email."' AND password = '".$password."' ";

// echo $sql;
 
// Confirm there are results
    $result = mysqli_query($con, $sql);
    // var_dump($result,$sql ) ;
    
if ($result = mysqli_num_rows($result) > 0 )
{
    $resultArray= TRUE;
	// Encode the array to JSON and output the results
	echo json_encode($resultArray);
} else {

    $resultArray= FALSE;
	echo json_encode($resultArray);
}
 
// Close connections
mysqli_close($con);
// }
?>