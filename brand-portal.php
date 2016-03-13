<?php
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['bid'])){
	header('Location: index.php?scams=1');
}


?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html xmlns="http://www.w3.org/1999/xhtml" class="no-js"><!--<![endif]-->


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
<!--1. Bootstrap CSS LOW PREFERENCE-->
<link rel="stylesheet" href="css/bootstrap.css">
<!--2. Template CSS HIGH PREFERENCE-->
<link rel="stylesheet" href="css/styles.css">

<link rel="stylesheet" href="brand-portal.css">
<!--FONT INCLUDES= FONT AWESOME 4.2.0-->
<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
<style>
body{
	padding-top:50px;
}
.btn-default:hover, .btn-default:focus, .btn-default.focus, .btn-default:active, .btn-default.active, .open > .dropdown-toggle.btn-default {
	color: #000;
  background-color: #fff;
  border-color: #ccc;
	}
</style>
<!--JS INCLUDES-->
<!--Jquery 1.11.2-->
<script src="js/jquery-1.11.2.js"></script>
<!--Bootstrap Js-->
<script src="js/bootstrap.js"></script>  
        	<link href="file:///G|/BP/brand-portal1.css" type="text/css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
<script src="js/modernizr.custom.79639.js"></script>
<script src="js/jquery.js"></script>

	<script type="text/javascript">

$(document).ready(function () {

	// if user clicked on button, the overlay layer or the dialogbox, close the dialog	
	$('#close').click(function () {		
		$('.lightbox, .dialog-box').hide();		
		return false;
	});
	
	$('#find').click(function () {		
		$('.lightbox, .dialog-box').show();		
		return false;
	});

	// if user resize the window, call the same function again
	// to make sure the overlay fills the screen and dialogbox aligned to center	
	$(window).resize(function () {
		
		//only do it if the dialog box is not hidden
		if (!$('.dialog-box').is(':hidden')) popup();		
	});	
	
	
});

			function DropDown(el) {
				this.dd = el;
				this.placeholder = this.dd.children('span');
				this.opts = this.dd.find('ul.dropdown > li');
				this.val = '';
				this.index = -1;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

					obj.opts.on('click',function(){
						var opt = $(this);
						obj.val = opt.text();
						obj.index = opt.index();
						obj.placeholder.text(obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-3').removeClass('active');
				});

			});


</script>	

<script>
 
$(document).ready(function(){
 
  $(".addstock").click(function(){
 
$("#stock1").clone().appendTo("#stock-offer");
 });
 
});
 
</script>
	</head>
<body>
<!---brand name--->
<nav class="navbar navbar-default navbar-fixed-top">
 		<div class="container-fluid">
    	<!-- Brand and toggle get grouped for better mobile display -->
   			 <div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
     			</button>
     			<a class="navbar-brand" href="#">ShopBud</a>
    		 </div>
    	<!-- Collect the nav links, forms, and other content for toggling -->
    		<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
                <!--PUT NAVIGATION li HERE TO KEEP THEM CENTER ALIGNED-->
                	
                	<li ><a href="#"><strong><?php echo $_SESSION['username']; ?></strong></span></a></li>
                    	<li class="activeLink"><a href="#">Business</a></li>
        		
                   	<li ><a href="#">Contact</a></li>
        			<li><a href="#loginPopUp" data-toggle="modal" data-target="#loginPopUp">My Account</a></li>
      			</ul>
                        <!--PUT NAVIGATION li HERE TO KEEP RIGHT ALIGNED-->
     			<!--<ul class="nav navbar-nav navbar-right">
                
                                <li><a href="#" class="employers">Employers</a></li>
                                <li><a href="#">Jobs <span class="badge">42</span></a></li>
                	</ul>-->     
                        <!--<form id="navSearch" class="navbar-form navbar-right" role="search">
        			<div class="form-group">
          				<input type="text" class="form-control" placeholder="Job Search">
        			</div>
       				<button type="submit" class="btn btn-default">Search</button>
      			</form>	-->
    		</div><!-- /.navbar-collapse -->
            <div style="clear:both;"></div>
  		</div><!-- /.container-fluid -->
	</nav>
<div class="brand-main">
<div id="brand-navigation">
<img src="img/levis.jpg" width="250" style="float:left;margin-top:28px;margin-left:20px;"/><span style="float:left;margin-left:65px;margin-top:60px;font-family:verdana;font-size:30px;">
<?php
$link = mysqli_connect("localhost", "admin2", "123321", "dealers");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT bname from business where bid={$_SESSION['bid']}";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
echo "<strong>".$row['bname']."</strong><br/>"

?>


Welcome To Your ShopBud Business Portal</span>
</div>
</div>
<!----end brand name-->

<!----start navigation--->
<div class="container-fluid" style="padding-left:0px;padding-right:0px;">
<div class="navigation">
<div id="navbar">
<div class="row">
<div class="col-md-2"></div>
<a href="./dash.php"><div class="col-md-2"><div class="nav1" id="nav-menu">Dashboard</div></div></a>
<a href="./brand-portal.php"><div class="col-md-2"><div class="nav2" id="nav-menu">Upload Stock</div></div></a>

<div class="col-md-2"><div class="nav4" id="nav-menu">Messages</div></div>
<div class="col-md-2"><a href="logout.php" style="color:white;text-decoration:none;"><div class="nav5" id="nav-menu">Logout</div></a></div>
<div class="col-md-2"></div>
</div>
</div>
</div>
</div>
<!---end navigation--->

