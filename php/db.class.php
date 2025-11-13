php
<?php
date_default_timezone_set('Europe/London');

class db extends mysqli {
    protected static $instance;    
    private function __construct() {       
        mysqli_report(MYSQLI_REPORT_OFF);

        // load credentials from environment variables
        $host   = getenv('DB_HOST');
        $user   = getenv('DB_USER');
        $pass   = getenv('DB_PASS');
        $schema = getenv('DB_NAME');
        $port   = getenv('DB_PORT') ?: 3306;
        $sock   = false;

        // connect to database
        @parent::__construct($host, $user, $pass, $schema, $port, $sock);

        // check if a connection established
        if (mysqli_connect_errno()) {
            throw new Exception(mysqli_connect_error(), mysqli_connect_errno()); 
        }
    }

    // return instance of db
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self(); 
        }
        return self::$instance;
    }   
}
?>