<?php


session_start();
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dbname");
$username_1=$_GET['username'];
$random=$_GET['random'];


if($_POST['submit']){
$username=$_POST['username'];
$random_1=$_POST['random'];
$password=$_POST['password'];
$re_password=$_POST['re_password'];
$old_md5=md5($random);
$new_md5=md5($password);


if($username && $random_1&& $password && $re_password) {
$query_01=mysql_query("SELECT * FROM users WHERE username=$username_1 AND password='$old_md5'") or die(mysql_error());
$query_02=mysql_fetch_assoc($query_01);
$row=mysql_num_rows($query_01);

if(row !=0){

$id=$row['id'];



}
else{

die("user not found!\n");
}


}
else{
die("you must type all fields!\n");
}



}

else{

echo"

<table><form action='resent_password.php?random=$random&username=$username_1 method='POST'>
<tr>
<td>
usename:<input type='text' name='username' readonly='readonly' value='$username_1'>


</td>

</tr>

<tr>
<td>
password from mail:<input type='text' name='random' readonly='readonly' value='$random'>


</td>

</tr>
<tr>
<td>
New password:<input type='password' name='password' >


</td>

</tr>
<tr>
<td>
Retype password:<input type='password' name='re_password'><br/><input type='submit' name='submit' value='change my password'>


</td>

</tr>




</form></table>


";

}





?>