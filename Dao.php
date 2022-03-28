
<?php
class Dao {
    private $password = 'AllanTuringHasTheBigGay69!';
    private $user = 'root';
    private $dsn = "mysql:host=localhost;dbname=website";
   // protected $logger;

    // public function __construct () {
       
    // }

    public function connectDB() {
       
 
        try {
           // dl("php_pdo_mysql.dll");
            $connection = new PDO($this->dsn, $this->user, $this->password);
       
            echo "it worked";
            return $connection;
        } catch (PDOException $e) {
            $error = 'Connection failed: ' . $e->getMessage();

            echo  $error;
        }
    
    }

    public function InsertIntoUsers($username, $password, $email) {
        $con = $this->connectDB();
        
        $sql = 'INSERT INTO users (username, password, email)  VALUES ("' . $username . '", "' . $password . '", "' . $email . '")' ;
        echo $sql;
            if ($con->query($sql) === TRUE) {
                echo "new entry created";
                return;
            } else {
                echo "error with registering user.";
            }

    }




}



