<?php
    $db_name = Yii::$app->params['db_name'];
    $domain = Yii::$app->params['domain'];
    if( $return = backup_tables('localhost','root','',$db_name) ) { ?>
    <div class="page-content padding-30 container-fluid printer-page">
        <div class="panel panel-bordered panel-success margin-top-20 margin-left-300 margin-right-300">
            <div class="panel-heading">
              <h3 class="panel-title">Success</h3>
            </div>
            <div class="panel-body">
                Database has been successfully backuped
                <a href="<?php echo $domain ?>backup/<?php echo $return ?>" class="btn btn-primary" download><u>Click Here To Download Backup File...</u></a>
            </div>
        </div>
    </div>
<?php } ?>

<?php
/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{   
    $link = mysql_connect($host,$user,$pass);
    mysql_select_db($name,$link);
    $return = '';
    
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
    
    /*cycle through*/
    foreach($tables as $table)
    {
        $result = mysql_query('SELECT * FROM `'.$table.'`');
        if ($result != null) {
            $num_fields = mysql_num_fields($result);
            
            $return.= "DROP TABLE IF EXISTS ".$table.";";
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE `'.$table.'`'));
            $return.= "\n\n".$row2[1].";\n\n";
            
            for ($i = 0; $i < $num_fields; $i++) 
            {
                while($row = mysql_fetch_row($result))
                {
                    $return.= 'INSERT INTO `'.$table.'` VALUES(';
                    for($j=0; $j < $num_fields; $j++) 
                    {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j < ($num_fields-1)) { $return.= ','; }
                    }
                    $return.= ");\n";
                }
            }
        }
        $return.="\n\n\n";
    }

    /*save file*/
    $file = 'truffle-db-backup-'.date('y-m-d-h-i-s').'.sql';
    $handle = fopen('backup' . DIRECTORY_SEPARATOR . $file ,'w+');
    fwrite($handle,$return);
    fclose($handle);
    
    /* ---- from this code will be deleted while giving the project to client ------ */

    /*if(file_exists(Yii::$app->params['db_backup_real_path'])) {
        copy( 'backup' . DIRECTORY_SEPARATOR . $file, Yii::$app->params['db_backup_real_path'] . DIRECTORY_SEPARATOR . $file );

        if( file_exists( 'backup' . DIRECTORY_SEPARATOR . $file ) ){
            // unlink( 'backup' . DIRECTORY_SEPARATOR . $file ); 

            //create the archive
            $zip        = new ZipArchive();
            $filename   = Yii::$app->params['db_backup_absolute_path'] . 'backupTRUFFLE.zip';
            $source     = Yii::$app->params['db_backup_absolute_path'] . $file;

            if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
                exit("cannot open <$filename>\n");
            }

            // $zip->addFromString("testfilephp2.txt" . time(), "#2 This is a test string added as testfilephp2.txt.\n");
            $zip->addFile($source);
            // $code = $zip->setPassword('secret');
            // echo "numfiles: " . $zip->numFiles . "\n";
            // echo "status:" . $zip->status . "\n" . "<br/>";
            $zip->close();

            unlink( Yii::$app->params['db_backup_real_path'] . DIRECTORY_SEPARATOR . $file ); 
        }
    }*/
    
    /* ---- upto this code will be deleted while giving the project to client ------ */

    /*to store log of database backuped in another table*/
    /*$database_log_db_name = Yii::$app->params['database_log_db_name'];
    $con = mysql_connect("localhost","klientso_truffle","Gw8k_P%l2TAi");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($database_log_db_name, $con);
    $query = "INSERT INTO `database_log` (`created_by`, `type`, `created_at`) VALUES ('".Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->username."',
        'backup', '".date('Y-m-d H:i:s')."');";
    mysql_query($query);
    mysql_close($con);*/
    /*to store log of database backuped in another table*/
    
    return $file;
}