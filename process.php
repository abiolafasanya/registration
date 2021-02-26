<!-- Pocessing page of registration form input -->

<?php

    // Starting Session
    session_start();
    if(isset($_POST['save'])){
   
        // define variables and set to empty values
        $name = $email = $address = $password = "";

        // validating the input form using function to avoid repetion
        
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

        // assigning values to defined variable

        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);   
        $address = test_input($_POST["address"]);   
        $password = test_input($_POST["password"]);   

        // file upload
        $img = $_FILES['img']['name'];
        $path = 'upload/'.$img;
        move_uploaded_file($_FILES['img']['tmp_name'], $path);

        // assigning session variable

        //array of user informations
        $_SESSION['userDetail']= array(
            "name" => $name, 
            "email" => $email, 
            "address" => $address, 
            "password" => $password,
            "image" => $img
        );
      
        // session message
        $_SESSION['message'] = "Message has been saved!";
        $_SESSION['msg_type'] = "success";
        header(
            'location: index.php?data'
        );
    }
  

?>