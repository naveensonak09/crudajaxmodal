<html>
<head>
    <title>table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/autoajax.js"></script>
    <script src="js/form.js"></script>
</head>

<body>
    <div class="container">
        <h3 class="mt-3 mb-3">User Table</h3>
        <button class="btn btn-success btn-md" data-toggle="modal" data-target="#modalForm">
              Submit Form
            </button>

        <div class="modal fade" id="modalForm" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                              <span aria-hidden="true">&times;</span>
                              <span class="sr-only">Close</span>
                          </button>
                        <h4 class="modal-title" id="myModalLabel">Contact Form</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="insert" method="post" action="insert.php">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter your name" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Enter your email" />
                            </div>
                            <div class="form-group">
                                <label for="inputMessage">Message</label>
                                <textarea class="form-control" name="message" id="inputMessage" placeholder="Enter your message"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputDate">Date</label>
                                <input type="date" class="form-control" name="date" id="inputDate" placeholder="Enter your date" />
                            </div>
                            <div>
                                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="conatiner">
            <table id="userTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        
        <?php
            include ('includes/config.php');
            $limit = 5;
            $sql = "SELECT COUNT(*) as id FROM users";  
            $result = mysqli_query($config, $sql);  
            $row = mysqli_fetch_array($result);  
            $total = $row['id'];  
            $total_pages = ceil($total/$limit); 
        ?>
 
        <div class="container">
            <ul class='pagination text-center' id="pagination">
                <?php if(!empty($total_pages)){for($i=1; $i<=$total_pages; $i++){  
                if($i == 1){?>
                <li class='active'  id="<?php echo $i;?>"><a href='server.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
                <?php }else{?>
                <li id="<?php echo $i;?>"><a href='server.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                <?php } } }?>			
            </ul>
        </div>
    </div>
</body>
</html>