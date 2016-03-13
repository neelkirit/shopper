<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['bid'])){
	header('Location: index.php?scams=1');
}
$link = mysqli_connect("localhost", "admin2", "123321", "dealers");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}?>

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

<link rel="stylesheet" href="dash.css">
<!--FONT INCLUDES= FONT AWESOME 4.2.0-->
<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.min.css">
<style>
body{
	padding-top:50px !important;
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
        	<link href="brand-portal1.css" type="text/css" rel="stylesheet" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
<script src="js/modernizr.custom.79639.js"></script>
<script src="js/jquery.js"></script>
<script src="js/Chart.js"></script>
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

<?php 
$query = "SELECT sum(hits) as hits from discount where bid={$_SESSION["bid"]}";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$discounthits = $row["hits"];
$query = "SELECT category.hits from category,business where category.cid=business.cid and bid={$_SESSION["bid"]}";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$categoryhits = $row["hits"];


?>

<script type="text/javascript">
$(function () {

    $('#container2').highcharts({
        chart: {
            type: 'pyramid',
            marginRight: 0
        },
        title: {
		text: 'Market Penetration',
            x: -50
            
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b> ({point.y:,.0f})',
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    softConnector: true
                }
            }
        },
        legend: {
            enabled: false
        },
        series: [{
            name: 'Unique users',
            data: [
                ['Category visits',   <?php echo $categoryhits; ?>],
                ['Offer visits',      <?php echo $discounthits; ?>],
                
            ]
        }]
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
                
                                <li><a href="#" class="employers"><strong><?php echo $_SESSION['username']; ?></strong></a></li>
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
<img src="img/levis.jpg" width="250" style="float:left;margin-top:28px;margin-left:20px;"/><span style="float:left;margin-left:65px;margin-top:60px;font-size:30px;">

<?php

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
<br><center><span style="display:block;font-size:20px;margin-top:0%;">Analytics and Statistics helps you grow Faster </span></center>



<div style="display:block;width:100%;border:none;margin-top:30px;" id="stock1">

<div class="row">
<div class="col-md-6" style="color:#d7756c;"><h3>10% Off on Mobiles</h3></div>
<div class="col-md-6" style="text-align:right;"><span class="btn btn-default btn-lg">Electronics & Gadgets</span></div>


</div>
<hr>

<div class="row">
<div class="col-md-12" style="text-align:center;"><h4><span style="color:#d7756c;">Total No. of Clicks:</span>
<?php 
$query = "SELECT sum(hits) as hits from category";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
echo $row["hits"];
?>
</h4></div>
</div>


<div class="row">
<div class="col-md-6" style="color:#d7756c;text-align:center;"><h3>Category based Clicks</h3>



<div id="canvas-holder">
			<canvas id="chart-area" width="300" height="300"/>
		</div>


	<script>
<?php
$query = "SELECT hits from category where cid=1";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$c1 = $row["hits"];

$query = "SELECT hits from category where cid=2";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$c2 = $row["hits"];

$query = "SELECT hits from category where cid=3";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$c3 = $row["hits"];

$query = "SELECT hits from category where cid=4";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$c4 = $row["hits"];

$query = "SELECT hits from category where cid=5";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$c5 = $row["hits"];

$query = "SELECT hits from category where cid=6";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);
$c6 = $row["hits"];
?>
		var pieData = [
				{
					value: <?php echo $c1 ?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Electronic & Gadgets"
				},
				{
					value: <?php echo $c2 ?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Furniture"
				},
				{
					value: <?php echo $c3 ?>,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Clothing"
				},
				{
					value: <?php echo $c4 ?>,
					color: "#949FC1",
					highlight: "#A8B3C5",
					label: "Food & Beverages"
				},
				{
					value: <?php echo $c5 ?>,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Footwear & Accessories"
				},
				{
					value: <?php echo $c6 ?>,
					color: "#4D5360",
					highlight: "#616774",
					label: "Movies"
				}

			];

			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);
			};



	</script>




</div>
<div class="col-md-6" style="color:#d7756c;text-align:center;">


<script src="js/highcharts.js"></script>
<script src="js/funnel.js"></script>
<script src="js/exporting.js"></script>

<div id="container2" style="style="min-width: 410px; max-width: 600px; height: 350px; margin: 0 auto"></div>


	









</div>
</div>



</div>
<!--<input type="Submit" value="Add another stock" onclick="test()" class="addstock" style="width: 16.9%;height: 48px;outline: none;cursor: pointer;border:none;background-color:#666;padding: 10px;color:#fff;font-size: 15px;line-height: 11px;font-weight: 600;letter-spacing: 1px;margin-top: 19.4px;margin-bottom: 19.4px;"/>-->

</div>
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
 