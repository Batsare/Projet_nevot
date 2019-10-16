<?php


use Core\Config;
use Core\Database\MysqlDatabase;

class App{

    private static $_instance;
    private $db_instance;
    private $data = array();
    private $user;
    private $password;


    public function __set($name, $value)
    {

        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Propriété non-définie via __get() : ' . $name .
            ' dans ' . $trace[0]['file'] .
            ' à la ligne ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }


    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getTable($name){
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDB())  ;
    }

    public function getDB(){
        $config = Config::getInstance(ROOT. '/config/config.php');
        $app = new App();
        if(is_null($this->db_instance)){

            $this->db_instance = new MysqlDatabase($config->get('db_name'), $_SESSION['user'], $_SESSION['password'], $config->get('db_host'));
        }
        return $this->db_instance;
    }

    public static function load(){
        session_start();
        require ROOT .'/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
}