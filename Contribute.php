<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="ChickenLeg.jpeg"/>
<title>Food and Videos</title>
  <link rel="stylesheet" href="HomeStyle.css" />
  <link rel="stylesheet" href="Header.css" />
  <link rel="stylesheet" href="Contribute.css" />
  <meta charset="UTF-8" />
  <title>Title</title>
  <link rel="stylesheet" href="Footer.css" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>  
  <link rel="stylesheet" href="Font.css" />
</head>

<body>
  <?php
  session_start();
  //  print_r($_SESSION);
  ?>
  <div id="logo" class="LogoRow" onclick="location.href='index.php'">
      <img src="logo.png" alt="pic"/>
  </div>
  <div id="regbuttons" class="RegRow">
    <div id="login" class="reg" onclick="location.href='LogIn.php'">
      LOG IN
    </div>
    <div id="signup" class="reg" onclick="location.href='SignUp.php'">
      <a>SIGN UP</a>
    </div>
    <!-- <div id="searchbar">
      <input type="text" id="Search" name="Search" value="Enter a food here!" /><br />
    </div> -->
  </div>

  <link rel="stylesheet" href="ThreeColumn.css" />

  <div id="col1" class="column"></div>

  <div id="col2" class="column">
    <form action="ContributeHandler.php" method="POST">
      <label id="food" for="foodname">Food:</label><br />
      <input type="text" id="foodname" name="foodname" <?php
                                                        if (array_key_exists('oldContent', $_SESSION) && $_SESSION['oldContent']['foodname'] != null) {
                                                          echo 'value = "' . $_SESSION['oldContent']['foodname'] . '"';
                                                        }
                                                        ?> /><br />
      <label id="video" for="videoname">Video:</label><br />
      <input type="text" id="videoname" name="videoname" <?php
                                                          if (array_key_exists('oldContent', $_SESSION) && $_SESSION['oldContent']['videoname'] != null) {
                                                            echo 'value = "' . $_SESSION['oldContent']['videoname'] . '"';
                                                          }
                                                          ?> /><br />
      <label id="video" for="videourl">URL:</label><br />
      <input type="text" id="videourl" name="videourl" <?php
                                                        if (array_key_exists('oldContent', $_SESSION) && $_SESSION['oldContent']['videourl'] != null) {
                                                          echo 'value = "' . $_SESSION['oldContent']['videourl'] . '"';
                                                        }
                                                        ?> /><br />
      <label id="RadioText" for="TOSRadio">This food/video pairing is adherent to our terms of service.</label>
      <input type="checkbox" id="TOSRadio" name="fav_language" value="HTML" /><br />
      <input type="submit" name="submit"><br />
    </form>
  </div>
  <div id="col3" class="column>"></div>

  <link rel="stylesheet" href="Footer.css" />

  <div id="row4">
    <div class="footer" onclick="location.href='AboutUs.html'">
      <p>About Us</p>
    </div>
    <div class="footer">
      <p>Social Media</p>
    </div>
    <div class="footer">
      <p>Contact Owner</p>
    </div>
    <div class="footer">
      <p>Terms of Service</p>
    </div>
  </div>
</body>

</html>