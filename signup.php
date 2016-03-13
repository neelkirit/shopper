<?php 
session_start();
?>
<?php
$link = mysqli_connect("localhost", "admin2", "123321", "dealers");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(!isset($_POST["input"])){
		header('Location: index.php?scams=1');
}
else{
		$bname = $_POST["bname"];
		$email = $_POST["bemail"];
		$password = $_POST["bpassword"];
		$category = $_POST["category"];
		$ph1 = $_POST["ph1"];
		$city = $_POST["city"];

		$mall = $_POST["mall"];
		$flor = $_POST["floor"];

		$query = "INSERT into business(bname,bemail,password,cid,ph1,city,mall,floor) values('{$bname}','{$email}','{$password}',
			{$category},'{$ph1}','{$city}','{$mall}',{$flor})";
		$result = mysqli_query($link, $query);
		
		$query = "INSERT into login(username,password) values('{$email}','{$password}')";
		$result = mysqli_query($link, $query);
		
		$query = "SELECT bid from business where bemail='{$email}'";
		$result = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($result);
		$_SESSION['bid'] = $row['bid'];
		$_SESSION['username'] = $_POST['bemail'];
		header('Location: brand-portal.php');
	}
	

?>