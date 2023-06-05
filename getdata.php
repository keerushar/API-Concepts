<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "userdb";

$conn = new mysqli($server,$username,$password,$database);

if($conn-> connect_error){
    die("Connection failed:" . $conn -> connect_error);
}

$sql = "SELECT * FROM userdata";
$result = $conn->query($sql);

$json = array();
if($result->num_rows>0){
    while ($row = $result->fetch_array()){
        $json["data"][]= array(
         "id"=>$row["id"],
         "name"=> $row["name"], 
         "address"=> $row["address"],
        );
    }
}
echo json_encode($json);
$conn->close();