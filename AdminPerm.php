<?php include_once 'header.php'; ?>





<!DOCTYPE html>
<html>
    <head>
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
    </head>
    <body>





        <pre>
        <h3>          User            Car  </h3>                                 
        <a href="adduser.php" class="button">Add User   </a> <a href="addcar.php" class="button">Add Car   </a>  <br>
        <a href="searchuser.php" class="button">Search User</a> <a href="searchcar.php" class="button">Search Car</a> <br>
        <a href="updateuser.php" class="button">Update User</a> <a href="updatecar.php" class="button">Update Car</a> <br>
        <a href="deleteuser.php" class="button">Delete User</a> <a href="deletecar.php" class="button">Delete Car</a>
        <a href="listusers.php" class="button">List Users</a>
        <br> <br>
       
        </pre>





        <br> <br><br> <br>


    </body>
</html>



</body>
</html>

<!-- MainBody End ============================= -->
<?php
include_once 'footer.php';
?>