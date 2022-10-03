<?php

//imports for monolog library
require_once(dirname(dirname(__FILE__)) . '/vendor/autoload.php');

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class verifica_credenziali
{
    //posting from the HTML
    private $username;
    private $password;

    //this is for testing (TO BE REPLACED)
    private $db_password = "hulk";
    private $db_username = "pippo";

    function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    function checkCredentials()
    {
        if ($this->username == $this->db_username && $this->password == $this->db_password) {
            return true;
        } else {
            return false;
        }
    }

    function instantiateLogs()
    {
        //monolog variables for log files
        $logger = new Logger('login');
        $logger->pushHandler(new StreamHandler(dirname(__FILE__) . '/html_pubblico.log', Logger::INFO));
        return $logger;
    }

    function writeOnLog($code, $logger)
    {
        //for $code: 2 and 20 are successfull session and login respectively, while 3 and 30 respectively unsuccessfull
        switch ($code) {
            case 2:
                $logger->info("Session started");
                break;
            case 3:
                $logger->error("Session not started");
                break;
            case 20:
                $logger->info("Logged successfully with username " . $this->username);
                break;
            case 30:
                $logger->error("Login unsuccessfull ");
                break;
        }
    }

    function initiateSession()
    {
        $session_duration = 3600;
        ini_set('session.gc_maxlifetime', $session_duration);
        session_set_cookie_params($session_duration);
        session_start();
        $_SESSION['username'] = $this->username;
        $_SESSION['response_code'] = 200;
    }

    function initiateDeniedSession()
    {
        $session_duration = 10;
        ini_set('session.gc_maxlifetime', $session_duration);
        session_set_cookie_params($session_duration);
        session_start();
        $_SESSION['response_code'] = 401; //unauthorized
    }

    function verifySession()
    {
        if (session_status() == PHP_SESSION_ACTIVE) {
            return 2;
        } else {
            return 3;
        }
    }
}

$verifier = new verifica_credenziali($_POST['username'], $_POST['password']);
$logger = $verifier->instantiateLogs();
if ($verifier->checkCredentials()) {
    $verifier->writeOnLog(20, $logger);
    $verifier->initiateSession();
    $verifier->writeOnLog($verifier->verifySession(), $logger);
    header('Location: ../front-end/homepage.php');
} else {
    $verifier->writeOnLog(30, $logger);
    $verifier->initiateDeniedSession();
    header('Location: ../front-end/homepage.php');
}
