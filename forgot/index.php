<?php

mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("dbname") or die(mysql_error());


if($_POST['submit'])
{
$username=$_POST['username'];


if($usename){
$passwordlength=10;
$charset="abcefghijklmnopqrstuvwxyz1234567890";


for($x==1;$x<=$passwordlength;$++){
$rand=rand() %streln($charset);
$temp=sustr($charset,$rand,1);
$password .=$temp;

}
$password_md5=md5($password);

$query_01=mysql_query("SELECT * FROM users WHERE username='$username'") or die(mysql_error());

$query_01=mysql_num_rows($query_02);


if($query_01 !=0){
$query_03=mysql_query("UPDATE users SET password='$password_md5'AND WHERE username='$username'");
ini_set("port:",465");
ini_se("smtp:","smtp.gmail");

$to="$username";
$subject="your new fucking password";
$headers="FROM: Picxter.com";
$body="
hello $username,\n
o recently requested a new password at Picxter.com
 follow the link below to reset your passsword \n

http://Picxter.com/forgot_pass/reset_password.php?random=$password&username=$username\n


your password is :\n
$password
";
mail($to,$subject,$body,$headers);
echo"your password has been  sent to $email it shud be there shortly!";

}
else{

die("no user found!\n");


}
}

else{

die("you must type both username and password:\n");


}


}


else {

echo"<table>

<form action="index.php" method="POST">



<tr>
<td>

username:<input type="text" name="username">

</td>

</tr><tr><td>Email:<input type="text" name="username"><br/><input type="submit" name="submit" value="get new password"></td></tr>




</form>


</table>
";
}



?>