<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['bid'])){
	header('Location: brand-portal.php');
}


?>
<html>

<head>
<!--CSS INCLUDES-->
<!--1. Bootstrap CSS LOW PREFERENCE-->
<link rel="stylesheet" href="css/bootstrap.css">
<!--2. Template CSS HIGH PREFERENCE-->
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/add.css">
<!--FONT INCLUDES= FONT AWESOME 4.2.0-->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<!--JS INCLUDES-->
<!--Jquery 1.11.2-->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<!--Bootstrap Js-->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places"></script>
<!--PAGE CSS TO OVERRIDE INCLUDES CSS-->
<script type="text/javascript"> 
  var geocoder;

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}

  function initialize() {
    geocoder = new google.maps.Geocoder();
}

  function codeLatLng(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'location': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
         console.log(results[0].formatted_address);
         $('.userlocation').html(results[0].formatted_address);
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        console.log(city.short_name + " " + city.long_name);


        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
</script> 
<!--STYLES WRITTEN HERE ARE SPECIFIC TO THIS PAGE ONLY
THEY OVER WRITE THE STYLES WRITTEN FOR ALL OTHER PAGES
DO NOT TRANSFER THEM TO styles.css PAGE-->
<script type="text/javascript">
$(window).load(function(){
initialize();

<?php
if(isset($_POST['radios']) && isset($_POST['mall'])){
  echo "
        $('#searchPopUp').modal('show');
   ";
  }
?>
 });
</script>
<style>
/*RESET HOME PAGE*/
*{
	margin:0;
	padding:0;
}
body{
	
	}
/*HOME PAGE PICTURE THAT HAS SEARCH BOX*/
.banner{
	background-image:url(img/background.jpg);/* CHANGE THE BACKGROUND IMAGE HERE*/
	background-attachment: fixed; /*TO PREVENT IMAGE FROM SCROLLING WHEN PAGE SCROLLS*/
	background-position: left bottom; /*POSITION OF IMAGE HORIZONTALLY AND VERTICALLY ; IMPORTANT WHEN WINDOW IS RESIXED*/
	background-size:cover; /*TO COMPLETELY COVER THE DIV*/
	height:450px; /*HEIGHT OF IMAGE DIV*/
}
/*SEMI TRANSPARENT SEARCH BOX ON THE IMAGE*/
.bannerBox{
	background-color:rgba(0,0,0,0.4);  /*CHANGE COLOR AND TRANSPARENCY HERE*/
	margin-top:5%;  /*KEEP % VALUE FOR RESPONSIVE*/
	height:65%;   /*KEEP % VALUE FOR RESPONSIVE*/
	border-radius:10px; /*TO MAKE THE BOX CURVED*/
	color:#FFF;  /*CHANGE  TEXT COLOR HERE */
	font-size:1.5vw; /*CHANGE TEXT SIZE HERE*/
}
/*BUTTON STYLES*/
.bannerBox button{
	border-radius:0px; 
}
.btn{
	border-radius:0px; 
}
/*INPUT BOX STYLES*/
/*APPLIES TO select industry, location, experience, salary search box INPUT FIELDS*/
.bannerBox input{
	height:45px;	/*HEIGHT OF INPUT BOX*/
	border-radius:0px; /*TO MAKE THEM RECTANGLE*/
}
/*SEARCH BY CATEGORY NAVIGATION MENU*/
/*INFO: THIS IS A NAVIGATION MENU ADD ITEMS IN li TAGS*/
.bannerNav{
	z-index:20; /*Z INDEX TO OVERLAP THE COLLAPSED MENU OVER THE BODY*/
	/*DO NOT DECREASE THE VALUE LESS THAN SUCCEDING DIV*/
	}
/*BANNER OVER*/
/*DIVS SPECIFIC TO HOMEPAGE*/
.feeds,.featuredJobs,.advt1{
	height:400px;
	margin-top:1%;
	margin-bottom:1%;
	border-radius:0px;
}
.feeds{
	background-color:rgba(0,0,0,.1); /*FEEEDS DIV BG COLOR*/
	z-index:-10;
}
.featuredJobs a{
	color:#999;
}
.partner,.clients{
	height:100px;
	margin-top:1%;
	margin-bottom:3%;
	border-radius:0px;
	text-align:center;
}
.partner img{
	filter: grayscale(100%);  /*TO MAKE IMAGE GRAY SCALE*/
	-webkit-filter: grayscale(100%);   /*TO MAKE IMAGE GRAY SCALE*/
}
.clients img{
	filter: grayscale(100%); /*TO MAKE IMAGE GRAY SCALE*/
	-webkit-filter: grayscale(100%);  /*TO MAKE IMAGE GRAY SCALE*/
}
.subHeadBody{
	margin-top:2%;
	text-align:center;
}
.testimonial{
	background-color: #39393c; /*TESTIMONIAL BACKGROUN COLOR*/
	color:#CCC; /*TESTIMONIAL TEXT COLOR*/
	text-align:left;
}

</style>
<title>
Shop Bud
</title>
<link href='http://fonts.googleapis.com/css?family=Abel|Overlock' rel='stylesheet' type='text/css'>
<!--FONT CSS-->
</head>
<body>
<!--THIS IS HEADER-->
<section class="header">
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
                	<li class="activeLink"><a href="#">About<span class="sr-only">(current)</span></a></li>
                    	<li><a href="#">Business</a></li>
        		
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
    <!--LOGIN POPUP-->
<div class=" modal fade" id="loginPopUp">
  <div class="modal-dialog">
    <div class="loginBox modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Login</h4>
      </div>
      <form class="form-horizontal" id="loginForm" action="./loginproc.php" method="POST">
      <div class="modal-body">
           <!-- <div class="radioButton btn-group" data-toggle="buttons" >
                  <label class="btn btn-default active">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Employer
                  </label>
                  <label class="btn btn-default">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Job Seeker
                  </label>
                  
            </div>-->
            <br />
            
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password"> 
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me
                        </label>
                      </div>
                    </div>
                  </div>
  			
          
             
  			
            <div class="loginOptions1">
      <a href="#" id="retrievePwd">Trouble Logging In?</a> 
      <script>
	  $(document).ready(function(){
		  $('#option1').click(function(){
		  $('#option1').button('toggle');
		  $('#option2').button('toggle');});
		  $('#option2').click(function(){
		  $('#option1').button('toggle');
		  $('#option2').button('toggle');});
		  $('#forgotPasswordForm').hide();
		  	$('#retrievePwd').click(function(){
					$('#forgotPasswordForm').show();
					$('#loginForm').hide();
					$('#retrievePwd').hide();
					$('#signInButton').html('Retrieve');
				});
		  });
	  </script>
      </div>
      </div>
                 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn " id="signInButton" value="Sign In" />
        
        <div class="loginOptions2">
        Not a member yet? <a href="./register.html">Register Now</a>
        </div>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</section>
<!--THIS IS CONTENT-->
<section>
<form action="./index.php" method="POST">
<div class="banner container-fluid"><!-- Stack the columns on mobile by making one full-width and the other half-width -->
<div class="bannerBox">
	<div class="row" style="padding-top:5%;padding-bottom:1%;">
  		
  		<div class="col-md-2"></div>
  			<div class=" col-md-8" >
          		
        
   			<div class="input-group">
     			<input type="text" class="form-control" name="mall" placeholder="Search Anything">
      			<span class="input-group-btn">
        		<a href="index.php" ><button type="submit" value="search"  class="btn btn-default btn-lg" style="background-color:#d7756c;color:#fff;" >Search!</button></a>
      			</span>
    		</div><!-- /input-group -->
            <!--<p class="subHead">
            Search by Category
            
            
            YAHA HAI LOCATION DIV
            
            
            </p>-->
            </div>
  		<div class=" col-md-2"></div>
	</div>
        
        <div class="row" style="padding-bottom:2%">
           	<div class=" col-md-2"></div>
      		<div class=" col-md-8" style="text-align:right;color:#fff;"> <i class="fa fa-map-marker"></i> <span class="userlocation"></span> </div>
                <div class=" col-md-2"></div>
         </div>
         
            <div class="row" style="padding-top:1%;padding-bottom:3%;">
            <div class="col-md-2"></div>
      		<div class=" col-md-8">
                	<div class="radioButton2 btn-group" data-toggle="buttons" >
                                  <label class="btn btn-default btn-lg active">
                                    <input type="radio" name="radios" value="1" id="shop1" autocomplete="off" checked> Electronics & Gadgets
                                  </label>
                                  <label class="btn btn-default btn-lg">
                                    <input type="radio" name="radios" value="2" id="shop2" autocomplete="off"> Furniture
                                  </label>
                                  <label class="btn btn-default btn-lg">
                                    <input type="radio" name="radios" value="3" id="shop3" autocomplete="off"> Clothing
                                  </label>
                                  <label class="btn btn-default btn-lg">
                                    <input type="radio" name="radios" value="4"  id="shop4" autocomplete="off"> Food & Drinks
                                  </label>
                                  <label class="btn btn-default btn-lg">
                                    <input type="radio" name="radios" value="5" id="shop5" autocomplete="off"> Footwear & Accessories
                                  </label>
                                  <label class="btn btn-default btn-lg">
                                    <input type="radio" name="radios" value="6" id="shop6" autocomplete="off"> Movies
                                  </label>
                                  
                  
            		</div>
                    </div>
                    <div class="col-md-2"></div>
                 
                
      		<!--<div class="col-md-2">
                	
                </div>
                <div class="col-md-2">
                	
                </div>
                <div class="col-md-2">
                	
                </div>
                <div class="col-md-2">
                	
                </div>
                <div class="col-md-2">
                	
                </div>-->
      		</div>
          </div>
            <!--<nav class="bannerNav navbar navbar-default">
 		<div class="container ">
    	
   			 <div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
     			</button>
    		 </div>
    	
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      			<ul class="nav navbar-nav">
               
                	<li ><a href="#" class="bannerLink">All Jobs</a></li>
                    <li><a href="#" class="bannerLink">Govt Jobs</a></li>
        			<li><a href="#" class="bannerLink">International Jobs</a></li>
                    <li ><a href="#" class="bannerLink">Special Jobs</a></li>
        			<li><a href="#" class="bannerLink">Contract Jobs</a></li>
                     <li ><a href="#" class="bannerLink">IIT Jobs</a></li>
        			<li><a href="#" class="bannerLink">PSU Jobs</a></li>
      			</ul>
     				
    		</div>
  		</div>
	</nav>-->
  		
</div>
</form>
<!--THIS IS SEARCH RESULTS BRO PUT PHP HERE-->
<!--LOGIN POPUP-->
                                                  <div class=" modal fade" id="searchPopUp">
                                                    <div class="modal-dialog">
                                                      <div class="loginBox modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                          <h4 class="modal-title">Results</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                             

<?php
$link = mysqli_connect("localhost", "admin2", "123321", "dealers");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_POST["mall"]) && isset($_POST["radios"])){
  
  $mall = $_POST["mall"];
  $id   = $_POST['radios'];
  $query = "UPDATE category SET hits = hits + 1 WHERE cid = {$id}";
  $result = mysqli_query($link, $query);
  $query = "SELECT bid,bname,description,floor,shopno,city,mall from business where cid={$id}";
  $result = mysqli_query($link, $query);
  while($userdata = mysqli_fetch_assoc($result)) {
    echo '<a href="./business.php?business='.$userdata["bid"].'"><div style="font-weight:700;color:#d7756c;"><h3>'.$userdata["bname"]."</h3></div><div style='font-weight:600;'>".$userdata["floor"]."st Floor, ".$userdata["mall"]."</div><div>".$userdata["city"]."</div></a>".'<hr/>';
  }
  $query = "SELECT bid,did,dname,ddesc from discount where cid={$id}";
  $result = mysqli_query($link, $query);
  while($userdata = mysqli_fetch_assoc($result)) {
    echo '<a href="./business.php?business='.$userdata["bid"].'&discount='.$userdata["did"].'"><div style="font-weight:700;color:#d7756c;font-size:24px;">'.$userdata["dname"]."</div><div>".$userdata["ddesc"]."</div></a><hr/>".'';
  }
  echo "<hr/>";
}

