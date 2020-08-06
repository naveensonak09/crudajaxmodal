<?php
    include ('includes/config.php');
?>
  
<?php

    $limit = 5;  
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
    $start_from = ($page-1) * $limit;

    $query="SELECT * FROM `users` order by id desc limit $start_from,$limit";
    $data=mysqli_query($config,$query);
    $json_array = array();
    while($row=mysqli_fetch_assoc($data))
    {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $message = $row['message'];
        $date = $row['date'];
?>
        <tr> 
            <td><?php echo $id; ?></td> 
            <td><?php echo $name; ?></td> 
            <td><?php echo $email; ?></td> 
            <td><?php echo $message; ?></td> 
            <td><?php echo $date; ?></td> 
        </tr> 
    <?php 
        }
    ?>
              
