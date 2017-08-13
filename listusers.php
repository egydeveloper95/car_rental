<?php
include_once 'header.php';
?>
<?php
include_once 'admin.php';

$admin = new admin();
$Users = $admin->ListUsers();
?>
   <style>
            .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 12px 22px;
                cursor: pointer;
            }
        </style>
<table class = "table table-bordered">
    <tbody>
    <Br> <BR>
    <h4> Users</h4> 

    <br>
    <tr class = "techSpecRow"><th>ID</th><th>Firstname</th><th>Lastname</th><th>SSN</th><th>Email</th><th>Username</th><th>Password</th><th>Type</th></tr>
    <?php
    foreach ($Users as $User) {
        $id = $User['id'];
        $firstname = $User['firstname'];
        $lastname = $User['lastname'];
        $SSN = $User['ssn'];
        $email = $User['email'];
        $username = $User['username'];
        $password = $User['password'];
        $type_id = $User['user_type_id'];
        $UserTypes = $admin->GetUserTypeById($type_id);

        echo '<tr class = "techSpecRow"><th>' . $id . '</th><th>' . $firstname . '</th><th>' . $lastname . '</th><th>' . $SSN . '</th><th>' . $email . '</th><th>' . $username . '</th><th>' . $password . '</th><th>' . $UserTypes[0]['type'] . '</th></tr>';
    }
    ?>



</tbody>
</table>

<a href="updateuser.php" class="button">Update User</a>
<a href="deleteuser.php" class="button">Delete User</a>
<a href="AdminPerm.php" class="button">Back</a>
<?php
include_once 'footer.php';
?>

