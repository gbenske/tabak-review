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

function idKunde(PDO $connection)
{
	$Kennung = $_SESSION["userid"];

	$sql= "SELECT ID_Kunde FROM kunden WHERE ID_Kunde = '$Kennung'";
	$result = query($connection, $sql, ["$Kennung" => $Kennung]);
	$ID_Kunde = (string)$result[0]['ID_Kunde'];

	return($ID_Kunde);
}


?>

