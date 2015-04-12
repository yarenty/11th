<?php 
include_once 'lib/includes.php';
include_once 'lib/functions/default.php';

$page='contact';
@include 'template/head.phtml';
$title = "Contact";
@include 'template/top.phtml';


$success = false;
if (isset($_POST["name"])) {
	$name =$_POST["name"];
	$mail =$_POST["email"];
	$body =$_POST["message"];
	
	Mails::contact($mail, $name, $body);
	$success = true;
}


if (!$success)
{
?>


    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact</h2>
                    <h3 class="section-subheading text-muted">Any feedback - welcome.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" validate method="POST" action="contact.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name *" id="name" name="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" id="message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                            <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <br/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?
}
else
{
?>
<div class="container thanks">
<div class="jumbotron">
  <h1>THANKS!</h1>
  <p>
  	We really appreciate your input!</br>
  	
 </p>
  <p><a class="btn btn-primary btn-lg" href="index.php">Home</a></p>
</div>
</div>

<?php 
}



@include 'template/bottom.phtml';



?>