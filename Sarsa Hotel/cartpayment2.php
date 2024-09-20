<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Card Details</title>
</head>
<body>
    <div class="flex justify-center mt-20">
        <div class="img flex justify-evenly mb-4">
        </div>
        <div class="payment-container bg-orange-300 rounded-lg shadow-lg p-4 md:p-6 lg:p-12 xl:p-24">
            <h1 class="payment-h1 text-3xl font-bold text-center mb-4">Enter Details</h1>
            <form action="" method="post" class="flex flex-col justify-center items-center">
                <div class="form-payment mb-4">
                    <label class="block mb-2" for="cardno">Card Number</label>
                    <input type="number" name="cardno" class="form-control w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-black" required>
                </div>
                <div class="form-payment mb-4">
                    <label class="block mb-2" for="cvv">CVV Number</label>
                    <input type="number" name="cvv" class="form-control w-full p-2 pl-10 text-sm text-gray-700 rounded-lg border border-black" max-length="3" required>
                </div>
                <button class="payment-btn bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" name="card-purchase">Proceed For Further Details</button>
                <?php
                if(isset($_POST['card-purchase']))
                {
                    $cardno=$_POST['cardno'];
                    $cvv=$_POST['cvv'];
                    $qry="SELECT * FROM `card details` WHERE `cardno`='$cardno' AND `cvv`='$cvv' ";
                    $run=mysqli_query($sql,$qry);
                    $row=mysqli_fetch_assoc($run);
                    if($row<1)
                    {
                        echo "<script>
                        alert('Card no or cvv no not match');
                        window.location.href='cartpayment2.php';
                        </script>";
                    }
                    else{
                        header('location:cartpayment3.php');
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>