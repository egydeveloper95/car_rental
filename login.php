<?php
include_once 'header.php';
include_once 'user.php';
?>

<?php
if(!loggedin()){
if (isset($_POST['login'])) {
    if (!$user->login()) {
        $loginerror = "Invalid Username or Password";
        echo '<script>alert("' . $loginerror . ' , Please Try Again ")</script>';
        header('#login');
    }
}} else{
    echo '<script>alert("You Already Logged In ")</script>';
  header( "refresh:0;url=index.php" );
}
?>
<div id="mainBody">
    <div class="container">
        <div class="row">

            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                    <li class="active">Login</li>
                </ul>
                <h3> Login</h3>	
                <hr class="soft"/>

                <div class="row">
                    <!--	 <div class="span4">
                                    <div class="well">
                                    <h5>CREATE YOUR ACCOUNT</h5><br/>
                                    Enter your e-mail address to create an account.<br/><br/><br/>
                                    <form action="register.php">
                                      <div class="control-group">
                                            <label class="control-label" for="inputEmail0">E-mail address</label>
                                            <div class="controls">
                                              <input class="span3"  type="text" id="inputEmail0" placeholder="Email">
                                            </div>
                                      </div>
                                      <div class="controls">
                                      <button type="submit" class="btn block">Create Your Account</button>
                                      </div>
                                    </form>
                            </div>
                            </div> -->
                    <div class="span1"> &nbsp;</div>
                    <div class="span4">
                        <div class="well">
                            <h5>ALREADY REGISTERED ?</h5>
                            <form action="index.php" method="post">
                                <div class="control-group">
                                    <label class="control-label" for="Username">Username</label>
                                    <div class="controls">
                                        <input class="span3"  type="text" id="Username" name="Username" placeholder="Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword1">Password</label>
                                    <div class="controls">
                                        <input type="password" name="Password" class="span3"  id="inputPassword1" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="login" class="btn">Sign in</button> <a href="forgetpass.php">Forget password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>	

            </div>
        </div></div>
</div>
<!-- MainBody End ============================= -->
<?php include_once 'footer.php'; ?>