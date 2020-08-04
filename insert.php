<?php
     include 'includes/config.php';
?>
<?php
    
    $name =  $_POST["name"];  
    $email = $_POST["email"];  
    $message = $_POST["message"];  
    $date = $_POST["date"];
        
    $query = mysqli_query($config,"INSERT INTO `users`(`name`, `email`, `message`, `date`) VALUES('".$name."','".$email."','".$message."','".$date."')");
        
    if($query){
        echo 1;
        }	else{
        echo 0;
        }      
?>