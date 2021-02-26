<?php  include_once 'process.php';  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>REGISTRATION FORM PHP</title>
</head>
<body>
    <!-- all input are being processed in process.php -->
    <div class="container">
            <?php

                //destroying user information success message
                if (isset($_GET['delete'])): ?>

                <div class="alert alert-info">
                    <?php
                        echo "User has been removed!";
                        
                        session_destroy();
                        endif;
                    ?>
                </div>

                
            <?php

            // success message and data display of user 
            if (isset($_GET['data'])): ?>

            <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
            </div>
      
       
        <!-- user information display after submit -->
        <table class="table m-auto w-75">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Password</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                
                ?>
                <tr>
                    <!-- output of array session message process on line 30 process.php -->

                    <td><?php echo $_SESSION['userDetail']['name']; ?></td>
                    <td><?php echo $_SESSION['userDetail']['email']; ?></td>
                    <td><?php echo $_SESSION['userDetail']['address']; ?></td>
                    <td><?php echo $_SESSION['userDetail']['password']; ?></td>
                    <td><img src="upload/<?= $_SESSION['userDetail']['image']; ?>" alt="Your Image" width="150px"></td>
                    
                    <td>
                        <form>
                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                <!--  -->
            </table>

       
        <?php endif ?>
    

        <div class="row justify-content-center mt-5">
            <form action="process.php" method="post" enctype="multipart/form-data">
                <h2>Registration Form</h2>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                    <!-- name -->
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <!-- email -->
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" cols="30" rows="10" placeholder="enter address"></textarea>
                </div>

                <div class="custom-file">
                    <input type="file" name="img" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose an Image</label>
                    <!-- password -->
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control" required>
                    <!-- password -->
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="save">Save</button>
                </div>
                
        </div>
    </div>
</body>
</html>

