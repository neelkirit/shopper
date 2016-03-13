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
if(isset($_POST["input"])){
if($_POST["input"] != "sdfasd"){
	$dname = $_POST["dname"];
	$ddesc = $_POST["ddesc"];
	$category = $_POST["category"];
	$bid = $_SESSION["bid"];
	$query = "INSERT into discount(dname,ddesc,bid,cid) values('{$dname}','{$ddesc}',{$bid},{$category})";
	$result = mysqli_query($link, $query);
	header('Location: index.php');
}
}
else{
	header('Location: index.php');

}
?>
 