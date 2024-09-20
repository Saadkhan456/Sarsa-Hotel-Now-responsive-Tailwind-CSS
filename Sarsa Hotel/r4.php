<?php
include('dbcon.php');
$ci=$_GET['ci'];
 $co=$_GET['co'];
 $rt=$_GET['rt'];
 $nr=$_GET['nr'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <title>ac room form</title>
</head>
<style>
    
   
   #r1-container h1{
       text-align:center;
       margin-top: 30px;
       font-family: "Oswald", sans-serif;
    
   }
   form{
       display: flex;
       justify-content:center;
       align-items: center;
       font-family: "Oswald", sans-serif;
       font-family: "Oswald", sans-serif;
       flex-direction:column;
       

   }
   table{
      width: 200px;
      height:150px;
      border:1px solid white;
      background-color:#d86a2f;
      padding: 40px;
      border-radius:20px;font-family: "Oswald", sans-serif;
    
      
      
   }
   table tr td{
       padding: 8px;
       font-family: "Oswald", sans-serif;
    
   }
   table tr td input{
       font-size:17px;font-family: "Oswald", sans-serif;
    
   }
</style>
<body>
    <div id="r1-container">
    <h1>Please Fill Up The Form Given Below</h1>
<form action="r4.php" method="post">
<h1>BOOK NOW</h1>
    <table>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status" title="status" placeholder="Availble" readonly></td>
        </tr>
       
        <tr>
            <td>name</td>
            <td><input type="text" name="name" title="name" required></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" title="address" required></td>
        </tr>
        <tr>
            <td>State</td>
            <td><input type="text" name="state" title="state" required></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type="text" name="city" title="city" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" title="email" required></td>
        </tr>
        <tr>
            <td>Check in Date</td>
            <td><input type="date" name="cin" title="cindate" value="<?php echo $ci; ?>"> </td>
            <td>Check out Date</td>
            <td><input type="date" name="cout" title="coutdate" value="<?php echo $co; ?>"></td>
        </tr>
        <tr>
            <td>Members</td>
            <td><input type="text" name="members" title="members" required></td>
        </tr>
        <tr>
            <td>Room Type</td>
            <td><input type="text" name="roomtype" title="roomtype" value="<?php echo $rt; ?>"></td>
        </tr>
        <tr>
            <td>No of Rooms</td>
            <td><input type="text" name="noofroom" title="No of Room" value="<?php echo $nr; ?>"></td>
        </tr>
        <tr>
            
            <td><input type="submit" name="submit" value="submit"></td>
        </tr>
    </table>
    <?php
        
        
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
        $address=$_POST['address'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $email=$_POST['email'];
        $ci=$_POST['cin'];
        $co=$_POST['cout'];
        $members=$_POST['members'];
        $roomtype=$_POST['roomtype'];
        $noofroom=$_POST['noofroom'];

        $qryy="SELECT * FROM `normal` WHERE `status`='un book'";
        $run=mysqli_query($sql,$qryy);
        // $rno=$ow['roomno'];
        $row=mysqli_fetch_assoc($run);
        $rno=$row['roomno'];

        
        

            $qry="INSERT INTO `room booking` (`id`, `name`, `address`, `state`, `city`, `email`, `cin`, `cout`, `members`, `roomtype`, `no of rooms`) VALUES (NULL, '$name', '$address', '$state', '$city', '$email', '$ci', '$co', '$members', '$roomtype', '$noofroom');";
           
            $run=mysqli_query($sql,$qry);
            
           
           
            if($run==true)
            {
                mysqli_query($sql,"UPDATE `normal` SET `status`='book' WHERE `roomno`='$rno' ");
                header('location:cartpayment2.php');
                ?>
                <script>
                    alert("room book Successfully");
                </script>
                <?php
            }
            else{

            }
        }
    ?>
</form> 
</div>
</body>
</html>