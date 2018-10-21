<?php
include 'disinject.php';
class DB
{
    /*
    private $servername = "xray";
    private $username = "root";
    private $password = "";
    private $dbname = "user_info";
    */
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "2910test";
    private $conn;

    // Connect to DB
    public function connect()
    {
        $this->conn = new mysqli(
            $this->servername, $this->username, 
            $this->password, $this->dbname);
        return;
        if(mysqli_connect_errno($connect)) {
            echo 'Failed to connect';
        }
    }
    public function disconnect(){
        $this->conn->close();
    }
    private function inquiry($sql){
        $statement = $this->conn->prepare($sql);
        $result = $statement->execute();
        if ($result == true){
            echo "Record added!w </br>";
        }
    }
    private function retrieve($sql){
        if($result = $this->conn->query($sql)){
            //$data_array = new Array();
            while($row = $result->fetch_assoc())
                $data_array[] = $row;
            $result->close();
            return $data_array;
        }
        $result->close();
    }
    // Insert to DB
    // Att: make sure table students is already created
    public function InsertAccess($username, $firstname, $lastname, $pass, $email){
        $sql =" INSERT INTO Access(username, firstname, lastname, pass, email)
            VALUES (\"" . disinject($username) . "\", \"" . disinject($firstname) .
                "\", \"" . disinject($lastname) . "\", \"" . disinject($pass) . "\", \"" .
                disinject($email) . "\")";
            inquiry($sql);
    }

    private function Insert($table, $data) {
        $sql = "INSERT INTO $table VALUES(";
        while(current($data)!==FALSE) {
          $sql.="\"".disinject(current($data))."\"";
          if(next($data)!==FALSE)
            $sql.=", ";
        }
        $sql.=");";
        inquiry($sql);
    }

    private function Select($targets, $from, $where = "1"){
//idk
    }

    public function LoginCheck($username, $pass){
        $sql = "SELECT pass FROM Access WHERE username LIKE \"$username\"";
        $data_array = $this->retrieve($sql);
        if(sizeof($data_array)!==1 || $data_array[0]['pass']!==$pass)
            return false;
        else
            return true;
    }
    
    // Read from DB
    public function ListFoods()
    {
        $sql = "SELECT * FROM Recipe";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "First name: " . $row["firstname"]."<br>";
            }
        } else {
            echo "0 results";
        }
    }
    public function diConnect()
    {
        $this->conn->close();
    }
}
/*
$obj = new DB();
$obj->connect();
// $obj->insert("Elon", "Musk", "e@e.com", "elonmusk", "tesla");
// $obj->insert("John", "Musk", "j@j.com", "604-444-4444", 49);
// I can easily add more names here!
$obj->ListNames();
*/
?>
