<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
   <div class="flex justify-center h-screen">
     <form action="" method="post" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <h1 class="text-3xl font-bold mb-4 text-center">Finish Your Payment</h1>
        <button type="submit" name="submit" class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded w-full">Proceed To Pay</button>
     </form>
     <?php
       if(isset($_POST['submit']))
       {
        echo"
          <script>
             alert('Payment Successfull');
             window.location.href='index.php';
          </script>
        
        ";
        
       }
     ?>
   </div>
</body>
</html>