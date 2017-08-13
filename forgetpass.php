<?php
include_once 'header.php';
include_once 'user.php';
include_once 'Database.php';
?>
<?php
$user = new user();
if (isset($_POST['forgetpass'])) {
    $user->ForgetPassword();
}
?>
<div id="mainBody">
    <div class="container">
        <div class="row">

            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                    <li class="active">Forget password?</li>
                </ul>
                <h3> FORGET YOUR PASSWORD?</h3>	
                <hr class="soft"/>

                <div class="row">
                    <div class="span9" style="min-height:900px">
                        <div class="well">
                            <h5>Reset your password</h5><br/>
                            Please enter your username and the email address for your account.  Once you have Submitted the right inputs , you will be able to show the password for your account.<br/><br/><br/>
                            <form method="POST" action="forgetpass.php">
                                <div class="control-group">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <div class="controls">
                                        <input class="span3"  type="text" name="username" required="required" id="inputUsername1" placeholder="Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail1">E-mail address</label>
                                    <div class="controls">
                                        <input class="span3"  type="email" name="email" required="required" id="inputEmail1" placeholder="Email">
                                    </div>
                                </div>
                                <div class="controls">
                                    <button type="submit" name="forgetpass" class="btn block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>	

            </div>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->
<?php
include_once 'footer.php';
?>