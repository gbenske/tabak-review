<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/web/assets/php/bootstrap.php';
 
// Attempt search query execution
if(isset($_REQUEST["term"])){
	// create prepared statement
	$sql = "SELECT t.name AS tobacco, t.id AS tobaccoId, m.name AS manufacturer, r.count AS `count`, r.note AS note, f.name AS flavor
	FROM tobacco t
	INNER JOIN tobacco_to_flavor tf ON tf.id_tobacco = t.id
	INNER JOIN manufacturer m ON m.id = t.id_manufacturer
	INNER JOIN rating r ON r.id_tobacco = t.id
    INNER JOIN flavor f ON f.id = tf.id_flavor
	WHERE t.name LIKE :term OR m.name LIKE :term OR f.name LIKE :term";
	$stmts = $pdo->prepare($sql);
	$term = $_REQUEST["term"] . '%';
	// bind parameters to statement
	$stmts->bindParam(":term", $term);
	// execute the prepared statement
	$stmts->execute();
?>
<?php if($stmts->rowCount() > 0) { ?>
	<div id="grid" class="col-60">
        <div id="row" class="row flex">
            <?php foreach ($stmts as $stmt) { 
                $sql = "SELECT f.name AS flavor
                        FROM tobacco_to_flavor tf
                        INNER JOIN flavor f ON f.id = tf.id_flavor
                        WHERE tf.id_tobacco = ".$stmt['tobaccoId'];

                $statement = $pdo->query($sql);
                $flavors = $statement->fetchALL(PDO::FETCH_ASSOC);

                $result = array_map(function($value) {
                    return $value['flavor'];
                }, $flavors);
                ?>
                <div class="col col-15" data-name="<?php echo $stmt['manufacturer'] ?>" data-rating="<?php echo $stmt['count'] ?>">
                    <div class="products">
                        <div class="img-holder">
                            <img src="/web/assets/img/content/start/holster-tobacco.png" alt="" />
                        </div>
                        
                        <div class="listEntry">
                            <div class="products-flipper">
                                <div class="side front">
                                    <div class="headline">
                                        <h2><?php echo $stmt['manufacturer'] ?></h2>
                                    </div>
                                    <div class="tobacco"><?php echo $stmt['tobacco'] ?></div>
                                    <div class="flavor"><?php echo implode(', ', $result) ?></div>
                                    <div class="btn-wrapper">
                                        <div class="btn rating">
                                            <span>Bewertung</span>
                                        </div>
                                        <div class="btn note">
                                            <span>Bemerkung</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="side back-rating">
                                    <h2>Bewertung</h2>
                                    <div class="rating"><?php echo $stmt['count'] ?></div>
                                </div>

                                <div class="side back-note">
                                    <div class="content">
                                        <h2>Notiz</h2>
                                        <p class="note"><?php echo $stmt['note'] ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
	</div>
    <?php } ?>
<?php 
	}
	
	// Close statement
	unset($stmts);
	
	// Close connection
	unset($pdo);
?>