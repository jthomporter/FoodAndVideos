<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="HomeStyle.css" />
    <link rel="stylesheet" href="Header.css" />
    <link rel="stylesheet" href="Contribute.css" />
    <meta charset="UTF-8" />
    <title>Title</title>
    <link rel="stylesheet" href="Footer.css" />
  </head>
  <body>
    <?php
      session_start();
    //  print_r($_SESSION);
    ?>
    <div id="logo" class="LogoRow" onclick="location.href='home.html'">
      <img
        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsweetdrawingblog%2FSweet-Drawing-Blog%2Fwp-content%2Fuploads%2F2015%2F01%2F24225827%2FRounded-Rectangle1.png&f=1&nofb=1"
        alt="pic"
      />
    </div>
    <div id="regbuttons" class="RegRow">
      <div id="login" class="reg" onclick="location.href='LogIn.html'">
        LOG IN
      </div>
      <div id="signup" class="reg" onclick="location.href='SignUp.html'">
        <a>SIGN UP</a>
      </div>
      <div id="searchbar">
        <input
          type="text"
          id="Search"
          name="Search"
          value="Enter a food here!"
        /><br />
      </div>
    </div>

    <link rel="stylesheet" href="ThreeColumn.css" />

    <div id="col1" class="column"></div>

    <div id="col2" class="column">
      <form action="ContributeHandler.php" method="POST">
      <label id="food" for="foodname">Food:</label><br />
      <input type="text" id="foodname" name="foodname" /><br />
      <label id="video" for="videoname">Video:</label><br />
      <input type="text" id="videoname" name="videoname" name="" /><br />
      <label id="video" for="videourl">URL:</label><br />
      <input type="text" id="videourl" name="videourl" /><br />
      <label id="RadioText" for="TOSRadio"
        >This food/video pairing is adherent to our terms of service.</label
      >
      <input
        type="checkbox"
        id="TOSRadio"
        name="fav_language"
        value="HTML"
      /><br />
      <input type="submit" name="submit"><br/>
      </form>
    </div>
    <div id="col3" class="column>"></div>

    <link rel="stylesheet" href="Footer.css" />

    <div id="row4">
      <div class="footer" onclick="location.href='AboutUs.html'">
        <p>About Us</p>
      </div>
      <div class="footer"><p>Social Media</p></div>
      <div class="footer"><p>Contact Owner</p></div>
      <div class="footer"><p>Terms of Service</p></div>
    </div>
  </body>
</html>
