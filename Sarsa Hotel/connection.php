<?php
  $con=mysqli_connect("localhost","root","","registered_users");
   
   if(mysqli_connect_error())
   {
       echo"<script>alert('Cannot Connect');</script>";
       exit();
   }
?>
