<?php
$baseUrl = Yii::$app->request->baseUrl;
$this->title = Yii::$app->params['system'] . ' | Database Sync';
?>

<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'pos';
$sync = 'sync_detail';
$tables = '*';	
$backup_url = "http://pos.klientscape.com/site/backup-online?token=hrow9y42FFMSpxd6hrow9y42FFMSpxd6"; /*pos-online*/
$return = "";

	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	/*get all of the tables*/
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}

	$synced = mysql_fetch_assoc(mysql_query('SELECT * FROM `' . $sync . '` WHERE id = 1'));

	/*cycle through*/
	foreach($tables as $table)
	{
		if ($table != $sync) {
			$max_id = 0;
			
			$result = mysql_query('SELECT * FROM `' . $table . '`');
			
			$num_fields = mysql_num_fields($result); 
			
			/*$return.= 'DROP TABLE '.$table.';';*/
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE `' . $table . '`'));
			$query_insert = "";
			
			for ($i = 0; $i < $num_fields; $i++) {

				while($row = mysql_fetch_row($result)) {

					$return.= 'INSERT INTO `'.$table.'` VALUES(';
					if ($row[0] > $synced[$table]) {
						$query_insert.= 'INSERT INTO `'.$table.'` VALUES(';
					}

					for($j=0; $j < $num_fields; $j++) {

						$row[$j] = addslashes($row[$j]);
						$row[$j] = ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) {
							$return.= '"'.$row[$j].'"' ;  
							if ($row[0] > $synced[$table]) {
								$query_insert.= '"'.$row[$j].'"' ; 
							}
						} 
						else { 
							$return.= '""';
							if ($row[0] > $synced[$table]) {
								$query_insert.= '""'; 
							}
						}

						if ($j < ($num_fields-1)) { 
							$return.= ','; 
							if ($row[0] > $synced[$table]) {
								$query_insert.= ','; 
							}
						}

						if ($j == 0) {
							$max_id = $row[0];
						}
					}

					if ($row[0] > $synced[$table]) {
						$query_insert.= "); ||| \n";
					}
				}
			}

			$max_ids[$table] = $max_id;
			$query_insert.="\n\n\n";

			$query_array_insert[$table] = $query_insert;
		}
	}

	foreach($query_array_insert as $table => $qai) :
		$post_data[$table.'_insert'] = $qai;
	endforeach; 

	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $backup_url);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$result = curl_exec($ch); 
	curl_close($ch);
?>
<div class="page-content container-fluid">
<div class="row" style="margin-top:80px;">
<?php if (strip_tags(trim($result)) == 'true') : ?>

	<?php $sync_detail = false;
	if ($max_ids != null) : 
		$i = 0;
		$fields = '';
		$values = '';
		$query = '';

		$only = array('order', 'order_items');

		/*for update*/
		$sql = 'UPDATE `' . $sync . '` SET ';

		foreach($max_ids as $field => $id): $i++;
			if ($field != $sync) {
				if (in_array($field, $only)) {
					$value = $id;
				}
				else {
					$value = 0;
				}
				/*for update*/
				if ($id > 0) {
					$query .= '`'.$field. '` = "' .$value. '", ' ;
				}
			}
		endforeach;

		/*for update*/
		$sql .= $query .' `last_updated_on` = "' . date('Y-m-d H:i:s') . '" WHERE `id` = 1';

		if (mysql_query($sql)) $sync_detail = true;
	endif;
	?>

	<?php if ($sync_detail) : ?>
		<div class="col-sm-4 col-sm-offset-4">
			<div class="panel">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Success</h3>
			  	</div>
			  	<div class="panel-body">
			  		<p>Your data has successfully been synced.</p>
			  		<p>Klientscape Software.</p>
			  		<h4>Thank You.</h4>
			  	</div>
			  	<div class="panel-footer text-right">
			  		<button type="button" class="btn btn-primary" onclick="history.go(-1);" >Go Back</button>
			    	<a href="<?php echo $baseUrl;?>/order/" class="btn btn-primary">Continue</a>
			  	</div>
			</div>
		</div>
	<?php else: ?>
		<div class="col-sm-4 col-sm-offset-4">
			<div class="panel">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Sorry! (SYNC_DETAIL_FAILED)</h3>
			  	</div>
			  	<div class="panel-body">
			  		<p>Unable to sync some data, please contact our support!</p>
			  		<p>Klientscape Software.</p>
			  		<h4>Thank You.</h4>
			  	</div>
			  	<div class="panel-footer text-right">
			  		<button type="button" class="btn btn-primary" onclick="history.go(-1);" >Go Back</button>
			    	<a href="<?php echo $baseUrl;?>/order/" class="btn btn-primary">Continue</a>
			  	</div>
			</div>
		</div>
	<?php endif; ?>
<?php else: 
$file = 'db_backup_sync_error-'.date('y-m-d-h-i-s').'.txt';
$path = '..'.DIRECTORY_SEPARATOR.'backup_error' . DIRECTORY_SEPARATOR;
$handle = fopen($path . $file ,'w+');
fwrite($handle, strip_tags(trim($result)));
fclose($handle);
?>
<div class="col-sm-4 col-sm-offset-4">
	<div class="panel">
	  	<div class="panel-heading">
	    	<h3 class="panel-title">Sorry! (SYNC_FAILED)</h3>
	  	</div>
	  	<div class="panel-body">
	  		<p>Unable to sync some data, please contact our support!</p>
	  		<p>Klientscape Software.</p>
	  		<h4>Thank You.</h4>
	  	</div>
	  	<div class="panel-footer text-right">
			<button type="button" class="btn btn-primary" onclick="history.go(-1);" >Go Back</button>
	    	<a href="<?php echo $baseUrl;?>/order/" class="btn btn-primary">Continue</a>
	  	</div>
	</div>
</div>
<?php endif; ?>
</div>
</div>