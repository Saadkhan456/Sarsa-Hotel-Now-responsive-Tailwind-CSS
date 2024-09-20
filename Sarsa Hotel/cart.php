<?php
session_start();
include('dbcon.php');
include('header.php');
$itemNames = [];
$totalQuantity = 0;
$grandTotal = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        // Update item names, total quantity, and grand total
        $itemNames[] = $value['item_name'];
        $totalQuantity += $value['quantity'];
        $grandTotal += $value['price'] * $value['quantity'];
    }
}

// Store item names, total quantity, and grand total in session variables
$_SESSION['itemNames'] = $itemNames;
$_SESSION['totalQuantity'] = $totalQuantity;
$_SESSION['grandTotal'] = $grandTotal;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container margin top-36 mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-8 text-center">My Cart</h1>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Cart Items -->
            <div class="flex-1">
                <table class="w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-100 border-b border-gray-200">
                        <tr>
                            <th class="p-4 text-left">Sr No</th>
                            <th class="p-4 text-left">Item Name</th>
                            <th class="p-4 text-left">Item Price</th>
                            <th class="p-4 text-left">Quantity</th>
                            <th class="p-4 text-left">Total</th>
                            <th class="p-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {
                                $sr = $key + 1;
                                echo "
                                <tr>
                                    <td class='p-4'>$sr</td>
                                    <td class='p-4'>$value[item_name]</td>
                                    <td class='p-4'>$value[price] <input type='hidden' class='iprice' value='$value[price]'></td>
                                    <td class='p-4'>
                                        <form action='manage_cart.php' method='POST'>
                                            <input type='number' class='iquantity border rounded px-2 py-1' name='mod_quantity' onchange='this.form.submit();' value='$value[quantity]' min='1' max='10'>
                                            <input type='hidden' name='item_name' value='$value[item_name]'>
                                        </form>
                                    </td>
                                    <td class='p-4 itotal'></td>
                                    <td class='p-4'>
                                        <form action='manage_cart.php' method='POST'>
                                            <button name='remove_item' class='bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300'>Remove</button>
                                            <input type='hidden' name='item_name' value='$value[item_name]'>
                                        </form>
                                    </td>
                                </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary -->
            <div class="flex-none w-full lg:w-1/3 bg-white border border-gray-200 rounded-lg shadow-md p-6">
                <h3 class="text-2xl font-bold mb-4">Cart Summary</h3>
                <div class="mb-4">
                    <p class="text-lg font-semibold">Grand Total:</p>
                    <h5 id="gtotal" class="text-2xl font-bold">$0.00</h5>
                </div>
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                    <form action="cartpayment.php" method="POST">
                        <button type="submit" class="bg-orange-500 text-white py-2 px-4 rounded hover:bg-orange-600 transition duration-300 w-full">Make Purchase</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function subTotal() {
            gt = 0;
            for (var i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt += (iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText = gt.toFixed(2);
        }

        subTotal();
    </script>
</body>
</html>
