<?php

	include_once ('php/functions.php');
	include_once ('php/db_connect.php');
    
    $page_id = 1;
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Modern Tiny Ajax Comments System</title>
    <link href="css1/page.css" rel="stylesheet" type="text/css" />
    <link href="css1/tipsy.css" rel="stylesheet" type="text/css" />
    
    <script src="js1/jquery.js" type="text/javascript"></script>
    <script src="js1/tipsy.js" type="text/javascript"></script>
    <script src="js1/count_down.js" type="text/javascript"></script>
    <script src="js1/comments.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
        	$('.tip').tipsy({ gravity: 'e' }); 
        });     
    </script>    
</head>

<body>

<div id="page">

<div class="box shadow">

</div>
<div class="comments">
    <?php
    	foreach ((array) comments($page_id) as $comment) {
    ?>
        <div class="comment shadow effect">
            <p class="left tip" title="<?php echo $comment['username'];?> Said">
                <img  src="<?php echo get_gravatar($comment['email'],40);?>" />
            </p>
            <p class="body right">
            <?php echo nl2br($comment['comment']);?>
            <div class="details small">
                <span class="blue"><?php echo timeBetween($comment['time'],time());?></span> · <a class="red" href="#" onclick="$(this).delete_comment(<?php echo $comment['id'];?>); return false;">Remove</a>
            </div>
            </p>
            
        </div>
    <?php
    }
    ?>
</div>
<div class="add_comment">
    <div class="write shadow comment">
        <p class="left">
            <img class="avatar" src="#" />
        </p>
        <p class="textarea right">
            <textarea class="left" cols="40" rows="5"></textarea>
            <input class="left" value="SEND" type="submit" />
        </p>
    </div>
    <a onclick="$(this).add_comment(<?php echo $page_id;?>);return false;" class="right effect shadow" href="#">Add Comment</a>
</div>






</div>

</body>
</html>