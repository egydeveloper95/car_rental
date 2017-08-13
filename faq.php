<?php
include_once 'header.php';
?>
<!-- Header End====================================================================== -->
<?php if(loggedin() && $user_type_id!=1 || (!loggedin()) ) {  ?>
<div id="mainBody">
    <div class="container">
        <h1>FAQ</h1>
        <hr class="soften"/>	
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            Login 
                        </a></h4>
                </div>
                <div id="collapseOne" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to login ? <br></b>  
                            - You Have To Click On The Login Pop up In The Navigation bar As Shown In This Figure <img src="img/User Helper/1.jpg"><br><br>
                            - You Have To Enter Your Username And Password In The Text Fields Shown in This Figure And Press Sign in .<br><br><img src="img/User Helper/2.jpg"><br><br> </p>
                        <p>  <b>Forget Password ? <br><br></b>  
                            - You Have To Press On The Forget Password Link . <br><br><img src="img/User Helper/2.jpg"><br><br>
                            -You Have To Enter Your Right Username And Email In The Text Fields And Press Submit In Order To Receive Your Password .<br><br><img src="img/User Helper/3.jpg">
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                            Registeration
                        </a></h4>
                </div>
                <div id="collapseTwo" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to Register ? <br></b>  
                            - You Have To Click On The Register Link In The Navigation bar As Shown In This Figure <img src="img/User Helper/4.jpg"><br><br>
                            - You Have To Enter Your Personal Information In The Text Fields Shown in This Figure And Press Register .<br><br><img src="img/User Helper/5.jpg"><br><br> </p>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            Products
                        </a></h4>
                </div>
                <div id="collapseThree" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to View Available Products ? <br></b>  
                            - You Have To Click On The Products Link In Navigation bar As Shown In This Figure<br> <img src="img/User Helper/6.jpg"><br><br>
                            - The Available Cars Will Shown In Order To Choose One Of Them To Reserve .<br><br><img src="img/User Helper/7.jpg"><br><br> </p>
                        <p>      <b>How to View Available Products By Search ? <br></b>  <br>
                            - You Have To Click On The Search Field In Navigation bar As Shown In This Figure<br> <br><img src="img/User Helper/20.jpg"><br><br>
                            - You Have To Enter The Car Brand Or Type Or Model That You Want To Search For , Like This Figure <br><br> <img src="img/User Helper/21.jpg"><br><br>
                            - The Available Cars Will Shown In Order To Choose One Of Them To Reserve .<br><br><img src="img/User Helper/22.jpg"><br><br> </p>
                        <p>      <b>How to Sort The Available Products? <br></b>  <br>
                            - You Have To Click On The Products Link In Navigation bar As Shown In This Figure<br> <img src="img/User Helper/6.jpg"><br><br>
                            - You Have To Go To The Sort By Select Box That Shown In This Figure  <br><br> <img src="img/User Helper/23.jpg"><br><br>
                            - You Have To Choose The Order In Which You Would Like To Sort And Click Go , Like This Figure .<br><br><img src="img/User Helper/24.jpg"><br><br>
                            <img src="img/User Helper/25.jpg"> <br> <br>
                            - The Available Cars After Sorting Will Be Shown Like This Figure <br> <br> <img src="img/User Helper/26.jpg"><br> </p>
                        <p>      <b>How to View Product Details ? <br></b>  <br>
                            - You Have To Click On The Product Or The Magnifier Icon As Shown In This Figure <br><br><img src="img/User Helper/8.jpg"><br><br>
                            - The Product Details Will Shown Like This Figure .<br><br><img src="img/User Helper/9.jpg"><br><br> </p>
                        <p>      <b>How to Reserve A Product ? <br></b>  <br>
                            - You Have To Login First.<br>
                            - When You Click On The Product Or The Magnifier Icon As Shown In This Figure <br><br><img src="img/User Helper/8.jpg"><br><br>
                            - The Product Details Will Shown Like This Figure  .<br><br><img src="img/User Helper/10.jpg"><br><br> </p>
                        - You Have To Choose The Reservation Start-Date And End-Date And Payment Method , Then Click Reserve Now .
                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                            Feedback
                        </a></h4>
                </div>
                <div id="collapseFour" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to Send Your Feedback ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Contact Us Link In The Navigation bar As Shown In This Figure <img src="img/User Helper/11.jpg"><br><br>
                            - You Have To Enter The Subject And Description And Press On Send Messages.<br><br><img src="img/User Helper/12.jpg"><br><br> </p>
                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                            Order History
                        </a></h4>
                </div>
                <div id="collapseFive" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to View Your Order History ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Order History Link In The Navigation bar As Shown In This Figure <img src="img/User Helper/13.jpg"><br><br>
                            - The Table Of Order History Will Be Shown Like This Figure.<br><br><img src="img/User Helper/14.jpg"><br><br> </p>
                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
                            Profile
                        </a></h4>
                </div>
                <div id="collapseSix" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to View Your Profile ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The My Profile Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/15.jpg"><br><br>
                            - Your Profile Will Be Showed Like This Figure . <br> <img src="img/User Helper/16.jpg">
                        <p>      <b>How to Edit Your Profile ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The My Profile Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/15.jpg"><br><br>
                            - Your Profile Will Be Showed Like This Figure . <br> <img src="img/User Helper/16.jpg"><br><br>
                            - You Have To Click On Edit Profile And Then You Have To Fill Your Personal Information And Click On Edit Button  .<br> <img src="img/User Helper/17.jpg">
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
                            Reservation
                        </a></h4>
                </div>
                <div id="collapseSeven" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to Cancel Your Reservation ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The My Profile Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/15.jpg"><br><br>
                            - Your Profile Will Be Showed Like This Figure . <br> <img src="img/User Helper/16.jpg"><br><br><br><br>
                            - You Have To Click On Cancel Reservation  .<br><br><br><br><br> <img src="img/User Helper/18.jpg"> <br>
                            - And Then You Have To Choose Your Reservation Number That You Want To Cancel And Click On Cancel Reservation Button . <br></p>
                        <p>      <b>How to Update Your Reservation ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The My Profile Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/15.jpg"><br><br>
                            - Your Profile Will Be Showed Like This Figure . <br> <img src="img/User Helper/16.jpg"><br><br><br><br>
                            - You Have To Click On Update Reservation  .<br><br><br><br><br> <img src="img/User Helper/19.jpg"> <br>
                            - And Then You Have To Choose Your Reservation Number And The New Dates That You Want To Update And Click On Update Reservation Button . <br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php   }?>
