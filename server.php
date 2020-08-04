<?php
    include ('includes/config.php');
?>
 
<?php
    $query="SELECT * FROM `users` order by id desc limit 0,5";
    $data=mysqli_query($config,$query);
    $json_array = array();
    while($row=mysqli_fetch_assoc($data))
    {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $message = $row['message'];
        $date = $row['date'];

        $json_array[] = array( "id" => $id,
                                "name" => $name,
                                "email" => $email,
                                "message" => $message,
                                "date" =>  $date);
    }
        echo json_encode($json_array);
?>
              
