<?php

class Database {
    protected static $connection;
    
    public function connect() {    
        // Try and connect to the database
        if(!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            $username = 'root';
            $password = '';
            $dbname = 'touber';
            self::$connection = new mysqli('localhost',$username,$password,$dbname);
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
          echo "Connection failed";  
          return false;
        }
        return self::$connection;
        
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $result = $connection -> query($query);

        return $result;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }
    
    public function retrieveCurrentRatingPerUserByName($username){
        $query = "SELECT user_name, user_lastname, rating_value "
                . "FROM rating, user "
                . "WHERE user_name = " . $username 
                . "AND rating.user_id = user.user_id";
                
        $result = mysql_query($query);
        
        if (!$result){
            echo "This person doesn't exist";
        }else{
            return $result;
        }
        
    }
    
    public function setRating($username){
        //todo 
    }
 
}

