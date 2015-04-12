<?php 
include_once 'lib/includes.php';
include_once 'lib/functions/default.php';


$page='profile';
if (! isset ( $_SESSION ["user"] )) header('Location: /11th/index.php');

@include 'template/head.phtml';
$title = "Profile";
@include 'template/top.phtml';


?>


<?php 
@include 'template/marketing.phtml';



$u = $_SESSION ["user"];
?>


<br />
<div class="container profile">


            <div class="well bs-component" >
              <form class="form-horizontal" action="profile.php" validate method="POST">
                <fieldset>
                  <legend>Your Profile</legend>

                  
                  <div class="form-group">
                  	 <label class="col-lg-2 control-label">username</label>
                  	 <div class="col-lg-10"><div class="myvalue"><?php echo $u->username;?></div></div>
                  </div>
                  
                  <div class="form-group">
                  	 <label class="col-lg-2 control-label">e-mail</label>
                  	 <div class="col-lg-10"><div class="myvalue"><?php echo $u->email;?></div></div>
                  </div>

                  <div class="form-group<?php if ($error_password) echo " has-error";?>">
                    <label for="inputPassword" class="col-lg-2 control-label">Change password</label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control" id="inputPassword" name="pass" placeholder="Your New Password *"  required data-validation-required-message="Please create your password.">
                    </div>
                  </div>

                  <div class="form-group<?php if ($error_timezone) echo " has-error";?>">
                    <label for="timezone" class="col-lg-2 control-label">Timezone</label>
                    <div class="col-lg-10">

<? 
include_once 'template/worldmap.phtml';


$city= $u->timezone; 

//echo "CITY::" .$city;
?>
                    	
                    	
                      <select class="form-control" id="timezone" name="timezone" required data-validation-required-message="Specify your zone.">
                      <option value="none">select...</option>
<?php 
$zones = timezone_identifiers_list();
foreach( $zones as $zone){

echo '<option';
if (isset($timezone) && $zone==$timezone) {
	 echo ' selected'; 
} else if (strpos($zone,$city) !== false) {
	echo ' selected';
}

echo '>'.$zone.'</option>';
}
?>
                      </select>
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
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </fieldset>
              </form>
	</div>
</div>


<?php 
@include 'template/bottom.phtml';



?>