<?php
session_start();
if(!isset($_SESSION['login-id']))
    header('Location:login.php');
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TrackMaster || Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" />
    <link rel="icon" href="favicon.ico">
  </head>
  <body onload="fetchIssues()" style="background-image:linear-gradient(
    45deg,
    #000000,
    #152331
  ) ;">

  <?php include('sidebar.php'); ?>
    <div class="container">
      
      <h1 class="ui header" style="color: white;text-align: center;padding: 20px;">Welcome to <i style="color: #f44336;">TrackMaster</i></h1>
      <div class="sub header" style="color: white;text-align: center;font-size:25px">A place to note all your software issues!</div>
      <div class="ui raised very padded text container segment fluid" style="border-radius: 35px;width: 150%;border-color: #f44336;border-width: 2px;">
        <h3>Add New Issue:</h3>
        <form class="ui form" id="issueInputForm">
          <div class="field">
            <label>Description</label>
            <input type="text" id="issueDescInput" placeholder="Enter your Description" required>
          </div>
          <div class="field">
            <label for="issueSeverityInput">Choose Severity</label>
            <select id="issueSeverityInput" class="form-control">
              <option value="Low">Low</option>
              <option value="Medium">Medium</option>
              <option value="High">High</option>
            </select>
          </div>
          <div class="field" style="margin-top: 10px;">
              <label>Assigned to</label>
              <input type="text" id="issueAssignedToInput" placeholder="Assigned to" required>
            </div>
          <div class="field">
            
          </div>
          <button class="ui red button" type="submit"> <i class="plus icon"></i>Add</button>
        </form>
        
      </div>
      
      <div class="col" >
        
        <div id="issuesList">
       
      </div>
      </div>

    </div>
    <script src="chance.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>
