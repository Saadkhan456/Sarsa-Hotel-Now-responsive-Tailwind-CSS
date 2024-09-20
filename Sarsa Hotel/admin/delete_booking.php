<?php
    include('../dbcon.php'); // Include your database connection file

    // Check if the booking ID is provided in the URL
    if(isset($_GET['id'])) {
        // Sanitize the input to prevent SQL injection
        $id = mysqli_real_escape_string($sql, $_GET['id']);

        // Construct the SQL query to delete the booking record
        $qry = "DELETE FROM `room booking` WHERE id='$id'";

        // Execute the query
        $run = mysqli_query($sql, $qry);

        if($run) {
            // If deletion is successful, redirect back to the page where bookings are listed
            header("Location: booking.php"); // Replace 'booking_list.php' with the actual page name
            exit();
        } else {
            // If deletion fails, display an error message or handle it accordingly
            echo "Error: Unable to delete booking.";
        }
    } else {
        // If booking ID is not provided in the URL, display an error message or handle it accordingly
        echo "Error: Booking ID not provided.";
    }
?>
