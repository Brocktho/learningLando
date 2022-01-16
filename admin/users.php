<?php
    class  UserDAO{
    public function injectDatabase(){
        $dsn = 'mysql:host=database;port=3306;dbname=lamp';
        $databaseUser = 'lamp';
        $databasePass = 'lamp';

        try{
            $db = new PDO($dsn, $databaseUser, $databasePass);
            return $db;
        } catch (PDOException $e) {
            $error_message = 'Database Error: ';
            $error_message .= $e->getMessage();
            echo $error_message;
            exit();
        }
    }
    }
?>
