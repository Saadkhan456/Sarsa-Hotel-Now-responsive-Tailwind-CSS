<?php
 include('../dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stylee.css">
</head>
<style>
    .admin-booking{
        background:rgba(255,255,255,0.5); 
        
    }
    .admin-booking h1{
        text-align:center;
        margin-top: 20px;
    }
    body::before{
    position: absolute;
    content: "";
    height: 100%;
    width: 100%;
    z-index: -1;
    opacity: 0.89;
    background: url('../img/dinning2.jpg') center center/cover no-repeat;
    }
    .admin-booking table tr{
        font-size:20px;
        font-family: "Oswald", sans-serif;
    }
</style>
<body>
<div class="wrapper-container">
    <div class="wrapper">
        <ul>
            <li><a href="aroom.php">Room </a></li>
           
            <li><a href="adminfood.php">Food</a></li>
            
            <li><a href="admindash.php">Admin Dash</a></li>
            
        </ul>
    </div>
</div>

<div class="admin-booking">
        <h1 class="admin-book">Food  Booking <Section></Section></h1>
        <table>
            <tr>
                    <th width="10%" height="50px">Full Name</th>
                     <th width="10%" height="50px">Address</th>
                     <th width="10%" height="50px">Phone</th>
                     

            </tr>
            <?php
               $qry="SELECT * FROM `food`";
               $run=mysqli_query($sql,$qry);
                
                 while( $row=mysqli_fetch_assoc($run))
                 {
                    $name=$row['full_name'];
                    $address=$row['address'];
                    $phone=$row['phone'];
                    
                    ?>
                    <tr>
                     <td width="10%" height="50px"><center><?php echo $name; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $address; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $phone; ?></center></td>
                    
                     
                 </tr>

                    <?php
                 }
            ?>
        </table>
    </div>

</body>
</html>