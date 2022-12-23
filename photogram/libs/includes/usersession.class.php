<?php

class usersession
{
    public $conn;
   
    public static function authenticate($user, $pass)
    {
        $username = user::login($user, $pass);
        $userid = new user($username);
     
        if($username){
            $conn = database::getconnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0, 99999).$ip.$agent.time());

            $sql = "INSERT INTO `session` (`uid`, `token`, `login-time`, `ip`, `user-agent`, `active`)
            VALUES ('$userid->id', '$token' , now(), '$ip' , '$agent', '1')";

            if($conn->query($sql)){
                session::set('session_token', $token);
                return $token;
            }
            else {
                return false;
            }
        }else{
            return false;
        }
    }


    public function __construct($token)
    {
        $this->conn = database::getconnection();
        $this->uid = null;
        $sql = "SELECT * FROM `session` WHERE `token` = '$token' LIMIT 1";
        $result =  $this->conn->query($sql);
        if($result->num_rows){
            $row = $result->fetch_assoc();
            $this->uid = $row['uid'];
            
        }else {
            throw new Exception("Session is Invalid...");
        }    
    }

    public function getData($var){
        $this->conn = database::getconnection();
        $sql = "SELECT `$var` FROM `session` WHERE `uid` = $this->uid";
        $result = $this->conn->query($sql);
        if($result->num_rows){
            $row = $result->fetch_assoc();
            return "$var : ".$row["$var"]."\n\n";
        }
        else return null;
    }


    public function getUser()
    {
        return new user($this->uid);
    }
    public function getIp()
    {
        return $this->getData("ip");
    }
    public function getAgent()
    {
        return $this->getData("user-agent");
    }
    public function isValid()
    {
        $time =  $this->getData("login-time");
        // return $time;
        // $date = time('Y-m-d',strftime($time));
        // echo strftime(" in Finnish is %A,");       
        return $date;
    }
    public function deactive()
    {
        
    }
}

?>