class jd{
    public $rawEvents;
    
    function getAll($search,$place){
        $url = 'http://www.justdial.com/index.php?city='.$place.'&what='.$search.'&where=&catid=&type=1&group=&itab=0&classic=0&asflg=undefined&enflg=undefined&prid=&ncatid1=&psearch=&sfsearch=&reshref=&jdg=';
        $options = array(
                'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'GET'
            )
        );
        
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
       
        $dom = new DOMDocument();
        @$dom->loadHTML($result);
        $xpath = new DOMXPath($dom);
        $bname = $xpath->query("//span[@class='jcn ']");
        $bph = $xpath->query("//p[@class='jrcw']");
        $bloc = $xpath->query("//span[@class='jaddt']");
        
        $root = $xpath->query("//aside[@class='compdt']");
        /*
        foreach ($bname as $name) {
            foreach ($xpath->query('a', $name) as $child) {
                echo $child->nodeValue, PHP_EOL;
                echo "<br/>";
         }
    }
    
    echo "<hr/>";*/
    $counter = 1;
    foreach ($root as $name) {
            foreach ($xpath->query('p', $name) as $child) {
                if($counter !=4){
                    echo $child->nodeValue, PHP_EOL;
                    echo '<br/>';
                    $counter++;
                }
                else{
                    $counter = 1;
                    echo "<hr/>";
                } 
         }
    }
    
    
        
        
        //$this->rawEvents = $element->item(0)->childNodes; 
        //echo $bname;    
    
    }
    
   
    
   
}
$m = new jd();

