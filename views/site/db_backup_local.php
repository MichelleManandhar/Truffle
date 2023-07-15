<?php 
$db_name = Yii::$app->params['db_name'];

backup_tables('localhost','root','',$db_name);

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
            
            //$return.= 'DROP TABLE '.$table.';';
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

    $json_file  = Yii::getAlias("@webroot/assets/json/ip.json");
    $json_array = json_decode(file_get_contents($json_file), true); 
    if($json_array != null){
        foreach ($json_array['login'] as $key => $value) {
            if (isset($_GET['ip']) && $key == $_GET['ip']) {
                unset ($json_array['login'][$key]);
            }
        }
        $fp = fopen($json_file, 'w');
        fwrite($fp, json_encode($json_array));
        fclose($fp);
    }
    
    header('Location: '. Yii::$app->request->baseUrl. '/site/logout'); exit;
}