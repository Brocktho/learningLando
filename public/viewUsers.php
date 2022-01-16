<?php 
    echo file_get_contents(__DIR__ . "/views/header.html");
    require(dirname(__DIR__,1) . "/admin/users.php");
    $dao = new UserDAO;
    $db = $dao->injectDatabase();
    $query = "SELECT * FROM USERS";
    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    echo "<section>";
    if(!empty($results)){
        foreach($results as $result){
            $id = $result["ID"];
            $username = $result['USERNAME'];
            $password = $result['PASSWORD'];
            echo "<div>" . $id . "<br/>" . $username . "<br/>" . $password . "</div>";
        };
    }else{
        echo "<p> Sorry, no results :( </p>";
    }
    echo "</section>";
?>
