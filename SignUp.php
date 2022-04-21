<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="icon" type="image/x-icon" href="ChickenLeg.jpeg"/>
  <title>Food and Videos</title>
    <link rel="stylesheet" href="HomeStyle.css" />
    <link rel="stylesheet" href="ThreeColumn.css" />
    <link rel="stylesheet" href="SignUp.css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>  
  <link rel="stylesheet" href="Font.css" />
    <meta charset="UTF-8" />
    
  </head>
  <body>
      
    <div id="logo" class="LogoRow" onclick="location.href='index.php'">
      <img
        src="logo.png"
        alt="pic"
      />
    </div>
    <div id="regbuttons" class="RegRow">
      <div id="login" class="reg" onclick="location.href='LogIn.php'">
        <a>LOG IN</a>
      </div>
    </div>

    <div id="col1" class="column"></div>

    <div id="col2" class="column">
      <form action="SignUpHandler.php" method="post" id="SignUpForm">
      <!-- <form id="SignUpForm"> -->
        <label id="username" for="uname">Username:</label><br />
        <input type="text" id="uname" name="fname" 
        <?php
          if (key_exists('olddata', $_SESSION) && $_SESSION['olddata']['username']!=null) {
            echo 'value = ' . $_SESSION['olddata']['username'];
          }
        ?>
        /><br />
        <label id="password" for="pname">Password:</label><br />
        <input type="text" id="pname" name="pname" name="" 
        <?php
          if (key_exists('olddata', $_SESSION) && $_SESSION['olddata']['password']!=null) {
            echo 'value = ' . $_SESSION['olddata']['password'];
          }
        ?>
        /><br />
        <label id="cpassword" for="cname">Confirm Password:</label><br />
        <input type="text" id="cname" name="cname" name="" /><br />
        <label id="email" for="ename">Email:</label><br />
        <input type="text" id="ename" name="ename" name="" 
        <?php
          if (key_exists('olddata', $_SESSION) && $_SESSION['olddata']['email']!=null) {
            echo 'value = ' . $_SESSION['olddata']['email'];
          }
        ?>
        /><br />
        <input type="submit" value="Submit" />
      </form>
      <div class="SignUpError">
      <?php
        if (array_key_exists('SignUpError', $_SESSION)) {
          $m = $_SESSION['SignUpError'];
          echo '<div id="errors">';
          if ($m['username']) {
            echo "<div class='err'>";
            echo "Username needed.";
            echo "</div>";
          }
          if ($m['password']) {
            echo "<div class='err'>";
            echo "Password needed.";
            echo "</div>";
          }
          if ($m['email']) {
            echo "<div class='err'>";
            echo "Email needed.";
            echo "</div>";
          }
          echo "</div>";
        }
        if (array_key_exists('nummissingelements', $_SESSION) && $_SESSION['nummissingelements']!=0) {
          echo "<div class='err'>";
          echo "All fields must be filled.";
          echo "</div>";
        }
        if (array_key_exists('matchingpasswords', $_SESSION) && !$_SESSION['matchingpasswords']) {
          echo "<div class='err'>";
          echo "Passwords don't match.";
          echo "</div>";
        }
        if (array_key_exists('uniqueEmailAndUsername', $_SESSION) && !$_SESSION['uniqueEmailAndUsername']) {
          echo "<div class='err'>";
          echo "Passwords don't match.";
          echo "</div>";
        } 
        if (array_key_exists('InvalidEmail', $_SESSION) && !$_SESSION['InvalidEmail']) {
          echo "<div class='err'>";
          echo "Please specify a valid email address.";
          echo "</div>";
        }
      ?>
      </div>
    </div>
    <div id="col3" class="column"></div>

    <link rel="stylesheet" href="Footer.css" />
    <div id="row4">
      <div class="footer" onclick="location.href='AboutUs.php'">
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
