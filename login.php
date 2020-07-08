<?php
session_start();
if(isset($_SESSION['login-id']))
    header('Location:index.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackMaster || Log in</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" />
</head>
<body style="justify-content: center;align-items: center;display: flex;background-image:linear-gradient(
    45deg,
    #000000,
    #152331
  ) ;">
    <div class="ui raised very padded text container segment fluid" style="border-radius: 35px;width: 150%;border-color: #f44336;border-width: 2px;">
        <h2 class="ui header">Login to <i style="color: #f44336;">TrackMaster</i></h2>
        <div class="sub header" style="font-size:20px;margin-bottom:30px"><i>A place to note all your software issues!</i></div>
          <?php
            if(isset($_GET['attempt']))
            { 
              echo '<div class="ui red message">';
              if($_GET['attempt']=='password')
                echo 'Incorrect Email or Password';
              else if($_GET['attempt']=='email')
                echo 'Email ID not registered';
              echo '</div>';
            }
          ?>
        
        <form class="ui form" action="dologin.php" method="POST">
            
            <div class="field">
              <label>Email</label>
              <input type="email" name="email" placeholder="Enter your Email">
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your Password">
              </div>
           
            <button class="ui red button" type="submit"><i class="sign in alternate icon"></i>Sign in</button>
            <div class="ui small header">Don't have an account yet? <a href="register.php" style="color: #f44336;">Register here!</a></div>
          </form>
      </div>
      
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous"></script>

</html>