<!-----start stock------>
<div class="main-stock">
<div id="stock-offer">
<br><center><span style="display:block;font-size:20px;margin-top:0%;font-family:verdana;">Upload your stock and offers for the customers to know about it.  </span></center>



<div style="display:block;width:100%;height:90px;border:none;margin-top:30px;" id="stock1">
<form class="form-inline" action="./worker.php" method="POST">
    <input class="form-control input-lg" name="dname" type="text" placeholder="Offer Name" style="border-radius:0px;width:150px;" />
    <input class="form-control input-lg" name="ddesc" type="text" placeholder="Description" style="border-radius:0px;" />
    <select class="btn btn-default btn-lg dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true" name="category" style="border-radius:0px;">
    
   
                                    
                                    
                                  
                                 
                                    <option role="presentation" value ="1"><a role="menuitem" tabindex="-1" href="#">Electronics & Gadgets</a></option>
                                    <option role="presentation" value ="2"><a role="menuitem" tabindex="-1" href="#">Furniture</a></option>
                                    <option role="presentation" value ="3"><a role="menuitem" tabindex="-1" href="#">Clothing</a></option>
                                    <option role="presentation" value ="4"><a role="menuitem" tabindex="-1" href="#">Food & Drinks</a></option>
                                    <option role="presentation" value ="5"><a role="menuitem" tabindex="-1" href="#">Footwear & Accessories</a></option>
                                    <option role="presentation" value ="6"><a role="menuitem" tabindex="-1" href="#">Movies</a></option>
                                  
    </select>
  

<!--<div id="dd" class="wrapper-dropdown-3" tabindex="1">-->
    <!--<span style="margin-left:5px;">Disount name</span>--->
    	<!--<select name="Offers">
		<option value="christmas">Christmas sale</option>
		<option value="easter">Easter sale</option>
		<option value="clearance">Clearance sale</option>
		<option value="blackfriday">Black Friday sale</option>
		<option value="easter">New Year sale</option>
		<option value="other">Others</option>
  </select>
</div>

<div style="width:8%;height:16px;border:solid 1px #8AA8BD;outline:none;padding:15px;font-size:15px;letter-spacing:1px;color:#8AA8BD;margin-left:10px;float:left;margin-top:20px;background-color:white;">
<textarea name="descripion" rows="10" cols="30" style="float;left;width:70%;height:100%;margin-left:-5px;margin-top:-10px;outline:none;font-size:17px;text-align:center;border:none;color:#8AA8BD;">
&nbsp;%
</textarea>
</div>-->

<!--<div id="dd" class="wrapper-dropdown-4" tabindex="1">
    <span style="margin-left:5px;">Select a Category</span>
	<select name="Offers">
		<option value="electronics">Electronics and gadgets</option>
		<option value="furniture">Furniture</option>
		<option value="clothing">Clothing</option>
		<option value="food">Food and Beverages</option>
		<option value="footwear">Footwear</option>
		<option value="movies">Movies</option>
    </select>
	<span style="margin-left:5px;">Expiry date</span>
	<select name="Offers">
		<option value="lessthanten">less than 10 days</option>
		<option value="tentotwe">10-20 days</option>
		<option value="twetothi">20-30 days</option>
		<option value="thitofor">30-40 days</option>
		<option value="fortofif">40-50 days</option>
		<option value="fiftosix">50-60 days</option>
		<option value="sixtosev">greater than 60 days</option>
    </select>
 </div>-->
 
<!--<input type="Submit" value="Upload Image"  style="width: 19.5%;height: 48px;outline: none;cursor: pointer;border:none;background-color:#8AA8BD;padding: 15px;color:#fff;font-size: 15px;line-height: 11px;font-weight: 600;letter-spacing: 1px;margin-left: 10px;margin-top: 19.4px;"/>-->
<input type="Submit" value="Launch Offer" name="input" style="width: 19.5%;height: 48px;outline: none;cursor: pointer;border:none;background-color:#d7756c;padding: 15px;color:#fff;font-size: 15px;line-height: 11px;font-weight: 600;letter-spacing: 1px;margin-left: 10px;margin-top: 19.4px;"/>

<!--</div>-->

<!---end child stock--->
</form>

</div>
<!--<input type="Submit" value="Add another stock" onclick="test()" class="addstock" style="width: 16.9%;height: 48px;outline: none;cursor: pointer;border:none;background-color:#666;padding: 10px;color:#fff;font-size: 15px;line-height: 11px;font-weight: 600;letter-spacing: 1px;margin-top: 19.4px;margin-bottom: 19.4px;"/>-->

</div>

<!-----end stock--->
<!--THIS IS FOOTER-->
<section class="footer">
<div class="container-fluid"> 
    <div class="row">
        <div  class=" col-md-1" >
            
        </div>
        <div  class=" col-md-2" >
         	<h5 class="footerLeftColH">Information</h5> 
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.    
        </div>
        <div  class=" col-md-3" >
            <h5 class="footerColH">Privacy Policy</h5> 
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
        </div>
        <div  class="col-md-3" >
            <h5 class="footerColH">Terms of Use</h5> 
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
        </div>
        <div  class=" col-md-2" >
            <h5 class="footerRightColH">Connect</h5> 
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
        </div>
        <div  class=" col-md-1" >
            
        </div>
    </div>
</div>
</section>
<div class="container-fluid"> 
    <div class="row">
        <div  class=" col-md-12" style="text-align:center;">
        	All Rights Reserved 2015
        </div>
    </div>
    </div>   
</body>
</html> 
 