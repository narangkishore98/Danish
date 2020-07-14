<?php




class DBManager
{
    private static $servername = "localhost" ;
    private static $username = "root";
    private static $password = "";
    private static $connection;

    public static function connect()
    {
        try {

            self::$connection= new PDO("mysql:host=".self::$servername.";dbname=danish_cms_db", self::$username, self::$password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //echo("Connection Successful");
        }
        catch (PDOException $e)
        {
            echo("<h1>Connection Failed.</h1><br/>"+$e->getMessage());
        }
    }

    public static function close()
    {
        self::$connection.self::close();
    }

    public static function getConnection()
    {
        if(self::$connection != null)
        {
            return self::$connection;
        }
        else
        {
            self::connect();
            return  self::$connection;
        }
    }
}


?>