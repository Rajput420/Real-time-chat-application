<?php

session_start();
include_once "config.php";
$fname    = mysqli_real_escape_string($conn, $_POST['fname']);
$lname    = mysqli_real_escape_string($conn, $_POST['lname']);
$email    = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) 
{
    // lets check user email is valid or not
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        // if email is not valid 
       // let's check that email already exist in database or not
       $sql = mysqli_query($conn, "SELECT email FROM users where email = '{$email}'");

       if (mysqli_num_rows($sql) > 0) 
       {
           // if email already exist 
           echo "$email - This email already exist!";
       }
       else
       {
           // let's check user upload file or not
           if (isset($_FILES['image'])) 
           {
               //if file is uploaded
               $img_name = $_FILES['image']['name']; //  getting user uploaded image name

               $image_type = $_FILES['image']['type'];  // getting user upload image type

               $tmp_name = $_FILES['image']['tmp_name'];  // this temporary name is used to save /move file in our folder 

               // let's explode image and get the last extention like jpg, png
               $img_explode = explode('.',$img_name); 

               $img_ext = end($img_explode); // here we get the extension o a user uploaed imAGE file

               $extensions = ['png', 'jpeg', 'jpg']; // these are some valid extension and we've store them in array
               
               if (in_array($img_ext, $extensions) === true) 
               {
                   //  if user uploaded image extension is matched with any array extensions
                   $time = time(); //this will return us curent time.. 
                                    // we need this time  because when you uploading user image to in our folder we rename user file with curent time
                                    //so all the time image file will have a unique name

                    //let's move the user uploaded image to our particular folder 
                    $new_img_name = $time.$img_name;

                    if(move_uploaded_file($tmp_name,"images/".$new_img_name)) 
                    { 
                        // if user upload image move to our folder successfully
                        $status = "Active now"; // once user signed up then this status will be active now

                        $random_id = rand(time(), 10000000); // creating random id for user

                        // let's start insert all user data inside table 
                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                    if ($sql2) 
                    {
                        // if  these data inserted
                        $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");

                        if (mysqli_num_rows($sql3) > 0) 
                        {
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION['unique_id'] = $row['unique_id']; //using this sesion we used user unique_id in other php files

                            echo "success";
                        } 
                        else 
                        {
                            # code...
                        }
                        
                    }
                    }
               }
               else
               {
                echo 'Please select an image file type - jpg, jpeg and png!';
               }
               
           }
           else
           {
               echo "Please select an image file!";
           }
       }
    } 
    else 
    {
        echo "$email - this is not a valid email!";
    }
    
    # code...
} 
else 
{
    echo "All input fields are required!";
}



?>