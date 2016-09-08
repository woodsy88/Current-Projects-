<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Gleneagles Construction Ltd. Quote Request Form</title>
	<meta name="description" content="Residential Commercial Renovation Basement Finishing">
    <meta name="keywords" content="basement,construction services,residential,commercial,design,build,project management" />
	<meta name="author" content="Web Design by: Hazel Rivera for Steve Lambie">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	 <link rel="shortcut icon" href="images/favicon.gif" type="images/x-icon"/>
 	 <link rel="stylesheet" type="text/css" href="css/desktop.css"/>
 	 <link rel="stylesheet" type="text/css" href="css/style.css"/>
     
     <script src="js/libs/modernizr-1.7.min.js"></script>
</head>
<body>
<!--Start container-->
<div class="container">
	<!--start header-->
	 <header id="logo">
    <hgroup>
	<!--start logo-->
	<h1>Gleneagles Construction Ltd.</h1>
	<h2>Residential &amp; Commercial Interiors</h2></hgroup></header>
	<!--end logo-->
	
	<!--start navigation menu -->
	<nav>  
    	<ul id="menu">
    	  <li><a href="index.html" title="Gleneagles Construction Ltd.">Home</a></li>
            <li><a href="residential.html" title="Residential & Basement Construction">Residential</a></li>
            <li><a href="commercial.html" title="Commercial Construction">Commercial</a>
            <li><a href="request-quote.php" title="Request a Quote In-Person">Request a Quote</a>
        </ul>
	</nav>	
	<!--end of navigation menu-->
<!--end header-->
</header>

<!--start intro-->
<div id="intro">
<img src="images/banner6.png" alt="banner">
</div>
<!--end intro-->

<!--start holder-->
<div class="holder_content2">
<section class="group1">
<div id="contact-form" class="clearfix">
    <h3>Request A Quote!</h3>
    <h5>We will reply to Quotation Request with budget pricing. For a firm fixed price we require meeting at work location.</h5>
            <?php
			//init variables
			$cf = array();
			$sr = false;
			
			if(isset($_SESSION['cf_returndata'])){
				$cf = $_SESSION['cf_returndata'];
			 	$sr = true;
			}
            ?>
            <ul id="errors" class="<?php echo ($sr && !$cf['form_ok']) ? 'visible' : ''; ?>">
                <li id="info">There were some problems with your form submission:</li>
                <?php 
				if(isset($cf['errors']) && count($cf['errors']) > 0) :
					foreach($cf['errors'] as $error) :
				?>
                <li><?php echo $error ?></li>
                <?php
					endforeach;
				endif;
				?>
            </ul>
            <p id="success" class="<?php echo ($sr && $cf['form_ok']) ? 'visible' : ''; ?>">Thanks for your message! We will get back to you ASAP!</p>
            <form method="post" action="process.php">
        <label for="name">Name: <span class="required">*</span></label>
        <input type="text" id="name" name="name" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['name'] : '' ?>" placeholder="John Doe" required autofocus />

        <label for="email">Email Address: <span class="required">*</span></label>
        <input type="email" id="email" name="email" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['email'] : '' ?>" placeholder="johndoe@example.com" required />

        <label for="telephone">Telephone: </label>
        <input type="telephone" id="telephone" name="telephone" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['telephone'] : '' ?>" />

        <label for="location">Location (city/region): <span class="required">*</span></label>
        <input type="text" id="location" name="location" value="<?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['location'] : '' ?>" required="required" />
        
        <label for="enquiry">Type of Work: </label>
        <select id="enquiry" name="enquiry">
            <option value="General" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'General') ? "selected='selected'" : '' ?>>General</option>
            <option value="Basement" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'asement') ? "selected='selected'" : '' ?>>Basement Finishing</option>
            <option value="Remodelling" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'Remodelling') ? "selected='selected'" : '' ?>>Remodelling</option>
            <option value="Services" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'Services') ? "selected='selected'" : '' ?>>Individual Services</option>
            <option value="ProjectManagement" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'ProjectManagement') ? "selected='selected'" : '' ?>>Project Management</option>
            <option value="Construction" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'Construction') ? "selected='selected'" : '' ?>>New Construction</option>            
            <option value="Other" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['enquiry'] == 'Other') ? "selected='selected'" : '' ?>>Other</option>
        </select>

        <label for="message">Details: <span class="required">*</span></label>
        <textarea id="message" name="message" placeholder="Your message must be greater than 20 charcters" required data-minlength="20"><?php echo ($sr && !$cf['form_ok']) ? $cf['posted_form_data']['message'] : '' ?></textarea>
        
        <label for="visit">Would you like to meet on site?: </label>
        <select id="visit" name="visit">
            <option value="Yes" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['visit'] == 'Yes') ? "selected='selected'" : '' ?>>Yes</option>
            <option value="No" <?php echo ($sr && !$cf['form_ok'] && $cf['posted_form_data']['visit'] == 'No') ? "selected='selected'" : '' ?>>No</option>
</select>

        <span id="loading"></span>
        <input type="submit" value="Get a Quote!" id="submit-button" />
        <p id="req-field-desc"><span class="required">*</span> indicates a required field</p>
    </form>
        </div></section>
    
    <!--Contact Info Sidebar-->
   <aside class="group2">
   <h3>Contact Us</h3>
   
   <article class="holder_contact">
	<h4>Phone: 905-874-9522<br></h4>
    
    <a href="mailto:info@gleneaglesconstruction.com?subject=Web Enquiries">info@gleneaglesconstruction.com</a><br>
    <h4>On Site Meeting: </h4><a href="mailto:estimator@gleneaglesconstruction.com?subject=Web Enquiries - On Site Meeting">estimator@gleneaglesconstruction.com</a><br>
    
    <h5><strong>Gleneagles Construction Ltd.</strong><br></h5>
    <p>41 Staveley Cres<br>
    Brampton, ON</p>
   </article>
   
   <!-- NEWS ARTICLES TO BE UPDATED REGULARLY -->

   <article class="holder_news">
   <h4>Basement Refinishing 
   <span>28.03.2012</span></h4>
   <p>Contact Us today to get a free quote at your home!	
   </article>
   
    <a class="photo_hover2" href="#"><img src="images/picture3.jpg" width="257" height="295" alt="picture"/></a>   </aside>

   </div>
	<!--end holder-->
</div>
<!--end container-->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>
	<!--[if lt IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('images, .png_bg');</script>
	<![endif]-->
    
<!--start footer-->
<footer>
<div class="foot" style="padding-top: 30px;">
<div id="footerOne" style="color:white;" align="center">&copy; 2012 Gleneagles Construction Ltd.</div>
<div id="footerTwo" style="color:white;" align="center">Valid html5, css3, design &amp; code by Hazel Rivera -hazelsgems</div></div>
</footer>
<!--end footer-->
</body>
</html>
