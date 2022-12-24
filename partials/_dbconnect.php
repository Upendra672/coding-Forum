<?php
// script to connect to the database

//connecting to the database

$servername = "localhost";
$username = "root";
$password = "";
$database = "smileforum";

//create a connection 
$conn = mysqli_connect($servername, $username, $password, $database);


// Die if connection was not successful
if(!$conn){
    die("sorry we failed to connect:" . mysqli_connect_error());
}
// else{
//     echo "connection is successful";
//     echo "<br>";
// }

?>