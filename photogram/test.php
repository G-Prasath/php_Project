<pre>
    <?php



   // include 'libs/load.php';
    
    //  $mic1 = new mic();
    //  $mic1->getAvatar('guru', [1,2,3]);

    // $usr1 = new user('guru');
    // $usr1->getAvatar();

    // $mic2 = new mic("Guru");

    // $mic1->brand = "Roda<br>";
    // $mic2->brand = "Hyper<br>";

    // printf($mic1->brand);
    // printf($mic2->brand);

    // $mic1->light = 'RGB<br>';
    // $mic1->setname('White<br>');

    // // $mic1->price = 100;

    // $mic1->setpriceproxy(50);
    // print("Your Price : ".$mic1->getpriceproxy());

    // session_start();

    // setcookie("secondCookie", "password", time() + (86400 * 30), "/");

    // print_r($_SESSION);
    // print_r($_COOKIE);
    
   

    // if(session::isset('a')){
    //     printf("Existe Value: ".session::get('a'));
    // }
    // else{
    //     session::set('a', time());
    //     printf("New Value: ".session::get('a'));

    // }
   
    // if(isset($_GET['dis'])){
    //     session::destroy();
    //     die('<a href="test.php">Login</a>');
    // }

    // if(isset($_GET['dis'])){
    //     session::destroy();
    //     die('<a href="test.php">Login</a>');
    // }
        
        // $user = "babu";
        // $pass = "babu";
        // $result = null;

    //    echo usersession::getdata('ip');

        if(session::get('token')){
            $userdata = session::get('token');
            
            $user1 = new usersession($userdata);
            // print($user1->uid);
            // echo usersession::getIp();
            // $user = new usersession();
            echo $user1->getIp();
            echo $user1->getAgent();
            echo $user1->isValid();

            // print_r($user1->getUser());


            

            print("Welcome Back\t". $user);
        }else{
            print("New login\t");
            $result = usersession::authenticate($user, $pass); 
            if($result){
                echo "Success\t". $user;
                session::set('token', $result);
            }
            else{
                echo "Fail";
            }
        }   


        // print_r($_SERVER['DOCUMENT_ROOT']);
 
        // echo  <<<EOF
        // <a href="test.php?dis">Login</a>
        // EOF;


    ?>
</pre>

