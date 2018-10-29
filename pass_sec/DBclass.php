<?php
include 'pass_sec.php';
class DB
{
    /*
    private $servername = "xray";
    private $username = "root";
    private $password = "";
    private $dbname = "user_info";
    */
    private $servername = "crypticc_game_profiles";
    private $username = "crypticc_games";
    private $password = "]w^O&w}Ag}U*N*!W";
    private $dbname = "4711_AS1";
    private $conn;

    // Fundamentals
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
        return $result;
    }
    private function retrieve($sql){
        $result = inquiry($sql);
        if($result = $this->conn->query($sql)){
            //$data_array = new Array();
            while($row = $result->fetch_assoc())
                $data_array[] = $row;
            $result->close();
            return $data_array;
        }
        $result->close();
    }
    
    //Application-specific tools
    public function InsertAccess($username, $pass, $email){
        $sql ="INSERT INTO Users(username, pass, email)
            VALUES (\"" . hex_en($username) . "\", \"" .
                    //hex_en($firstname) . "\", \"" . hex_en($lastname) . "\", \"" .
                    //hex_en(
                    pass_sec($pass, 0)
                    //) not needed for now because md5 always returns hexadecimal and also sucks
                    . "\", \"" .
                hex_en($email) . "\")";
            inquiry($sql);
    }
    public function LoginCheck($username, $pass){
        $sql = "SELECT pass FROM Users WHERE username LIKE \"$username\"";

        $data_array = $this->retrieve($sql);
        if(
                sizeof($data_array)
                    !==1
                || $data_array[0]['pass']
                    !== hex_en( pass_sec($pass) )
        )
            return false;
        else
            return true;
    }
    public function AddScore($username, $score){
        $sql = "INSERT INTO Scores(username, score) VALUES (\""
                . hex_en($username)
                . "\", \"" . $score
                . "\")";
        inquiry($sql);
    }

    ////
    //// Working stuff ends here
    ////

    private function Insert($table, $data) {
        $sql = "INSERT INTO $table VALUES(";
        while(current($data)!==FALSE) {
          $sql.="\"".hex_en(current($data))."\"";
          if(next($data)!==FALSE)
            $sql.=", ";
        }
        $sql.=");";
        inquiry($sql);
    }

    private function Select($targets, $from, $where = "1"){
//idk
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
