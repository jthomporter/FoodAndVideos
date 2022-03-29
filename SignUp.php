<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="HomeStyle.css" />
    <link rel="stylesheet" href="ThreeColumn.css" />
    <link rel="stylesheet" href="SignUp.css" />
    <meta charset="UTF-8" />
    <title>Title</title>
  </head>
  <body>
      
    <div id="logo" class="LogoRow" onclick="location.href='index.php'">
      <img
        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsweetdrawingblog%2FSweet-Drawing-Blog%2Fwp-content%2Fuploads%2F2015%2F01%2F24225827%2FRounded-Rectangle1.png&f=1&nofb=1"
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
      <form action="SignUpHandler.php" method="post">
        <label id="username" for="uname">Username:</label><br />
        <input type="text" id="uname" name="fname" /><br />
        <label id="password" for="pname">Password:</label><br />
        <input type="text" id="pname" name="pname" name="" /><br />
        <label id="cpassword" for="cname">Confirm Password:</label><br />
        <input type="text" id="cname" name="cname" name="" /><br />
        <label id="email" for="ename">Email:</label><br />
        <input type="text" id="ename" name="ename" name="" /><br />
        <input type="submit" value="Submit" />
      </form>
      <?php
        if (array_key_exists('SignUpError', $_SESSION)) {
          $m = $_SESSION['SignUpError'];
          echo '<div id="errors">';
          if ($m['username']) {
            echo "<div>";
            echo "Username needed.";
            echo "</div>";
          }
          if ($m['password']) {
            echo "<div>";
            echo "Password needed.";
            echo "</div>";
          }
          if ($m['email']) {
            echo "<div>";
            echo "Email needed.";
            echo "</div>";
          }
          echo "</div>";
        }
      ?>
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
  </body>
</html>
