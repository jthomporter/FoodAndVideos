<?php
session_start();
?>
<html>

<head>
  <link rel="stylesheet" href="HomeStyle.css" />
  <link rel="stylesheet" href="Header.css" />
</head>

<body>
  <?php
  $_SESSION['test'] = 'test';
  echo $_SESSION['test'];
  if (array_key_exists('SignedIn', $_SESSION) && !$_SESSION['SignedIn']) {
    $_SESSION = array();
  }
  ?>
  <div id="logo" class="LogoRow" onclick="location.href='index.php'">
    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fs3-us-west-2.amazonaws.com%2Fsweetdrawingblog%2FSweet-Drawing-Blog%2Fwp-content%2Fuploads%2F2015%2F01%2F24225827%2FRounded-Rectangle1.png&f=1&nofb=1" alt="pic" />
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
    echo '<div id="signup" class="reg" ">';
    echo '<a>'.$_SESSION['username'].'</a>';
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
          echo '<input type="hidden" name="name" value="'.$value['name'].'"/>';
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
          <input type="submit" name="submit">
        </form>
        <div id="contribute">
          Have a food and video pair that you think will go well together?
        </div>
        <form action="Contribute.php">
          <button type="button" onclick="location.href='Contribute.php'">
            Contribute
          </button>
        </form>
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
          
          echo '<a href="'.$value['URL'].'" target="_blank">';
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
</body>

</html>