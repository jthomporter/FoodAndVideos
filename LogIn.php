<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="HomeStyle.css" />
  <link rel="stylesheet" href="ThreeColumn.css" />
  <link rel="stylesheet" href="LogIn.css" />
  <meta charset="UTF-8" />
  <title>Title</title>
</head>

<body>
  <div id="logo" class="LogoRow" onclick="location.href='home.html'">
    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsweetdrawingblog%2FSweet-Drawing-Blog%2Fwp-content%2Fuploads%2F2015%2F01%2F24225827%2FRounded-Rectangle1.png&f=1&nofb=1" alt="pic" />
  </div>
  <div id="regbuttons" class="RegRow">
    <div id="login" class="reg" onclick="location.href='SignUp.php'">
      <a>Sign Up!</a>
    </div>
  </div>

  <div id="col1" class="column"></div>

  <div id="col2LogIn" class="column">


    <form action="LogInHandler.php" method="POST">
      <label id="username" for="uname">Username:</label><br />
      <input type="text" id="uname" name="fname"><br />
      <label id="password" for="pname">Password:</label><br />
      <input type="text" id="pname" name="pname" name=""><br />
      <input type="submit" name="submit">
    </form>
    <form ation="Contribute.php">

    </form>
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
</body>

</html>