<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="ChickenLeg.jpeg"/>
<title>Food and Videos</title>
  <link rel="stylesheet" href="HomeStyle.css" />
  <link rel="stylesheet" href="ThreeColumn.css" />
  <link rel="stylesheet" href="LogIn.css" />
  <link rel="stylesheet" href="SignUp.css"/>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>  
  <link rel="stylesheet" href="Font.css" />

  <meta charset="UTF-8" />
  <title>Title</title>
</head>

<body>

<?php
  echo '<div id="logo" class="LogoRow" ' . 'onclick="location.href=' . "'index.php'" . '">';
  echo  '<img src="logo.png" alt="pic"/>';
  echo '</div>';
  echo '<div id="regbuttons" class="RegRow">';
   echo  '<div id="login" class="reg" onclick="location.href=' . "'SignUp.php'" . '">';
   echo '<a>Sign Up!</a>';
    echo '</div>';
  echo '</div>';
  ?>

  <div id="col1" class="column"></div>

  <div id="col2LogIn" class="column">


    <form action="LogInHandler.php" method="POST">
      <label id="username" for="uname">Username:</label><br />
      <input type="text" id="uname" name="fname" <?php session_start(); if (array_key_exists("LastUsernameEntered", $_SESSION)) echo 'value="'.$_SESSION['LastUsernameEntered'] .'"'?> ><br />
      <label id="password" for="pname">Password:</label><br />
      <input type="text" id="pname" name="pname" name=""><br />
      <input type="submit" name="submit">
    </form>
    <form action="Contribute.php">

    </form>
    <div class = "SignUpError">
    <?php
    if (array_key_exists('LastUsernameEntered', $_SESSION) && array_key_exists('SignedIn', $_SESSION) && $_SESSION['SignedIn'] == false) {
    echo 'Invalid username and/or password!';
    }
    
    
    ?>
    </div>  
</div>
  <div id="col3" class="column"></div>

  <link rel="stylesheet" href="Footer.css" />
  <div id="row4">
    <div class="footer" onclick="location.href='AboutUs.html'">
      <a>About Us</a>
    </div>
    <div class="footer"><a>Social Media</a></div>
    <div class="footer"><a>Contact Owner</a></div>
    <div class="footer"><a>Terms of Service</a></div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
   <script src="SignUp.js"></script>
</body>

</html>