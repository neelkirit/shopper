
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$id=$_POST['radios'];
$host="localhost";
$user="admin2";
$password="123321";
$database="dealers";
mysql_connect($host,$user,$password)or die(mysql_error());
mysql_select_db($database)or die(mysql_error());
$query="select id,name,disc,floor from shop where id like '%".$id."%'";
$result=mysql_query($query);
while($record=mysql_fetch_assoc($result)){
while(list($fieldname,$fieldvalue)=each($record)){
echo $id,":<b>".$name."</b><br>";
}
echo "<br>";
}
?>


</body>
</html>