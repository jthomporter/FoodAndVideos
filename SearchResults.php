<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="icon" type="image/x-icon" href="ChickenLeg.jpeg"/>
  <title>Food and Videos</title>
    <meta charset="UTF-8" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>  
  <link rel="stylesheet" href="Font.css" />
  </head>
  <body>
    <?php
   session_start();
    ?>
    <link rel="stylesheet" href="Header.css" />
    <div id="logo" class="LogoRow" onclick="location.href='index.php'">
    <img src="logo.png" alt="pic"/>
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

    <link rel="stylesheet" href="ThreeColumn.css" />
    <link rel="stylesheet" href="SearchResults.css" />

    <div id="col1" class="column"></div>

    <div id="col2" class="column">
      <div id="title">Search Results</div>
      <div id="SearchResults">
      <link rel="stylesheet" href="SearchEntry.css" />
      <?php
      include_once("Dao.php");
      $dao = new Dao();
        $r = $dao->querySearchResults($_POST['name']);
        $results = $r;//->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $key=>$value) {

            echo '<a href="'.$value['URL'].'" target="_blank">';
            echo '<div class="res">';
            echo $value['title'] . "\n";
            echo '</div>';
            echo '</a>';
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
   <script src="Results.js"></script>
    </div>
  </body>
</html>
