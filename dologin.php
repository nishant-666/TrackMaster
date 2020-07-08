<?php
    session_start();
    if(isset($_SESSION['login-id']))
        header('Location:index.php');
    if(isset($_POST['email']))
    {
        include('dbconfig.php');
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="SELECT * FROM `users` WHERE `email`='".$email."'";
        $result=mysqli_query($conn, $query);
        if($result!=false)
        {
            // echo mysqli_fetch_assoc($result)['password'];
            if(mysqli_num_rows($result)==1)
            {
                // while($row=mysqli_fetch_assoc($result))
                $row=mysqli_fetch_assoc($result);
                if(strcmp($email, $row['email']==0))
                {
                    
                    $query="SELECT * FROM `users` WHERE `email`='".$email."' AND `password`='".$password."'";
                    $result=mysqli_query($conn, $query);
                    if($result!=false)
                    {
                        if(mysqli_num_rows($result)==1)
                        {
                            
                            while($row=mysqli_fetch_array($result))
                            if(strcmp($password, $row['password'])==0)
                            {
                                
                                $_SESSION['login-id']=$email;
                                $name=$row['name'];
                                $_SESSION['name']=$name;
                                header("Location:index.php");
                                
                            }
                            else
                                header('Location:login.php?attempt=password');
                        }
                        else
                                header('Location:login.php?attempt=password');
                    }
                    else
                                header('Location:login.php?attempt=password');
                }
                else
                                header('Location:login.php?attempt=email');
            }
            else
                                header('Location:login.php?attempt=email');
        }
        else
                                header('Location:login.php?attempt=email');
        mysqli_close($conn);
    }
?>
