<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$DOB = $_POST['DOB'];
	$phno = $_POST['phno'];
	$email = $_POST['email'];
	$adhar = $_POST['adhar'];
	$voterID = $_POST['voterID'];
	$pswd = $_POST['pswd'];

$conn=new mysqli('localhost','root','','voter_registration');
if($conn->connect_error){
	die('Connection failed : '. $conn->connect_error);
}else{
	$stmt=$conn->prepare("insert into voter_registration (fname,lname,DOB,phno,email,adhar,voterID,pswd) values(?,?,?,?,?,?)");
	$stmt->bind_param("sssissss",$fname,$lname,$DOB,$phno,$email,$adhar,$voterID,$pswd);
	$stmt->execute();
	echo"Registered Successfully!";
	$stmt->close();
	$conn->close();
}

?>