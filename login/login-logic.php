<div class='inner-body'>
    <h2>Login</h2>

    <?php
    include_once 'methods.php';
    include 'setLocalDBTables.php';

    // echo  isset($_SESSION['loginError']) ? 'yes' : 'no';
    if (isset($_SESSION['loginError'])) { 
        echo $_SESSION['loginError'];
    }

    $e = avoidSQLInjection(filter_input(INPUT_POST, 'email'));
    $p = avoidSQLInjection(filter_input(INPUT_POST, 'pwd'));
    checkIfValidUser($e, $p);

    function checkIfValidUser($email, $pwd) //move to another class //need as methods?
    {
        //session
        getDBTable('user', 'Email, Password', "user WHERE Email = '$email'"); //get other cols in later query?

        if (!empty($_SESSION['user'])) {
            $user =  $_SESSION['user'][0];

            if (isset($user)) {
                if ($user['Password'] === $pwd) {
                    //to cookie...
                    setcookie("userInfo", $user['Email'], time() + (60 * 60 * 3)); // hour (60sec*60) * 3 //another var with all user data?
                    $_SESSION['loggedIn'] = TRUE;
                    refreshPage();
                } else {
                    $_SESSION['loginError'] = "<h3 class='error'>The email and password do not match. Please try again.</h3>";
                }
            }
        }

        /* todo: implement adding new users to db */
        /*    else {

      echo "Adding user to The Inside Story community...";
      $users[$email] = $pwd;
      $_SESSION['users'] = $users; //necc?
      } */
    }
