<?php
session_start();
?>
<html>

<head>
<title>Food and Videos</title>
<link rel="icon" type="image/x-icon" href="ChickenLeg.jpeg"/>
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/> -->
  <link rel="stylesheet" href="HomeStyle.css" />
  <link rel="stylesheet" href="Header.css" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>  
  <link rel="stylesheet" href="Font.css" />
  
</head>

<body>

<script type="text/javascript" src="index.js"></script>
  <?php
  $_SESSION['test'] = 'test';

  if (array_key_exists('SignedIn', $_SESSION) && !$_SESSION['SignedIn']) {
    $_SESSION = array();
  }
  ?>
  <div id="logo" class="LogoRow" onclick="location.href='index.php'">
   
  <img
        src="logo.png"
        alt="pic"
      />  
</div>

  <?php
  if (!array_key_exists('SignedIn', $_SESSION) || !$_SESSION["SignedIn"]) {
    echo '<div id="regbuttons" class="RegRow">';
    echo '<div id="login" class="reg" onclick="location.href=' . "'LogIn.php'" . '">';
    echo   '<a>LOG IN</a>';
    echo '</div>';
    echo '<div id="signup" class="reg" onclick="location.href=' . "'SignUp.php'" . '">';
    echo '<a>SIGN UP</a>';
    echo  '</div>';
    echo '</div>';
  } else {
    echo '<div id="regbuttons" class="RegRow">';
    echo  '<div id="login" class="reg" onclick="location.href=' . "'SignOutHandler.php'" . '">';
    echo   '<a>SIGN OUT</a>';
    echo '</div>';
    echo '<div id="signup" class="reg" onclick="fadeInContribute()" >';
    echo '<a>' . $_SESSION['username'] . '</a>';
    echo  '</div>';
    echo '</div>';
  }
  ?>
  <div class="row3">
    <div class="column">
      <div id="FriendTitle" class="title">Foods With The Most Videos!</div>
      <div id="FriendBody" class="body">
        <link rel="stylesheet" href="SearchEntry.css" />
        <?php
        include_once("Dao.php");
        $dao = new Dao();
        $_SESSION['dao'] = $dao;
        $r = $dao->queryFoodsWMostVideos();
        $results = $r->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $key => $value) {
          echo '<form method="POST" action="SearchResults.php">';
          echo '<input type="hidden" name="name" value="' . $value['name'] . '"/>';
          echo '<div class="res" onclick="this.parentNode.submit();">';
          echo $value['name'] . " " . $value['amount'];
          echo '</div>';
          echo '</form>';
        }
        ?>
      </div>
    </div>

    <div id="SearchColumn" class="column">
      <div id="SearchTitle" class="title">What's for dinner tonight?</div>
      <div id="SearchBody" class="body">
        <label id="FoodTitle" for="fname">Enter your food here!</label><br />
        <form action="SearchResults.php" method="post">
          <input type="text" id="fname" name="name" />
          <input type="submit" name="submit" value="Search">
        </form>

        <?php
        
           if (array_key_exists('SignedIn', $_SESSION) && $_SESSION['SignedIn'] == true) {     
        echo '<div id="contribute">';
        echo  'Have a food and video pair that you think will go well together?';
        echo '<form action="Contribute.php"  >';
        echo '<button type="button"  onclick="location.href=' . "'" . 'Contribute.php' . "'" . '">';
        echo    'Contribute';
        echo  '</button>';
        echo '</form>';
        echo '</div>';
         }
        ?>


      </div>

      <!--        <div id="SearchTitle" class="title">-->
      <!--            Have a video that goes well with a food?-->
      <!--        </div>-->
    </div>

    <div class="column">
      <div id="PopularTitle" class="title">Videos With the Most Foods</div>
      <div id="PopularBody" class="body">
        <link rel="stylesheet" href="SearchEntry.css" />
        <?php
        include_once("Dao.php");
        $dao = $_SESSION['dao'];
        $r = $dao->queryVideosWMostFoods();
        $results = $r->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $key => $value) {

          echo '<a href="' . $value['URL'] . '" target="_blank">';
          echo '<div class="res">';
          echo $value['title'] . " " . $value['amount'];
          echo '</div>';
          echo '</a>';
        }
        ?>
      </div>
    </div>
  </div>

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
   <script src="Results.js"></script>
      
</body>

</html>