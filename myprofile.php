<?php
include_once 'header.php';
include_once 'user.php';


?>

<?php
if (!loggedin()) {
    header('location:index.php');
    //header("refresh:0;url=index.php");
    echo '<script>alert("You Must Login First")</script>';
} else {
    $user_id = $_SESSION['user']['id'];
    $user = new user();
    $userinf = $user->GetUserDetails($user_id);
    $firstname = $userinf['firstname'];
    $username = $userinf['username'];
    $lastname = $userinf['lastname'];
    $SSN = $userinf['ssn'];
    $email = $userinf['email'];
    $password=$userinf['password'];
    $reservinf = $user->GetReservationsIDs($user_id);
    /* foreach ($reservinf as $reserv_id) {
      echo $reserv_id['id'];
      } */
    $string = "";
}
?>
<table class = "table table-bordered">
    <tbody>
    <Br> <BR>
    <h4> Profile Information</h4> 
    
    <br>
    <tr class = "techSpecRow"><th colspan = "2">My Profile</th></tr>
    <tr class = "techSpecRow"><td class = "techSpecTD1">Username: </td><td class = "techSpecTD2"><?php echo $username ?></td></tr>
    <tr class = "techSpecRow"><td class = "techSpecTD1">Password:</td><td class = "techSpecTD2"><?php echo $password ?></td></tr>
    <tr class = "techSpecRow"><td class = "techSpecTD1">Firstname:</td><td class = "techSpecTD2"><?php echo $firstname ?></td></tr>
    <tr class = "techSpecRow"><td class = "techSpecTD1">Lastname:</td><td class = "techSpecTD2"><?php echo $lastname ?></td></tr>
    <tr class = "techSpecRow"><td class = "techSpecTD1">Email:</td><td class = "techSpecTD2"><?php echo $email ?></td></tr>
    <tr class = "techSpecRow"><td class = "techSpecTD1">SSN</td><td class = "techSpecTD2"><?php echo $SSN ?></td></tr>
    <tr class = "techSpecRow"><td class = "techSpecTD1">Reservations-IDs</td><td class = "techSpecTD2"><?php
            foreach ($reservinf as $reserv_id) {
                $string .= $reserv_id['id'] . ',';
            }

            $string = substr_replace($string, "", -1);
            echo $string;
            ?></td></tr>
   

</tbody>
</table>
 <form class="form-horizontal" action="editprofile.php" method="POST" >

     <button type="submit" style="width: 190px" name="editprofile" class="btn btn-large btn-primary pull-left"> Edit Profile <i class=" "></i></button>

</form> 
<br> <br> <br>
<form class="form-horizontal" action="cancelreservation.php" method="POST" >

    <button type="submit" name="cancelreservation" class="btn btn-large btn-primary pull-left"> Cancel Reservation <i class=" "></i></button>

</form> 

<br> <br> 
<form class="form-horizontal" action="updatereservation.php" method="POST" >

    <button type="submit" name="updatereservation" class="btn btn-large btn-primary pull-left"> Update Reservation <i class=" "></i></button>

</form> 
<br>

<?php
include_once 'footer.php';
?>