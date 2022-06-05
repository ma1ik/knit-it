<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/stylesheet.css">
	<title>Contact Us | Knit It</title>
</head>

<body>

<?php require "php_scripts/navbar.php" ?>

<div class="contact">
	<div class="contact_intro">

		<h1 class="contact_h1">Contact Us</h1>

	<h2 class="contact_h2">Please fill out the form below, and we'll get back to you as soon as possible.</h2>
	
	</div>
	<!--This is the contact form-->

	<div class="contact_form">

	<form action>

		<label for="name">Name: </label>
		<br>
		<input type="text" id="name" name="firstname">
		<br>
		<label for="email">Email</label>
		<br>
		<input type="text" name="message" id="email" placeholder="">
		<br>
		<label for="message" >Message</label>
		<br>
		<textarea id="message" name="message" placeholder="" style="height:300px"></textarea>
		<br>
		<input type="submit" value="Submit" id="submit">
	
	  </form>

	</div>

</div>

	<!--This is the FAQ container-->

	<div id="faq"> <!--Section for the FAQ page-->

<div class="faq-content"> <!--Entire FAQ div section container-->
	
	<div class="section-break"></div> 

	<div class="section-text">
	<span class="header-text-primary-bold">FAQ</span>
	</div>
	

	<div class="faq-main"> <!--faq for questions and answers-->

		<div class="faq-main-card">
			<span class="features-main-card-text-primary">The standard Lorem Ipsum passage, used since the 1500s</span>
			<span class="features-main-card-text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
		</div>

		<div class="faq-main-card">
			<span class="features-main-card-text-primary">How do I get in touch?</span>
			<span class="features-main-card-text-secondary">Email us: hello@knit-it.co.uk</span>
		</div>

		<div class="faq-main-card">
			<span class="features-main-card-text-primary">The standard Lorem Ipsum passage, used since the 1500s</span>
			<span class="features-main-card-text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
		</div>

		<div class="faq-main-card">
			<span class="features-main-card-text-primary">The standard Lorem Ipsum passage, used since the 1500s</span>
			<span class="features-main-card-text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
		</div>

	</div>

</div>

</div>


	<!--End of FAQ Container-->

 

<footer>
	<p class="a">Knit it || RGU Guardians</p>
</footer>
</body>
</html>