<?php if(loggedin() && $user_type_id==1 ) { ?>

    <div class="container">
        <h1>FAQ</h1>
        <hr class="soften"/>	
        <div class="accordion" id="accordion2">
            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                            Login 
                        </a></h4>
                </div>
                <div id="collapseOne" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to login ? <br></b>  
                            - You Have To Click On The Login Pop up In The Navigation bar As Shown In This Figure <img src="img/User Helper/1.jpg"><br><br>
                            - You Have To Enter Your Username And Password In The Text Fields Shown in This Figure And Press Sign in .<br><br><img src="img/User Helper/2.jpg"><br><br> </p>
                        <p>  <b>Forget Password ? <br><br></b>  
                            - You Have To Press On The Forget Password Link . <br><br><img src="img/User Helper/2.jpg"><br><br>
                            -You Have To Enter Your Right Username And Email In The Text Fields And Press Submit In Order To Receive Your Password .<br><br><img src="img/User Helper/3.jpg">
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                            Products
                        </a></h4>
                </div>
                <div id="collapseThree" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to View Available Products ? <br></b>  
                            - You Have To Click On The Products Link In Navigation bar As Shown In This Figure<br> <img src="img/User Helper/6.jpg"><br><br>
                            - The Available Cars Will Shown In Order To Choose One Of Them To Reserve .<br><br><img src="img/User Helper/7.jpg"><br><br> </p>
                        <p>      <b>How to View Available Products By Search ? <br></b>  <br>
                            - You Have To Click On The Search Field In Navigation bar As Shown In This Figure<br> <br><img src="img/User Helper/20.jpg"><br><br>
                            - You Have To Enter The Car Brand Or Type Or Model That You Want To Search For , Like This Figure <br><br> <img src="img/User Helper/21.jpg"><br><br>
                            - The Available Cars Will Shown In Order To Choose One Of Them To Reserve .<br><br><img src="img/User Helper/22.jpg"><br><br> </p>
                        <p>      <b>How to Sort The Available Products? <br></b>  <br>
                            - You Have To Click On The Products Link In Navigation bar As Shown In This Figure<br> <img src="img/User Helper/6.jpg"><br><br>
                            - You Have To Go To The Sort By Select Box That Shown In This Figure  <br><br> <img src="img/User Helper/23.jpg"><br><br>
                            - You Have To Choose The Order In Which You Would Like To Sort And Click Go , Like This Figure .<br><br><img src="img/User Helper/24.jpg"><br><br>
                            <img src="img/User Helper/25.jpg"> <br> <br>
                            - The Available Cars After Sorting Will Be Shown Like This Figure <br> <br> <img src="img/User Helper/26.jpg"><br> </p>
                        <p>      <b>How to View Product Details ? <br></b>  <br>
                            - You Have To Click On The Product Or The Magnifier Icon As Shown In This Figure <br><br><img src="img/User Helper/8.jpg"><br><br>
                            - The Product Details Will Shown Like This Figure .<br><br><img src="img/User Helper/9.jpg"><br><br> </p>
                        <p>      <b>How to Reserve A Product ? <br></b>  <br>
                            - You Have To Login First.<br>
                            - When You Click On The Product Or The Magnifier Icon As Shown In This Figure <br><br><img src="img/User Helper/8.jpg"><br><br>
                            - The Product Details Will Shown Like This Figure  .<br><br><img src="img/User Helper/10.jpg"><br><br> </p>
                        - You Have To Choose The Reservation Start-Date And End-Date And Payment Method , Then Click Reserve Now .
                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                            Feedback
                        </a></h4>
                </div>
                <div id="collapseFour" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to Receive The Feedback ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On Feedbacks Link In The Navigation bar As Shown In This Figure <img src="img/User Helper/28.jpg"><br><br>
                            - The Feedbacks Will Shown In A Table Like This Figure <br> <img src="img/User Helper/27.jpg">
                            
                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                            Order History
                        </a></h4>
                </div>
                <div id="collapseFive" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to View Your Order History ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Order History Link In The Navigation bar As Shown In This Figure <img src="img/User Helper/13.jpg"><br><br>
                            - The Table Of Order History Will Be Shown Like This Figure.<br><br><img src="img/User Helper/14.jpg"><br><br> </p>
                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
                            Profile
                        </a></h4>
                </div>
                <div id="collapseSix" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to View Your Profile ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The My Profile Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/15.jpg"><br><br>
                            - Your Profile Will Be Showed Like This Figure . <br> <img src="img/User Helper/16.jpg">
                        <p>      <b>How to Edit Your Profile ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The My Profile Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/15.jpg"><br><br>
                            - Your Profile Will Be Showed Like This Figure . <br> <img src="img/User Helper/16.jpg"><br><br>
                            - You Have To Click On Edit Profile And Then You Have To Fill Your Personal Information And Click On Edit Button  .<br> <img src="img/User Helper/17.jpg">
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
                            Reservation
                        </a></h4>
                </div>
                <div id="collapseSeven" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to Cancel Your Reservation ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The My Profile Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/15.jpg"><br><br>
                            - Your Profile Will Be Showed Like This Figure . <br> <img src="img/User Helper/16.jpg"><br><br><br><br>
                            - You Have To Click On Cancel Reservation  .<br><br><br><br><br> <img src="img/User Helper/18.jpg"> <br>
                            - And Then You Have To Choose Your Reservation Number That You Want To Cancel And Click On Cancel Reservation Button . <br></p>
                        <p>      <b>How to Update Your Reservation ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The My Profile Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/15.jpg"><br><br>
                            - Your Profile Will Be Showed Like This Figure . <br> <img src="img/User Helper/16.jpg"><br><br><br><br>
                            - You Have To Click On Update Reservation  .<br><br><br><br><br> <img src="img/User Helper/19.jpg"> <br>
                            - And Then You Have To Choose Your Reservation Number And The New Dates That You Want To Update And Click On Update Reservation Button . <br></p>
                    </div>
                </div>
            </div>
            <div class="accordion-group">
                <div class="accordion-heading">
                    <h4><a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight">
                            Permissions
                        </a></h4>
                </div>
                <div id="collapseEight" class="accordion-body collapse"  >
                    <div class="accordion-inner">
                        <p>      <b>How to Use Your Permissions ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            </p>
                        <p>      <b>How to Add New User ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On Add User  .<br><br><br><br><br> <img src="img/User Helper/31.jpg"> <br>
                            - And Then You Have To Enter The User Information  That You Want To Add And Click On Add User Button . <br></p>
                        <p>      <b>How to Search For User? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On Search User  .<br><br><br><br><br> <img src="img/User Helper/32.jpg"> <br>
                            - And Then You Have To Enter The Username Of The User That You Want To Search For , And Click On Search User Button . <br></p>
                        <p>      <b>How to Update User Information ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On Update User  .<br><br><br><br><br> <img src="img/User Helper/33.jpg"> <br>
                            - And Then You Have To Enter The New Information Of The User That You Want To Update , Based On The Username That You Have Entered ,  And Click On Update User Button . <br></p>
                        <p>      <b>How to Delete User  ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On Delete User  .<br><br><br><br><br> <img src="img/User Helper/34.jpg"> <br>
                            - And Then You Have To Enter The Username Of The User That You Want To Delete , And Click On Delete User Button. <br></p>
                        <p>      <b>How to List All The Users  ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On List Users  .<br><br><br><br><br> <img src="img/User Helper/35.jpg"> <br>
                            - And Then A Page Contains All Users Information Is Showed In A Tabulated Form Like The Above Figure . <br></p>
                        <p>      <b>How to Add New Car ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On Add Car .<br><br><br><br><br> <img src="img/User Helper/36.jpg"> <br>
                            - And Then You Have To Enter The Car Information That You Want To Add And Click On Add Car Button  . <br></p>
                        <p>      <b>How to Search For Car ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On Search Car .<br><br><br><br><br> <img src="img/User Helper/37.jpg"> <br>
                            - And Then You Have To Enter The Motor Number Of The Car That You Want To Search For And Click On Search Car Button  . <br></p>
                        <p>      <b>How to Update Car ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On Update Car .<br><br><br><br><br> <img src="img/User Helper/38.jpg"> <br>
                            - And Then You Have To Enter The New Information Of The Car That You Want To Update , Based On The Motor Number That You Have Entered ,  And Click On Update Car Button . <br></p>
                        <p>      <b>How to Delete Car ? <br></b>  <br>
                            - You Have To Login First <br>
                            - You Have To Click On The Permissions Link In The Navigation bar As Shown In This Figure . <img src="img/User Helper/29.jpg"><br><br>
                            - Your Permissions Page Will Be Showed Like This Figure . <br> <img src="img/User Helper/30.jpg"><br><br><br><br>
                            - You Have To Click On Delete Car .<br><br><br><br><br> <img src="img/User Helper/39.jpg"> <br>
                            - And Then You Have To Enter The Motor Number Of The Car That You Want To Delete For And Click On Delete Car Button  . <br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php include_once 'footer.php'; ?>