<?php 
session_start();
?>
<?php
$link = mysqli_connect("localhost", "admin2", "123321", "dealers");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
<?php
$email = $_POST["email"];
$password = $_POST["password"];
$query = "SELECT password from login where username='{$email}'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);

if($row["password"] == $password){
	$query = "SELECT bid from business where bemail='{$email}'";
	$result = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($result);
	$_SESSION['bid'] = $row['bid'];
	$_SESSION['username'] = $_POST['email'];
	header('Location: brand-portal.php');
}
else{
	header('Location: index.php');

}
?>
 