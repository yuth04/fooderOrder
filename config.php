<?php 
$host = "localhost";
$user = "root";
$pw = "";
$db = "db_foodorder";

$conn = mysqli_connect($host,$user,$pw,$db);
$sql = mysqli_select_db($conn,$db);
if(!$conn){
    echo "connected unsuccess";
}
// else{
//     echo "connected successful.Welcome to database";
// }
?>