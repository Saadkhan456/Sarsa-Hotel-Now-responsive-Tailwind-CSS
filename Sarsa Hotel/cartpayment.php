<?php
include('dbcon.php');
session_start();
if (isset($_SESSION['totalQuantity']) && isset($_SESSION['grandTotal'])) {
    $totalQuantity = $_SESSION['totalQuantity'];
    $grandTotal = $_SESSION['grandTotal'];
} else {
    // If session variables are not set, initialize them to zero
    $totalQuantity = 0;
    $grandTotal = 0;
}
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>cart info</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 pt-6 md:p-6 lg:p-12 xl:p-24">
        <div class="bg-white rounded-lg shadow-lg p-4 md:p-6 lg:p-12 xl:p-24">
        <h2 class="text-2xl font-bold mb-4 text-center">Make Purchase</h2>
            <form action="" method="POST" class="flex flex-col justify-center items-center">
                <div class="form-group mb-4">
                    <label class="text-lg font-bold mb-2" for="fullname">Full Name</label>
                   <input type="text" name="fullname" class="form-control w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-black">
                </div>
                <div class="form-group mb-4">
                    <label class="text-lg font-bold mb-2" for="phone">Phone No</label>
                    <input type="number" name="phone" class="form-control w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-black" required>
                </div>
                <div class="form-group mb-4">
    <label class="text-lg font-bold mb-2" for="addresss">Your Address</label>
    <textarea name="addresss" class="form-control w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-black" required></textarea>
</div>
                <div class="form-group mb-4">
                    <label class="text-lg font-bold mb-2" for="totalQuantity">Total Quantity</label>
                    <input type="text" value="<?php echo $totalQuantity; ?>" class="form-control w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-black" readonly>
                </div>
                <div class="form-group mb-4">
                    <label class="text-lg font-bold mb-2" for="grandTotal">Grand Total</label>
                    <input type="text" value="<?php echo $grandTotal; ?>" class="form-control w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-black" readonly>
                </div>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" name="purchase">Make Purchase</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['purchase']))
{
    $fullname=$_POST['fullname'];
    $phone=$_POST['phone'];
    $address=$_POST['addresss'];
    $qry="INSERT INTO `food`(`id`, `full_name`, `phone`, `address`) VALUES ('','$fullname','$phone','$address')";
    $run=mysqli_query($sql,$qry);
    if($run)
    {
        header('location:cartpayment2.php');
        
    }
    else{
        ?>
               <script>
                   alert("not info");
               </script>
         <?php
    }
}
?>