<?php
// session_start();

$uname = $_POST["uname"];
$phnumber = $_POST["phnumber"];
$address = $_POST["address"];
$email  = $_POST["email"];
$password = $_POST["password"];





if (!empty($uname) || !empty($email) || !empty($password) ||!empty($address )||!empty($phnumber ) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "shopee";



// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From user Where email = ? Limit 1";
  $INSERT = "INSERT Into user (uname,phnumber,address,email,password)values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $uname,$phnumber,$address,$email,$password);
      $stmt->execute();
      $output = header('Location: index.php');
     } else {
      echo "Someone already register using this email";
      $stmt->close();
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>