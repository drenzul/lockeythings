<?php
//Database.php

//require_once('config.php');  //Might add config file to pull this in from later

class Database
{
    protected static $connection;
    
    private function dbConnect()
    {
        $databaseName = 'lockeythings';
        $serverName = 'localhost';
        $databaseUser = 'lockey';
        $databasePassword = 'bobisyouruncle';
        $databasePort = '3306';
        
        // Not actual details! Placeholders! Leave my DB alone! :)
        
        self::$connection = mysqli_connect ($serverName, $databaseUser, $databasePassword, 'lockeythings');
        //       mysqli_set_charset('utf-8',self::$connection);
        if (self::$connection)
        {
            if (!mysqli_select_db (self::$connection, $databaseName))
            {
                echo("DB Not Found");
                throw new Exception('DB Not found');
            }
        }
        else
        {
            echo("No DB connection");
            throw new Exception('No DB Connection');
        }
        
        return self::$connection;
    }
    
    public function query($query) {
        // Connect to the database
        $connection = $this -> dbConnect();
        
        // Query the database
        $result = mysqli_query($connection, $query);
        
        return $result;
    }
    
    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        // echo("should have worked");
        return $rows;
    }
    
    
    
    
    
    
}

?>





