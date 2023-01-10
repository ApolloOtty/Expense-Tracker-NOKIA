<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; characterset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("connection.php");
$data=json_decode(file_get_contents("php://input"));

$userID = $_POST['userID'];
$limit=$_POST['limit'];
$month = date("F"); // Get the current month

// Check if there is already a row with the current month value
$check_query = "SELECT * FROM userinput WHERE month='$month' and userID='$userID'";
$check_result = mysqli_query($con, $check_query);


if (mysqli_num_rows($check_result) != 0) {
    http_response_code(404);
}