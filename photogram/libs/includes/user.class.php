 <?php

    class user{

        public $conn;

        public function __call($name, $arguments)
        {
            $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
            $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
           
            if (substr($name, 0, 3) == "get") {
                return $this->_get_data($property);
            } elseif (substr($name, 0, 3) == "set") {
                // echo $property;
                // echo $arguments[0];
                return $this->_set_data($property, $arguments[0]);
            } else {
                throw new Exception("user::__call() -> $name, function unavailable.");
            }
        }
    
        
    public static function signup($user,$phone,$email,$pass)
    {
    // $pass = md5($pass); Security Through Obsecurity
    $options = ['cost' => 8];

    $pass = password_hash($pass, PASSWORD_BCRYPT, $options);
    $conn = database::getconnection();  
    $sql = "INSERT INTO `auth` (`username`, `phone`, `email`, `password`, `active`, `block`) VALUES ('$user', '$phone', '$email', '$pass', '1', '0')";
    $result = $conn->query($sql);
    $error = FALSE;
    
    if ( $result ===TRUE) {
        $error = FALSE;
    } else {
        $error = $conn->error;
    }
    return $error;
    }

/*password_verify($pass, $row['password'])*/ 
    public static function login($user, $pass){    
         
        $conn = database::getconnection();
        $query = "SELECT * FROM `auth` WHERE `username` = '$user'";
        $result = $conn->query($query);

        if($result->num_rows > 0){

            $row = $result->fetch_assoc();

            if($pass == $row['password']){
                return $row['username'];   
            }
            else{
                return false;
            }
        }else{
            return FALSE;
        }

    }



    public function __construct($username)
    {
        if(!$this->conn){
            $this->conn = database::getconnection();
        }
        // $this->username = $username;
        $this->id = null;
        $sql = "SELECT * FROM `auth` WHERE `username` = '$username' OR `id` = '$username'";    
        $result =  $this->conn->query($sql);
        if($result->num_rows){
            $row = $result->fetch_assoc();
            $this->id = $row['id']; 
        }else {
            throw new Exception("Username does't exist");
        }    
    }

    public function _get_data($var){
        if(!$this->conn){
            $this->conn = database::getconnection();
        }
        $sql = "SELECT `$var` FROM `user` WHERE `id` = $this->id";
        $result = $this->conn->query($sql);
        if($result->num_rows){
            return $result->fetch_assoc()["$var"];
        }
        else return null;
    }


    public function _set_data($var, $data){

        if(!$this->conn){
            $this->conn = database::getconnection();
        }
        $sql = "UPDATE `user` SET `$var` = '$data' WHERE `id` = $this->id";
        if($this->conn->query($sql)){
            return true;
        }else return false;


    }

    public static function setDob($year, $month, $day)
    {
        if(checkdate($month, $day, $year)){
            return $this->setData('dob', "$year,$month,$day");
        }else return false;
    }

    // public function authenticate()
    // {
        
    // }
    // public function setBio($bio)
    // {
    //     return $this->setData('bio', $bio);
    // }
    // public function getBio()
    // {
    //     return $this->getData('bio');
    // }
    // public function setAvatar($link)
    // {
    //     return $this->setData('avatar', $link);
    // }
    // public function getAvatar()
    // {
    //     return $this->getData('avatar');        
    // }


    }
?> 