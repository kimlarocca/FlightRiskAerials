<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$amount = $_GET["amount"];
$studioID = 1;
$orderInfo = "Drop In";
$orderStatus = "incomplete";
$paypalButtonID = "9T427JNH7G8XA"; //$20

if ($amount==15) {
	$paypalButtonID = "683XQZVUDBXVW";
}
if ($amount==10) {
	$paypalButtonID = "E35RGF5X45KG4";
}
if ($amount==75) {
	$paypalButtonID = "SHAEBYDMX76TJ";
	$orderInfo = "4 Class Card";
}
if ($amount==120) {
	$paypalButtonID = "J9QMAS7P72Y3N"; 
	$orderInfo = "8 Class Card";
}
if ($amount==135) {
	$paypalButtonID = "S7FVKCYNMFLF6"; 
	$orderInfo = "Membership";
}
if ($amount==150) {
	$paypalButtonID = "B3TA75T56VQYN";
	$orderInfo = "Membership"; 
}
$amount = $amount;

$hostname_wotg = "localhost";
$database_wotg = "studiocm_cms";
$username_wotg = "studiocm_kim";
$password_wotg = "Lotus18641864!";
$wotg = mysql_pconnect($hostname_wotg, $username_wotg, $password_wotg) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_wotg, $wotg);
$query_order = "INSERT INTO orders (amount, studioID, orderInfo, orderStatus, notes) VALUES (".$amount.",".$studioID.",'".$orderInfo."','".$orderStatus."','no specific class specified')";
$order = mysql_query($query_order, $wotg) or die(mysql_error());
$orderID = mysql_insert_id();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Flight Risk Aerials | Pay Online</title>
<link rel="stylesheet" href="styles/styles.css" />
<link rel="import" href="favicon/favicon.html" />
</head>

<body>
<!-- header -->
<header id="header" class="header" role="banner">
  <div class="headerLeft">
    <div class="floatLeft"><a id="slide-menu" href="#sidr"><img src="images/slider-icon.png" width="50" height="50" border="0" alt="menu"></a></div>
    <div class="floatLeft headerMenu">menu</div>
  </div>
  <div class="headerRight">
    <nav>
      <ul>
        <li><a href="schedule.html">schedule</a></li>
        <li><a href="parties.html">private parties</a></li>
        <li><a href="faqs.html">faq</a></li>
        <li><a href="reserve.html">register</a></li>
      </ul>
    </nav>
  </div>
  <div class="headerRightMobile">
    <nav>
      <ul>
        <li><a href="reserve.html">register</a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- slide out menu -->
<nav>
<div id="sidr" style="display:none">
  <ul>
    <li class="biggerText"><a href="index.html">HOME</a></li>
    <li class="categoryEnd"></li>
    <li><a href="schedule.html">Class Schedule</a></li>
    <li><a href="reserve.html">Register Online</a></li>
    <li><a href="parties.html">Private Parties</a></li>
    <li><a href="workshops.html">Workshops &amp; Events</a></li>
    <li><a href="studio-rental.html">Studio Rental</a></li>
    <li><a href="faqs.html">FAQs</a></li>
    <li><a href="reviews.html">Reviews</a></li>
    <li><a href="videos.html">Videos</a></li>
    
    <li><a href="register.html">Buy Classes</a></li>
    <li><a href="register.html">Gift Certificates</a></li>
    <li><a href="contact.html">Directions / Contact Us</a></li>
    <li><a href="http://visitor.constantcontact.com/d.jsp?m=1103105356514&p=oi" target="_blank">Join Our Mailing List</a></li>
    <li class="categoryEnd"></li>
    <li class="biggerText"><a href="pole-dance.html">POLE DANCE</a></li>
    <li class="biggerText"><a href="aerial-silks.html">AERIAL SILKS</a></li>
    <li class="biggerText"><a href="lyra.html">LYRA</a></li>
    <li class="biggerText"><a href="bellydance.html">BELLYDANCE</a></li>
    <li>&nbsp;</li>
  </ul>
</div>
</nav>
<div class="main-container">
  <h1><a href="index.html" class="green-link">Flight Risk Aerials</a> Save Time! Pay Online</h1>
  <div class="column1">
    <div class="column1-row1"><a href="index.html"><img src="images/logo-new.jpg" width="200" height="200"></a></div>
    <div class="column1-row2"><img src="images/200-200/social.png" border="0" usemap="#Map">
      <map name="Map">
        <area shape="rect" coords="-8,-6,92,95" href="https://www.facebook.com/groups/onthegreen/" target="_new" alt="Flight Risk Aerials on Facebook">
        <area shape="rect" coords="106,-8,215,93" href="http://www.youtube.com/user/wellnessonthegreen" target="_blank" alt="Flight Risk Aerials on YouTube">
        <area shape="rect" coords="107,106,212,213" href="https://twitter.com/dancemorristown" target="_blank" alt="Flight Risk Aerials on Twitter">
        <area shape="rect" coords="-1,104,93,249" href="http://www.pinterest.com/dancemorristown/" target="_blank" alt="Flight Risk Aerials on Pinterest">
      </map>
    </div>
    <div class="column1-row3"><a href="parties.html"><img src="images/200-200/bachelorette-parties.jpg" width="200" height="200"></a></div>
  </div>
  <div class="column2">
    <div class="content left">
      <p class="margin20">You have selected a <strong><?php echo $orderInfo; ?> for $<?php echo $amount*.75; ?></strong>. If this is not correct, <a href="register.html">click here to go back and choose again</a>.</p>
      
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_parent" style="margin-left: 10px">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="<?php echo $paypalButtonID ?>">
        <strong>
        <input style="padding:20px 0 0 0" type="image" src="images/paypal.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1"> &nbsp;&nbsp;
      </form>
      
      <p>&nbsp;</p>
      <p align="justify"><em>* Class packages and membership fees are non-refundable once they are used! You may, however, upgrade your prepaid class package to a membership at any time, or downgrade your membership to a class package (providing you have not used it yet). Drop in fees are also non-refundable - if you attend a class you are expected to pay for it!</em></p>
    </div>
  </div>
</div>
<!-- main-content -->
<div class="clearfloat10"></div>
<div class="footer">
  <div class="clearFloat margin20"><img src="images/lotus.png" width="150" height="43" alt="Flight Risk Aerials, morristown nj fitness class, morristown nj dance class, morristown nj massage" /></div>
  <p> <a href="index.html">Flight Risk Aerials</a> is located in the Randolph Business Campus at 961 Rt 10 E, Randolph NJ. <a href="contact.html">Click here for directions!</a></p>
</div>
<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script>
jQuery(document).ready(function() {
    $('body iframe').load(function(){
         $(window).scrollTop(0);
    });
});
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-4037303-6', 'auto');
  ga('require', 'linkid', 'linkid.js');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script> 
<script type="text/javascript" src="scripts/jquery.sidr.min.js"></script><script type="text/javascript" src="scripts/scripts.js"></script>
</body>
</html>