
<?php
class Dao
{

    private $password = 'c121649e';
    private $user = 'b69564d33100b5';
   // private $dsn = "mysql:host=us-cdbr-east-05.cleardb.net;dbname=website";
    private $host = 'us-cdbr-east-05.cleardb.net';
    private $dbname = 'heroku_e5d2fb99a100aed';

    // protected $logger;

    // public function __construct () {

    // }

    public function connectDB()
    {


        try {
            // dl("php_pdo_mysql.dll");
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user,
            $this->password);
                
            //   echo "connected to db \n";
            return $connection;
        } catch (PDOException $e) {
            $error = 'Connection failed: ' . $e->getMessage();
            echo "something went wrong\n";
            echo  $error;
        }
    }

    public function InsertIntoUsers($username, $password, $email)
    {
        $con = $this->connectDB();

        $sql = 'INSERT INTO users (username, password, email)  VALUES ("' . $username . '", "' . $password . '", "' . $email . '")';
        echo $sql;
        try {
            $password = $password . "ShiaKazing";
            $encryptedPassword = hash('sha256', $password);
            $stmt = $con->prepare('INSERT INTO users (username, password, email)  VALUES ("' . $username . '", "' . $encryptedPassword . '", "' . $email . '")');
            $stmt->execute();
            $_SESSION['SignedIn'] = true;
            return;
        } catch (PDOException $e) {

            echo "error with registering user.";
        }
    }

    public function InsertIntoFoodVideoPair($food, $video, $url)
    {
       //session_start();
        $food = strtolower($food);
        $con = $this->connectDB();


        $sqlFood = 'INSERT INTO food (name) VALUES ("' . $food . '")';
        $sqlVideo = 'INSERT INTO videos (title, URL) VALUES ("' . $video . '", "' . $url . '")';
        $sqlPair = 'INSERT food_video_user (name, URL) VALUES ("' . $food . '", "' . $url . '")';

        try {
            $con = $this->connectDB();
            echo "food\n";
            echo $sqlFood . "\n";
            echo $sqlVideo . "\n";
            echo $sqlPair . "\n";

            try {
                $stmt = $con->prepare('INSERT INTO food (name) VALUES ("' . $food . '")');
                $stmt->execute();
            } catch (PDOException $e) {
                $error = 'Connection failed: ' . $e->getMessage();
                echo
                $error;
            }



            try {
                $stmt = $con->prepare('INSERT INTO videos (title, URL) VALUES ("' . $video . '", "' . $url . '")');
                $stmt->execute();
            } catch (PDOException $e) {
                $error = 'Connection failed: ' . $e->getMessage();
                echo  $error;
            }

            try {
                $stmt = $con->prepare('INSERT food_video_user (name, URL) VALUES ("' . $food . '", "' . $url . '")');
                $stmt->execute();
            } catch (PDOException $e) {
                $error = 'Connection failed: ' . $e->getMessage();
                echo  $error;
            }

            // echo $sqlFood . '\n';
            // $stmt->execute();
            // $stmt = $con->prepare($sqlVideo);
            // echo $sqlVideo . '\n';
            // $stmt->execute();
            // $stmt = $con->prepare($sqlPair);
            // echo $sqlPair . '\n';
            // $stmt->execute();
            return;
        } catch (PDOException $e) {
            $error = 'Connection failed: ' . $e->getMessage();
            echo  $error;
        }
    }


    public function logIn($username, $password)
    {
       // session_start();
        $con = $this->connectDB();
        $password = $password . "ShiaKazing";
        $encryptedPassword =  $encryptedPassword = hash('sha256', $password);

        $sql = 'SELECT * FROM users WHERE username = "' . $username . '" AND password = "' . $encryptedPassword . '"';
        $stmt = $con->prepare($sql);
        try {
          //  $r = $con->query($stmt);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "size";
            sizeof($results);
            if (sizeof($results)== 1) {
                
                $_SESSION['SignedIn'] = true;
                return true;
            } else {
                echo "error";
            }
        } catch (PDOException $e) {
            echo "sql exceptions";
        }
    }




    public function querySearchResults($foodName)
    {
        //session_start();
        $con = $this->connectDB();
        $sql = 'SELECT videos.title, food_video_user.URL FROM food_video_user LEFT JOIN videos ON videos.URL = food_video_user.URL WHERE name = "' . $foodName . '"';
        $stmt = $con->prepare($sql);

        try {
          //  $results = $con->query($sql);
          $stmt->execute();
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
        }
    }

    public function queryFoodsWMostVideos()
    {
        //session_start();
        $con = $this->connectDB();
        $sql = 'SELECT name, count(URL) AS amount FROM food_video_user GROUP BY name ORDER BY amount DESC;';
        //$con->prepare($sql);

        try {
            $results = $con->query($sql);
            return $results;
        } catch (PDOException $e) {
        }
    }


    public function queryVideosWMostFoods()
    {
        //session_start();
        $con = $this->connectDB();
        $sql = 'SELECT videos.title, count(name) AS amount, food_video_user.URL FROM food_video_user LEFT JOIN videos ON videos.URL = food_video_user.URL GROUP BY title ORDER BY amount desc';
        $con->prepare($sql);

        try {
            $results = $con->query($sql);
            return $results;
        } catch (PDOException $e) {
            echo $sql;
        }
    }
    
}
