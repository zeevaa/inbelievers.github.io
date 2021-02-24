<?php
    $fromEmail = $_POST['email'];
    
    //save to db start
    $link = mysqli_connect("localhost", "inbelytj_digital_admin", "dataraledu", "inbelytj_inbelievers");

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // Attempt insert query execution
    $sql = "INSERT INTO newsletter_details (email) VALUES ('$fromEmail')";
    mysqli_query($link, $sql);
    
    // if(mysqli_query($link, $sql)){
    //     echo "Records added successfully.";
    // } else{
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    // }
 
    // Close connection
    mysqli_close($link);
    
    //save to db end

    echo '<script>alert("Thanks for subscribing!")</script>';
    echo '<script>window.location.href="../index.html";</script>';

?>
