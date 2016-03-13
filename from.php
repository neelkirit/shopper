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
<!doctype html>
<html>
<!--this is new-->






<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
  
        	<link href="index.css" type="text/css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
<script src="js/modernizr.custom.79639.js"></script>
<script src="jquery.js"></script>
<script src="src/jquery.vide.js"></script>
<script src="js/jquery-1.7.2.js"></script>
	<script type="text/javascript">

$(document).ready(function () {
	$('.lightbox, .dialog-box1').show();		
		

	// if user clicked on button, the overlay layer or the dialogbox, close the dialog	
	$('#close').click(function () {		
		$('.lightbox, .dialog-box1').hide();		
		return false;
	});
	
	$('#find').click(function () {		
		
	});

	// if user resize the window, call the same function again
	// to make sure the overlay fills the screen and dialogbox aligned to center	
	$(window).resize(function () {
		
		//only do it if the dialog box is not hidden
		if (!$('.dialog-box1').is(':hidden')) popup();		
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
	</head>
<body>



<div class="main">

<!------start nav-bar---->
<div id="navbar">
<div class="nav-logo">Addroit</div>
</div>
<!------end nav-bar---->

<!------search and content---->

<div id="pre">
<form action="from.php" method="post">
<div class="searchbox"><input type="search" id="search" name="search" placeholder="Change Location" value="Bangalore"/>

<div id="dd" class="wrapper-dropdown-3" tabindex="1">
    <span>Select a Mall</span>
    <ul class="dropdown">
        <li><a href="#"><i class="icon-envelope icon-large"></i>Garuda Swagat</a></li>
        <li><a href="#"><i class="icon-truck icon-large"></i>Gopalan</a></li>
        <li><a href="#"><i class="icon-plane icon-large"></i>Pheonix</a></li>
		<li><a href="#"><i class="icon-envelope icon-large"></i>Orion</a></li>
        <li><a href="#"><i class="icon-envelope icon-large"></i>Central</a></li>
		<li><a href="#"><i class="icon-envelope icon-large"></i>Royal meenakshi</a></li>


    </ul>
</div>

<input type="submit" name="Find" id="find" value="Find"/>
</div>

<div id="categories">
<input type="radio" id="radio1" class="r1" name="radios" value="1" checked>
       <label for="radio1" class="radio-label-1">Electronics and Gadgets</label>
    <input type="radio" id="radio2" name="radios" value="2">
       <label for="radio2" class="radio-label-2">Furniture</label>
    <input type="radio" id="radio3" name="radios" value="3">
       <label for="radio3" class="radio-label-3">Clothing</label>
	   <input type="radio" id="radio4" name="radios" value="4">
       <label for="radio4" class="radio-label-4">Food & Beverages</label>
	   	   <input type="radio" id="radio5" name="radios" value="5">
       <label for="radio5" class="radio-label-5">Footwear & Acessories</label>
	   	   	   <input type="radio" id="radio6" name="radios" value="6">
       <label for="radio6" class="radio-label-6">Movies</label>
	   
	   </div>
</form>
</div>

<!------end search and content---->

</div>

<!-------end main---------->


<div class="download">
<div id="download-content">

<div id="install-app">
<h3>Download Addroit App</h3>
<a href="#" target="_blank"><div class="iphone-app">
<span>Available on the</span><br><div style="font-weight:600;margin-left:32%;color:#fff;font-size:28px;">App Store</div>
</div>
</a>

<a href="#" target="_blank"><div class="android-app">
<span>Available on </span><br><div style="font-weight:600;margin-left:32%;color:#fff;font-size:28px;">Android</div>
</div>
</a>

</div>

<div id="iphone-interface">
<b></b>
</div>

</div>
</div>

<!-------------end about--------->

<div class="about">
<div id="about-content">
<h1 style="text-align:center;font-weight:600;letter-spacing:2px;font-family: Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;color:#fff;">ABOUT ADDROIT</h1>
<div style="text-align:center;font-weight:600;font-size:22px;letter-spacing:2px;font-family: Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;color:#fff;">
Marking customers experience more easy and comfortable .</div>

<div class="one-third">
<div class="service1">
<img src="img/network.png"></img>
<h4>Networks</h4>
<h6 class="txtjust1">Device and media fragmentation has taken the publishing industry by storm. The traditional way of doing things no longer guarantees survival - in fact, it more than likely guarantees failure.</h6>
</div>
</div>

<div class="two-third">
<div class="service2">
<img src="img/customer.png"></img>
<h4>Bond between Retailer and customer</h4>
<h6 class="txtjust2">Device and media fragmentation has taken the publishing industry by storm. The traditional way of doing things no longer guarantees survival - in fact, it more than likely guarantees failure.</h6>
</div>
</div>


<div class="three-third">
<div class="service3">
<img src="img/growth.png"></img>
<h4>Increase Sales Growth</h4>
<h6 class="txtjust3">Device and media fragmentation has taken the publishing industry by storm. The traditional way of doing things no longer guarantees survival - in fact, it more than likely guarantees failure.</h6>
</div>
</div>

</div>
</div>

<!------ end about-------->

<div class="footer">
<div id="footer-content">

<div id="install-app-foot">

<a href="#" target="_blank"><div class="iphone-app-foot">
<span>Available on the</span><br><div style="font-weight:600;margin-left:32%;color:#fff;font-size:28px;">App Store</div>
</div>
</a>

<a href="#" target="_blank"><div class="android-app-foot">
<span>Available on </span><br><div style="font-weight:600;margin-left:32%;color:#fff;font-size:28px;">Android</div>
</div>
</a>

</div>


<div id="social">
<a href="#" target="_blank"><div class="social-t"><img src="img/icon-twitter.png" width="36" height="36" style="margin-top:16px;margin-left:18px;"></img></div></a>
<a href="#" target="_blank"><div class="social-f"><img src="img/icon-fb.png" width="36" height="36" style="margin-top:16px;margin-left:18px;"></img></div></a>
</div>

<div class="footend">

<a href="#" class="cnt">
Contact
</a>


<a href="#" class="tmu">
Terms of Use
</a>

<a href="#" class="prp">
Privacy Policy
</a>

<span>&copy; 2014 Addroit </span>
</div>

</div>
</div>

<!-------end footer------->

<div class="lightbox">
<div class="dialog-box1">
<div id="dialog-header">
<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
    <label for="tab-1" class="tab-label-1">Electronic and Gadgets</label>
     
    <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
    <label for="tab-2" class="tab-label-2">Furniture</label>
     
    <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
    <label for="tab-3" class="tab-label-3">Clothing</label>
     
    <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
    <label for="tab-4" class="tab-label-4">Food and Beverages</label>
             	  
				      <input id="tab-5" type="radio" name="radio-set" class="tab-selector-5" />
    <label for="tab-5" class="tab-label-5">Footwear and Accesories</label>

				 				      <input id="tab-6" type="radio" name="radio-set" class="tab-selector-6" />
    <label for="tab-6" class="tab-label-6">Movies</label> 
</div>

	  <div class="dialog-content">
	  
	<ul>
	  
	  <li>
	   <div id="category-pic"><img src="img/tommy.png" width="60" height="60"/></div>
	   <div id="product-content">
	   
           
           
           
           <span><?php
$mall = $_POST["mall"];
$id   = $_POST['radios'];
$query = "SELECT bname,description,floor,shopno,city from business where cid={$id} and mall like '%".$mall."%'";
$result = mysqli_query($link, $query);
while($record=mysql_fetch_assoc($result)){
while(list($fieldname,$fieldvalue)=each($record)){
echo "<div id='product-offer-content'>".$fieldvalue."</div>";
}

}

	   
?></span>
	   
	   <!--<div id="product-offer-content">30% off on Jeans + 10% off on other purchases.</div>
	   
	   <div id="mall-name"> Mall : <span>Fun Republic</span>  &nbsp;|&nbsp; Place : <span>Hazratganj , Lucknow</span> </div>
	   
	   </div>
	  <div id="product-mall-floor"><span>Floor No.</span><p>5</p></div>
	  </li>
	  	
			  <li>
	   <div id="category-pic"><img src="img/levis.jpg" width="60" height="60"/></div>
	   <div id="product-content">
	   <span>Levis Strauss & Co</span>
	   
	   <div id="product-offer-content">50% off on Jeans + 20% off on other purchases.</div>
	   
	   <div id="mall-name"> Mall : <span>Fun Republic , Saharaganj</span>  &nbsp;|&nbsp; Place : <span>Hazratganj , Lucknow</span> </div>
	   
	   </div>
	  <div id="product-mall-floor"><span>Floor No.</span><p>3</p></div>
	  </li>

	  
	    <li>
	   <div id="category-pic"><img src="img/tommy.png" width="60" height="60"/></div>
	   <div id="product-content">
	   <span>Tommy Hilfiger</span>
	   
	   <div id="product-offer-content">30% off on Jeans + 10% off on other purchases.</div>
	   
	   <div id="mall-name"> Mall : <span>Fun Republic</span>  &nbsp;|&nbsp; Place : <span>Hazratganj , Lucknow</span> </div>
	   
	   </div>
	  <div id="product-mall-floor"><span>Floor No.</span><p>5</p></div>
	  </li>
	  	
			  <li>
	   <div id="category-pic"><img src="img/levis.jpg" width="60" height="60"/></div>
	   <div id="product-content">
	   <span>Levis Strauss & Co</span>
	   
	   <div id="product-offer-content">50% off on Jeans + 20% off on other purchases.</div>
	   
	   <div id="mall-name"> Mall : <span>Fun Republic , Saharaganj</span>  &nbsp;|&nbsp; Place : <span>Hazratganj , Lucknow</span> </div>
	   
	   </div>
	  <div id="product-mall-floor"><span>Floor No.</span><p>3</p></div>
	  </li>-->

	  

		
	<!-- </ul>-->
	  
	  
	  
	   </div>
	  
	  <div class="dialog-footer"><span style="float:left;margin-top:1px;margin-left:20px;color:#333;font-weight:600;">1 result so far .</span>

<input type="submit" value="Close" id="close"/>
	  </div>
	  
</div>

<!-------end all div before lightbox-content and lightbox------>




</div>
<!-------lightbox ends ------>



</body>
</html>

</body>
</html>