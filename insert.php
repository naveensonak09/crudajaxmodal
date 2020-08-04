<?php
     include 'includes/config.php';
?>
<?php
    
    $name =  $_POST["name"];  
    $email = $_POST["email"];  
    $message = $_POST["message"];  
    $date = $_POST["date"];
        
    $query = mysqli_query($config,"INSERT INTO `users`(`name`, `email`, `message`, `date`) VALUES('".$name."','".$email."','".$message."','".$date."')");
        $json_array[] = array( "success" => true,
                                "msg" => "data inserted.");
    if($query){
        echo json_encode($json_array); 
        }	else{
        echo 0;
        }      
?>