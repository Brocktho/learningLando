<?php 
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
?>
<?php echo file_get_contents(__DIR__ . "/views/header.html"); ?>
<?php if(!$username){
        echo file_get_contents(__DIR__ . "/views/register.html"); 
    } else{
        $upOne = dirname(__DIR__, 1);
        require($upOne . "/admin/users.php");
        $query = "SELECT ID FROM USERS";
        $statement = $db->prepare($query);
        $result = $statement->execute();
        $statement->closeCursor();
        if(empty($result)){
            $query = "CREATE TABLE USERS (
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
        if($username){
            $query = "INSERT INTO USERS
                            (USERNAME, PASSWORD, EMAIL, PERMISSION)
                        VALUES
                            (:username, :password, :username, 1)";
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $statement->closeCursor();
        }
        echo file_get_contents(__DIR__ . "/views/registered.html");
    }
    ?>
<?php echo file_get_contents(__DIR__ . "/views/footer.html"); ?>