<?php

// Initialize PDO Object
function initializePDOObject($dbType, $dbHost, $dbName, $dbUser, $dbPassword)
{
    try{
        $connection = new PDO($dbType.':host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPassword);
    } catch(PDOException $e) {
        echo 'ERROR: '.$e->getMessage();
    }

    return $connection;
}

// Query from PDO db
function query(PDO $connection, $sql, $bindings)
{
    $stmt = $connection->prepare($sql);
    $stmt->execute($bindings);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results ? $results : false;
}

function userLogIn(PDO $connection)
{
	$identification = $_SESSION["userid"];

	$sql= "SELECT ID_User FROM user WHERE ID_User = '$identification'";
	$result = query($connection, $sql, ["$identification" => $identification]);
	$ID_User = (string)$result[0]['ID_User'];

	return($ID_User);
}


?>

