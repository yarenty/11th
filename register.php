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


<div class="container login">


            <div class="well bs-component" >
              <form class="form-horizontal" action="register.php" validate method="POST">
                <fieldset>
                  <legend>Registration</legend>

                  
                  <div class="form-group<?php if ($error_name) echo " has-error";?>">
                    <label for="username" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control"   
                      class="form-control" placeholder="UserName *" id="username" name="username" required data-validation-required-message="Please choose your username."
                      <?php if (isset($u->username)) echo 'value="'.$u->username.'"';?>>
                    </div>
                  </div>
                  
                  <div class="form-group<?php if ($error_email) echo " has-error";?>">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                      <input id="inputEmail" name="mail" type="email" class="form-control" placeholder="Your Email *"  required data-validation-required-message="Please enter your email address."
                      <?php if (isset($u->email)) echo 'value="'.$u->email.'"';?>>
                    </div>
                  </div>
                  <div class="form-group<?php if ($error_password) echo " has-error";?>">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Your Password *"  required data-validation-required-message="Please create your password.">
                    </div>
                  </div>
                  <input type="hidden" name="register" value="yep"/>
                  
                  <hr/>
                  
                  <div class="form-group">
                    <label for="firstname" class="col-lg-2 control-label">First name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control"   
                      class="form-control" placeholder="First Name" id="firstname" name="firstname" required data-validation-required-message="Please put your first name."
                      <?php if (isset($u->firstname)) echo 'value="'.$u->firstname.'"';?>>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="lastname" class="col-lg-2 control-label">Last name</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="lastname"  
                      class="form-control" placeholder="Last Name"  name="lastname" required data-validation-required-message="Please put your last name."
                      <?php if (isset($u->lastname)) echo 'value="'.$u->lastname.'"';?>>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="experience" class="col-lg-2 control-label">Experience</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="experience"  
                      class="form-control" placeholder="1..99" name="experience"
                      <?php if (isset($u->expeirence)) echo 'value="'.$u->experience.'"';?>>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phone" class="col-lg-2 control-label">Phone</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="phone"  
                      class="form-control" placeholder="+353xxxx" name="phone" required data-validation-required-message="Please put your phone number."
                      <?php if (isset($u->phone)) echo 'value="'.$u->phone.'"';?>>
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
                                            
<? /*
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
  */ ?>
 
 
                  <div class="form-group">
                    <label for="address" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="3" id="address" name="address"></textarea>
                      <span class="help-block">put your address</span>
                   </div>                    
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