$m->getAll(urlencode($mall),"Bangalore");
?>


                                                              <br />
                                                              
                                                          
                                                        </div>
                                                      </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                  </div><!-- /.modal -->
<!--SEARCH RESULTS  END HERE -->
<!--BANNER END
MAIN BODY STARTS-->
<div class="container-fluid" style="padding-left:0px;padding-right:0px;"> 
<!--1ST ROW-->
<div class="about">
<div id="about-content">
<div class="tk" style="margin-top:0px !important;padding-top:20px;">
<h3 >ABOUT ADDROIT</h3>
</div>
<div class="tk1">
Making customers experience more easy and comfortable .
</div>
<div class="row">
        <div class="col-md-4" style="text-align:center;">
        <div class="one-third">
        <div class="service1">
        <img src="img/network.png"></img>
        <h4>Networks</h4>
        <h6 class="txtjust1">Device and media fragmentation has taken the publishing industry by storm. The traditional way of doing things no longer guarantees survival - in fact, it more than likely guarantees failure.</h6>
        </div>
        </div>
        </div>
        
        <div class="col-md-4" style="text-align:center;">
<div class="two-third">
<div class="service2">
<img src="img/customer.png"></img>
<h4>Bond between Retailer and customer</h4>
<h6 class="txtjust2">Device and media fragmentation has taken the publishing industry by storm. The traditional way of doing things no longer guarantees survival - in fact, it more than likely guarantees failure.</h6>
</div>
</div>
	</div>

	<div class="col-md-4" style="text-align:center;">
<div class="three-third">
<div class="service3">
<img src="img/growth.png"></img>
<h4>Increase Sales Growth</h4>
<h6 class="txtjust3">Device and media fragmentation has taken the publishing industry by storm. The traditional way of doing things no longer guarantees survival - in fact, it more than likely guarantees failure.</h6>
</div>
</div>
	</div>
        </div>
</div>
</div>

<!------ end about--------> 
    
   

<!--2ND ROW  -->  
     
<!--3RD ROW  -->  
    
<!--4TD ROW-->
   
<!--5TH ROW -->  
     
<!--6TH ROW-->
    
    </div>
</section>
<!--CONTENT SECTION ENDS-->
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

<!--PAGE JAVASCRIPT-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.3.0/jquery.flexslider-min.js"></script>
<script src="js/main.js"></script>
<script>


</script>

</html>