<?php
    class  UserDAO{
        public $db;
    public function injectDatabase(){
        $dsn = 'mysql:host=database;port=3306;dbname=lamp';
        $username = 'lamp';
        $password = 'lamp';
        try{
            $db = new PDO($dsn, $username, $password);
            return $db;
        } catch (PDOException $e) {
            $error_message = 'Database Error: ';
            $error_message .= $e->getMessage();
            echo $error_message;
            exit();
        }
    }

    public function confirmTable(){
        $db = self.injectDatabase();
        $query = "SELECT ID FROM USERS";
        $statement = $db->prepare($query);
        $result = $statement->execute();
        $statement->closeCursor();
        if(empty($result)){
            $query = "CREATE TABLE USERS(
                ID int(11) AUTO_INCREMENT,
                USERNAME varchar(255) NOT NULL,
                PASSWORD varchar(255) NOT NULL,
                EMAIL varchar(255) NOT NULL,
                PERMISSION int,
                PRIMARY KEY (ID)
                )";
            $statement = $db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
        }
    }

    public function registerUser($username, $password, $email, $permission) {
        confirmTable();
        $db = injectDatabase();
        $query = "INSERT INTO USERS 
                 (USERNAME, PASSWORD, EMAIL, PERMISSION)
                 VALUES
                 (:username, :password, :email, :permission)";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':permission', $permission);
        $result = $statement->execute();
        $statement->closeCursor();
        return $result;
    }

    public function viewUsers(){
        $db = injectDatabase();
        $query = "SELECT * FROM USERS";
        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    }

    }
?>
