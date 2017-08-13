<?php
include_once 'header.php';
include 'admin.php';
$admin = new admin();
if (isset($_POST['deleteuser'])) {
    if (loggedin())
        $admin->deleteuser();
    else {
        echo '<script>alert("You Must Login First")</script>';
    }
}
?>
<form class="form-horizontal" action="deleteuser.php" method="POST" >




    <div class="control-group">
        <label class="control-label" for="inputUsername1">Username <sup>*</sup></label>
        <div class="controls">
            <input type="text" name="username" required="required" id="inputUsername1" placeholder="Username">
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>


    <!--	<div class="control-group">
            <label class="control-label">Date of Birth <sup>*</sup></label>
            <div class="controls">
              <select class="span1" name="days">
                            <option value="">-</option>
                                    <option value="1">1&nbsp;&nbsp;</option>
                                    <option value="2">2&nbsp;&nbsp;</option>
                                    <option value="3">3&nbsp;&nbsp;</option>
                                    <option value="4">4&nbsp;&nbsp;</option>
                                    <option value="5">5&nbsp;&nbsp;</option>
                                    <option value="6">6&nbsp;&nbsp;</option>
                                    <option value="7">7&nbsp;&nbsp;</option>
                    </select>
                    <select class="span1" name="days">
                            <option value="">-</option>
                                    <option value="1">1&nbsp;&nbsp;</option>
                                    <option value="2">2&nbsp;&nbsp;</option>
                                    <option value="3">3&nbsp;&nbsp;</option>
                                    <option value="4">4&nbsp;&nbsp;</option>
                                    <option value="5">5&nbsp;&nbsp;</option>
                                    <option value="6">6&nbsp;&nbsp;</option>
                                    <option value="7">7&nbsp;&nbsp;</option>
                    </select>
                    <select class="span1" name="days">
                            <option value="">-</option>
                                    <option value="1">1&nbsp;&nbsp;</option>
                                    <option value="2">2&nbsp;&nbsp;</option>
                                    <option value="3">3&nbsp;&nbsp;</option>
                                    <option value="4">4&nbsp;&nbsp;</option>
                                    <option value="5">5&nbsp;&nbsp;</option>
                                    <option value="6">6&nbsp;&nbsp;</option>
                                    <option value="7">7&nbsp;&nbsp;</option>
                    </select>
            </div>
      </div>

    <div class="alert alert-block alert-error fade in">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
     </div>	

            <h4>Your address</h4>
            <div class="control-group">
                    <label class="control-label" for="inputFname">First name <sup>*</sup></label>
                    <div class="controls">
                      <input type="text" id="inputFname" placeholder="First Name">
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="inputLname">Last name <sup>*</sup></label>
                    <div class="controls">
                      <input type="text" id="inputLname" placeholder="Last Name"/>
                    </div>
            </div>
            
            <div class="control-group">
                    <label class="control-label" for="company">Company</label>
                    <div class="controls">
                      <input type="text" id="company" placeholder="company"/>
                    </div>
            </div>
            
            <div class="control-group">
                    <label class="control-label" for="address">Address<sup>*</sup></label>
                    <div class="controls">
                      <input type="text" id="address" placeholder="Adress"/> <span>Street address, P.O. box, company name, c/o</span>
                    </div>
            </div>
            
            <div class="control-group">
                    <label class="control-label" for="address2">Address (Line 2)<sup>*</sup></label>
                    <div class="controls">
                      <input type="text" id="address2" placeholder="Adress line 2"/> <span>Apartment, suite, unit, building, floor, etc.</span>
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="city">City<sup>*</sup></label>
                    <div class="controls">
                      <input type="text" id="city" placeholder="city"/> 
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="state">State<sup>*</sup></label>
                    <div class="controls">
                      <select id="state" >
                            <option value="">-</option>
                            <option value="1">Alabama</option><option value="2">Alaska</option><option value="3">Arizona</option><option value="4">Arkansas</option><option value="5">California</option><option value="6">Colorado</option><option value="7">Connecticut</option><option value="8">Delaware</option><option value="53">District of Columbia</option><option value="9">Florida</option><option value="10">Georgia</option><option value="11">Hawaii</option><option value="12">Idaho</option><option value="13">Illinois</option><option value="14">Indiana</option><option value="15">Iowa</option><option value="16">Kansas</option><option value="17">Kentucky</option><option value="18">Louisiana</option><option value="19">Maine</option><option value="20">Maryland</option><option value="21">Massachusetts</option><option value="22">Michigan</option><option value="23">Minnesota</option><option value="24">Mississippi</option><option value="25">Missouri</option><option value="26">Montana</option><option value="27">Nebraska</option><option value="28">Nevada</option><option value="29">New Hampshire</option><option value="30">New Jersey</option><option value="31">New Mexico</option><option value="32">New York</option><option value="33">North Carolina</option><option value="34">North Dakota</option><option value="35">Ohio</option><option value="36">Oklahoma</option><option value="37">Oregon</option><option value="38">Pennsylvania</option><option value="51">Puerto Rico</option><option value="39">Rhode Island</option><option value="40">South Carolina</option><option value="41">South Dakota</option><option value="42">Tennessee</option><option value="43">Texas</option><option value="52">US Virgin Islands</option><option value="44">Utah</option><option value="45">Vermont</option><option value="46">Virginia</option><option value="47">Washington</option><option value="48">West Virginia</option><option value="49">Wisconsin</option><option value="50">Wyoming</option></select>
                    </div>
            </div>		
            <div class="control-group">
                    <label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
                    <div class="controls">
                      <input type="text" id="postcode" placeholder="Zip / Postal Code"/> 
                    </div>
            </div>
            
            <div class="control-group">
                    <label class="control-label" for="country">Country<sup>*</sup></label>
                    <div class="controls">
                    <select id="country" >
                            <option value="">-</option>
                            <option value="1">Country</option>
                    </select>
                    </div>
            </div>	
            <div class="control-group">
                    <label class="control-label" for="aditionalInfo">Additional information</label>
                    <div class="controls">
                      <textarea name="aditionalInfo" id="aditionalInfo" cols="26" rows="3">Additional information</textarea>
                    </div>
            </div>
            <div class="control-group">
                    <label class="control-label" for="phone">Home phone <sup>*</sup></label>
                    <div class="controls">
                      <input type="text"  name="phone" id="phone" placeholder="phone"/> <span>You must register at least one phone number</span>
                    </div>
            </div>
            
            <div class="control-group">
                    <label class="control-label" for="mobile">Mobile Phone </label>
                    <div class="controls">
                      <input type="text"  name="mobile" id="mobile" placeholder="Mobile Phone"/> 
                    </div>
            </div>
    -->


    <div class="control-group">
        <div class="controls">
            <input type="hidden" name="email_create" value="1">
            <input type="hidden" name="is_new_customer" value="1">
            <input class="btn btn-large btn-success" type="submit" name="deleteuser" value="Delete User" />
            <a href="AdminPerm.php" role="button" style="padding-right:0"><span class="btn btn-large btn-danger">Back</span></a>
        </div>
    </div>		
</form>
<?php include_once 'footer.php'; ?>