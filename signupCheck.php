<?php

    session_start();
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $phone = mysqli_real_escape_string($conn, $_POST['phoneno']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    if(!empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($age) && !empty($phone) && !empty($email) && !empty($password) && !empty($cpassword))
    {
        if(strlen($fname) <= 10)
        {
            if(strlen($mname <=10 ))
            {
                if(strlen($lname) <= 10)
                {
                    if($password === $cpassword)
                    {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL))
                        {
                            
                            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql) > 0)
                            {
                                echo "$email - This email already exist";
                            }
                            else
                            {
                                
                                
                                $uppercase = preg_match('@[A-Z]@', $password);
                                $lowercase = preg_match('@[a-z]@', $password);
                                $number    = preg_match('@[0-9]@', $password);
                                $specialChars = preg_match('@[^\w]@', $password);

                                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
                                {
                                    echo "The Password should contain atleast 8 characters, one uppercase, one lowercase, one number and one symbol";
                                }
                                else
                                {
                                    if(isset($_FILES['image']))
                                    {
                                        $img_name = $_FILES['image']['name']; 
                                        $tmp_name = $_FILES['image']['tmp_name']; 
                                        $img_expolde = explode('.', $img_name);
                                        $img_ext = end($img_expolde);

                                        $extensions = ['png','jpeg','jpg']; 
                                        if(in_array($img_ext, $extensions) === true)
                                        {
                                            $time = time(); r
                                            $new_img_name = $time . $img_name;

                                            if(move_uploaded_file($tmp_name, "images/".$new_img_name))
                                            { 

                                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                                                //inserting in database
                                                $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, mname, lname, gender, age, phoneno, email, password, img)
                                                                            VALUES ({$random_id}, '{$fname}', '{$mname}', '{$lname}', '{$gender}', '{$age}', '{$phoneno}' ,'{$email}', '{$hashed_password}', '{$new_img_name}')");

                                                if($sql2)
                                                {  
                                                    echo "Something went wrong!"; 
                                                }
                                                else
                                                {
                                                    echo "Something went wrong!";
                                                }
                                            }
                                        }
                                        else
                                        {
                                            echo "Please Uplaod A Image File - jpeg, png, jpg";
                                        }
                                    }
                                    else
                                    {
                                        echo "Please Uplaod A Image File!";
                                    }
                                }
                            }
                        }
                        else
                        {
                            echo "$email - This is not a valid Email!";
                        }
                    }
                    else
                    {
                        echo "confirm Password not matched";
                    }
                }
                else
                {
                    echo "Please Give a Short Last Name";
                }
            }
            else
            {
                echo "Please Give a Middle Last Name";
            }
        }
        else
        {
            echo "Please Give a Short First Name";
        }
    }
    else
    {
        echo "All input field are required!";
    }
?>
