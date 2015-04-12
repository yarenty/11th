<?php 
include_once 'lib/includes.php';
include_once 'lib/functions/register.php';
include_once 'lib/functions/default.php';

$page='register';
@include 'template/head.phtml';

$title = "";
@include 'template/top.phtml';

if ($error_already) {
?>
<div class="container thanks">
<div class="jumbotron">
  <h1>Email already registered</h1>
  <p>
  Your email is already registered in our database, do you want to resend your password?<br/><br/>
  Your email: <font color="red"><? echo $u->email; ?></font>
  </p>
  <p><a class="btn btn-primary btn-lg" href="resend.php?mail=<? echo $u->email; ?>">Send</a></p>
</div>
</div>

<?php 


}  elseif (!$register_success) {
	
?>



		<div class="container">
			<div class="row">
				<div class="box">
					<div class="col-lg-5">
						<img src="img/bartender.jpg	" class="img-responsive" alt="Responsive image">
					</div>
					<div class="col-lg-6">
						<h1>Login</h1>
						<form action="login.php" id="login">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username" style="margin-bottom: 5px; margin-top: 5px">
							<input type="text" class="form-control" name="password" placeholder="Password" style="margin-bottom: 5px">
							<a href="javascript:login.submit();" class="btn btn-info" style="padding: 60px; padding-bottom: 5px; padding-top: 5px">Login</a>
						</div>
						</form>
						
						
						
						<form action="register.php" id="registration" validate method="POST">
							
							<h1>Or Register</h1>
							
							              
                  
                  <div class="form-group">
                    <label for="firstname" class="col-lg-2 control-label">First name</label>
                      <input type="text" class="form-control"   
                      class="form-control" placeholder="First Name" id="firstname" name="firstname" required data-validation-required-message="Please put your first name."
                      <?php if (isset($u->firstname)) echo 'value="'.$u->firstname.'"';?>>
                  </div>

                  <div class="form-group">
                    <label for="lastname" class="col-lg-2 control-label">Last name</label>
                      <input type="text" class="form-control" id="lastname"  
                      class="form-control" placeholder="Last Name"  name="lastname" required data-validation-required-message="Please put your last name."
                      <?php if (isset($u->lastname)) echo 'value="'.$u->lastname.'"';?>>
                  </div>
  
  

							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" name="address" class="form-control" id="address" placeholder="Enter your full address">
							</div>
							
							
                  <div class="form-group">
                    <label for="phone" class="col-lg-2 control-label">Phone</label>
                      <input type="text" class="form-control" id="phone"  
                      class="form-control" placeholder="+353xxxx" name="phone" required data-validation-required-message="Please put your phone number."
                      <?php if (isset($u->phone)) echo 'value="'.$u->phone.'"';?>>
                  </div>

							<div class="form-group">
								<label for="exampleInputPassword1">What roles can you fill?</label>
								<div class="checkbox">
									<label>
										<input type="checkbox">
										Bartender</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox">
										Bar Back</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox">
										Floor Staff</label>
								</div>
								<div class="checkbox">
									<label>
										<input type="checkbox">
										Mixologist</label>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Years Experience</label>
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
										Years Experience
										<span class="caret" id="dropdownCaret"></span>
									</button>
									<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">1</a>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">2</a>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">3</a>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">4</a>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">5</a>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">6</a>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">7</a>
										</li>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">8</a>
										</li>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">9</a>
										</li>
										</li>
										<li role="presentation">
											<a role="menuitem" tabindex="-1" href="#">10+</a>
										</li>
									</ul>
								</div>
							</div>
				
								<div class="form-group">
									<label for="exampleInputPassword1">Expected Wage</label>
									<label class="sr-only" for="exampleInputAmount">Amount (in euro)</label>
									<div class="input-group">
										<div class="input-group-addon">
											€
										</div>
										<input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount">
									</div>
								</div>
							
							
		 	<div class="form-group<?php if ($error_name) echo " has-error";?>">
                    <label for="username" class="col-lg-2 control-label">Username</label>
                      <input type="text" class="form-control"   
                      class="form-control" placeholder="UserName *" id="username" name="username" required data-validation-required-message="Please choose your username."
                      <?php if (isset($u->username)) echo 'value="'.$u->username.'"';?>>
                  </div>
                  
                  <div class="form-group<?php if ($error_email) echo " has-error";?>">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                      <input id="inputEmail" name="mail" type="email" class="form-control" placeholder="Your Email *"  required data-validation-required-message="Please enter your email address."
                      <?php if (isset($u->email)) echo 'value="'.$u->email.'"';?>>
                  </div>
                  <div class="form-group<?php if ($error_password) echo " has-error";?>">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                      <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Your Password *"  required data-validation-required-message="Please create your password.">
                  </div>
                  <input type="hidden" name="register" value="yep"/>


	
								<div class="form-group">
								<label for="exampleInputFile">Attach Your CV</label>
								<input type="file" id="exampleInputFile">
							</div>
						
		
							
		 <div class="form-group<?php if ($error_captcha) echo " has-error";?>">
                    <label class="col-lg-2 control-label">Captcha: 2+2= </label>
                    <div class="col-lg-10">
                      <div class="radio">
                        <label>
                          <input type="radio" name="captcha" id="optionsRadios1" value="3" checked="">
                          Three
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="captcha" id="optionsRadios2" value="4">
                          Four
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="captcha" id="optionsRadios3" value="5">
                          Five
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="captcha" id="optionsRadios3" value="6">
                          None of this
                        </label>
                      </div>
                    </div>
                  </div>
 
							<div class="checkbox">
								<label>
									<input type="checkbox">
									By ticking this box I agree to the <a href="data:image/jpeg;base64,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">Terms and Conditions</a> of 11th Hour</label>
							</div>
							<div class="col-md-2"></div>
								
							<div class="col-md-6">
								<button type="submit" class="btn btn-success btn-group-justified" title="Register">Submit</button>

							</div>
						</form>
					</div>
				</div>
			</div>
	
	

<? /*

                  <div class="form-group">
                    <label for="experience" class="col-lg-2 control-label">Experience</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="experience"  
                      class="form-control" placeholder="1..99" name="experience"
                      <?php if (isset($u->expeirence)) echo 'value="'.$u->experience.'"';?>>
                    </div>
                  </div>

                                    
                  <div class="form-group">
                    <label for="facebook" class="col-lg-2 control-label">Facebook</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="facebook"  
                      class="form-control" placeholder="facebook"  name="facebook"
                      <?php if (isset($u->facebook)) echo 'value="'.$u->facebook.'"';?>>
                    </div>
                  </div>     
                  
                  <div class="form-group">
                    <label for="skills" class="col-lg-2 control-label">Skills</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="skills"  
                      class="form-control" placeholder="waitress, bartender, .." name="skills"
                      <?php if (isset($u->skills)) echo 'value="'.$u->skills.'"';?>>
                    </div>
                  </div>     
                  
                   <div class="form-group">
                    <label for="wage" class="col-lg-2 control-label">Wage</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="wage"  
                      class="form-control" placeholder="hourly wage"  name="wage" required data-validation-required-message="Please put your hourly wage."
                      <?php if (isset($u->wage)) echo 'value="'.$u->wage.'"';?>>
                    </div>
                  </div>
                                            
			firstname,
			lastname,
			picture,
			experience,
			rating,
			phone,
			facebook,
			address,
			geo,
			wage,
			skills,			
			twitter
 
 
 
                  <div class="form-group">
                    <label for="address" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="address" name="address"></textarea>
                      <span class="help-block">put your address</span>
                   </div>                    
 				 </div>

                    

                   <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </fieldset>
              </form>
   	</div>
</div>
 	*/			 
				 ?> 
<?php 
}
else
{
?>
<div class="container thanks">
<div class="jumbotron">
  <h1>Registration successful</h1>
  <p>
  Please check your email -> there should be activation mail sent from rememome.com domain. <br/><br/>
  You may login now using your email: <font color="red"><? echo $u->email; ?></font> and password: <font color="red"><? echo $u->password; ?></font>
  </p>
  <p><a class="btn btn-primary btn-lg" href="login.php">Login</a></p>
</div>
</div>

<?php 
}

@include 'template/bottom.phtml';

?>