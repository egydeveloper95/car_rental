<?php
include_once 'header.php';
include_once 'user.php';
include_once 'core.php';
include_once 'client.php';
include_once 'admin.php';
$user = new user();
$admin = new admin();
if (!loggedin()) {
    header('location:index.php');
    //header("refresh:0;url=index.php");
    echo '<script>alert("You Must Login First")</script>';
}


if (isset($_POST['feedback'])) {
    if (loggedin()) {
        $user->SendFeedBack();
    } else {
        echo '<script>alert("You Must Login First")</script>';
    }
}
?>
<?php if ($user_type_id == 2) { ?>
    <div id="mainBody">
        <div class="container">
            <hr class="soften">
            <h1>Email Us</h1>
            <hr class="soften"/>	
            <div class="row">
                <!--   <div class="span4">
                       <h4>Contact Details</h4>
                       <p>	18 Fresno,<br/> CA 93727, USA
                           <br/><br/>
                           info@bootsshop.com<br/>
                           ﻿Tel 123-456-6780<br/>
                           Fax 123-456-5679<br/>
                           web:bootsshop.com
                       </p>		
                   </div>-->

                <!--    <div class="span4">
                        <h4>Opening Hours</h4>
                        <h5> Monday - Friday</h5>
                        <p>09:00am - 09:00pm<br/><br/></p>
                        <h5>Saturday</h5>
                        <p>09:00am - 07:00pm<br/><br/></p>
                        <h5>Sunday</h5>
                        <p>12:30pm - 06:00pm<br/><br/></p>
                    </div> -->
                <div class="span4">
                    <!--    <h4>Email Us</h4>-->
                    <form class="form-horizontal" action="#" method="POST">
                        <fieldset>

                            <div class="control-group">

                                <input type="text" name="subject" style="height: 35px;"   placeholder="subject" required="required" class="input-xlarge"/>

                            </div>

                            <div class="control-group">
                                <textarea name="description" required="required" rows="3" id="textarea" class="input-xlarge"></textarea>

                            </div>
                            <br> <br>
                            <button class="btn btn-large" name="feedback" type="submit">Send Messages</button>

                        </fieldset>
                    </form>
                </div>
            </div>
            <!--   <div class="row">
                   <div class="span12">
                       <iframe style="width:100%; height:300; border: 0px" scrolling="no" src="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14&amp;output=embed"></iframe><br />
                       <small><a href="https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=18+California,+Fresno,+CA,+United+States&amp;aq=0&amp;oq=18+California+united+state&amp;sll=39.9589,-120.955336&amp;sspn=0.007114,0.016512&amp;ie=UTF8&amp;hq=&amp;hnear=18,+Fresno,+California+93727,+United+States&amp;t=m&amp;ll=36.732762,-119.695787&amp;spn=0.017197,0.100336&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                   </div>
               </div>
           </div>-->
        </div> 
    <?php } ?>
    <?php if ($user_type_id == 1) { ?>

        <tbody>
        <Br> <BR>
        <h4> Feedbacks</h4> 

        <br>
        <table class = "table table-bordered">
            <tr class = "techSpecRow"><th>ID</th><th>User</th><th>Subject</th><th>Description</th></tr>
                    <?php
                    $Feedbacks = $admin->ViewFeedBacks();
                    foreach ($Feedbacks as $Feedback) {
                        $id = $Feedback['id'];
                        $user_id = $Feedback['user_id'];
                        $subject = $Feedback['Subject'];
                        $description = $Feedback['description'];

                        $user_info = $user->GetUserDetails($user_id);
                        echo '<tr class = "techSpecRow"><th>' . $id . '</th><th>' . $user_info['username'] . '</th><th>' . $subject . '</th><th>' . $description . '</th></tr>';
                    }
                    ?>



            </tbody>
        </table>
    <?php } ?>
    <!-- MainBody End ============================= -->
    <?php
    include_once 'footer.php';
    ?>