
<!DOCTYPE html>
<html lang="en">

<?php include "assets/meta.php";?>
<link rel="stylesheet" href="sweetalert/dist/sweetalert.css">
<script src="sweetalert/dist/sweetalert.min.js"></script>
<title>Jobinpal Enterprises | Contact Us.</title>

<body id="body" class="body-wrapper boxed-menu" >

  <div class="main-wrapper">

  <?php include "assets/header.php";?>

<!-- PAGE TITLE SECTION -->
<section class="clearfix pageTitleSection bg-image" style="background-image: url(img/JE/banner/je_banner_1.png);">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pageTitle">
					<h2>Contact Us</h2>
				</div>
			</div>
		</div>
</section>

<!-- CONTACT SECTION -->
<section class="clearfix">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="contactInfo" style="margin-top: 55px;">
					<ul class="list-unstyled list-address">
						<li>
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							Block 48, Flat 6, Festac Extension,
              Alaba Express bustop, Amuwo Odofin,
              Lagos,Nigeria
						</li>
						<li>
							<i class="fa fa-phone" aria-hidden="true"></i>
							 +(234) 7034474485<br>
						</li>
						<li>
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<a href="#"> info@jobinpalent.com.ng</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-8 col-xs-12">
				<div class="signUpFormArea">
					<div class="priceTableTitle">
						<h2>Get in Touch</h2>
						<p>Please feel free to contact us if you have queries, require more information or have any other request.</p>
					</div>
					<div class="signUpForm">
						<form action="" method="post">
							<div class="formSection">
								<div class="row">
									<div class="form-group col-xs-12">
										<label for="yourName" class="control-label">Name*</label>
										<input type="text" name="name" class="form-control" id="yourName" required>
									</div>
                  <div class="form-group col-xs-12">
                    <label for="yourName" class="control-label">Phone Number*</label>
                    <input type="text" class="form-control" name="phone" id="yourNumber" required>
                  </div>
									<div class="form-group col-xs-12">
										<label for="emailAddress" class="control-label">Email Address*</label>
										<input type="email" name="email" class="form-control" id="emailAddress" required>
									</div>
									<div class="form-group col-xs-12">
										<label for="textBox" class="control-label">Message*</label>
										<textarea class="form-control" rows="3" required name="message"></textarea>
									</div>

									<div class="form-group col-xs-12 mb0">
										<div class="g-recaptcha form-group" data-sitekey="6LdRF1sUAAAAAE56lbpLWWynb_7ev0tPbPSeGGBy"></div>
										
										<button type="submit" name="submit" class="btn btn-primary send-now">Send Now</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
      </div>
		</div>
  </div>
</section>
<?php
if(isset($_POST['submit'])){
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    //your site secret key
    $secret = '6LdRF1sUAAAAACTO3Svm0to7sVkPdzgK6OKOvrB0';
    //get verify response data
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if($responseData->success){
        //contact form submission code goes here
        
        include "mailer/mail.php";
     ?>
     <script type="text/javascript">
     	 swal({
            title: "Success!",
            text: "Your contact request have submitted successfully.",
            icon: "success",
            button: "Close",

          })
    </script>
     <?php  
    }else{
        ?>
     <script type="text/javascript">
     	swal({
            title: "Error!",
            text: "Robot verification failed, please try again.",
            icon: "error",
            button: "Close",

          })
    </script>
     <?php
    }
  }else{
    echo  'Please click on the reCAPTCHA box.';
  }
}
?>
   <?php include "assets/footer.php";?>

<script src='https://www.google.com/recaptcha/api.js'></script>

</body>

</html>

