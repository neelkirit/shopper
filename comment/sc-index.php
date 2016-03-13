<!DOCTYPE html>
<html>
<head>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    alert($("div").scrollTop();
  });
});
</script>
</head>
<body><div style="position:absolute;top:10%;left:40%;">
<div style="border:1px solid black;width:650px;height:650px;overflow:auto">
<?php
include 'comment.php';

?></div></div>

</body>
</html>

