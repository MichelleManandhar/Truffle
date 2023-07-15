<?php

/**
 * Description of Misc
 *
 * @author gaurav maharjan
 */

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

use yii\helpers\Json;

class Misc extends Component 
{

    public static function shuffle($length)
    {
        return substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM0987654321'), 0, $length);
    }

    public static function garbage($length)
    {
        return substr(str_shuffle('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM_(){}[]!*@#$%&-^'), rand(0,5), $length);
    }

    public static function clean($string) 
    {
        $string = trim(preg_replace('/[^A-Za-z0-9\- ]/', '', $string)); /*Removes special chars.*/
        $string = preg_replace('/ +/', ' ', $string); /*Replaces multiple whitespace with single one.*/
        return preg_replace('/-+/', '-', $string); /*Replaces multiple hyphens with single one.*/
    }

    public static function round_up ($value, $places=0) 
    {
        if ($places < 0) { $places = 0; }
        $mult = pow(10, $places);
        return ceil($value * $mult) / $mult;
    }
    
    public static function exists($value, $alt='')
    {
        return (isset($value) && !empty($value) && $value != null) ? $value : $alt;
    }

    public static function if_exists($value)
    {
        return (isset($value) && !empty($value) && $value != null) ? TRUE : FALSE;
    }

    /*for model data in array format*/
    public static function model_to_list($model,$index,$value)
    {
        $array = '';
        if(self::if_exists($model)){
            $mod = $model[0];
            if(self::if_exists($mod)){
                if(($index==='int' || self::if_exists($mod[$index])) && self::if_exists($mod[$value])){
                    foreach($model as $m){
                        if($index === 'int'){
                            $array[] = $m[$value];
                        }else{
                            $array[$m[$index]] = $m[$value];
                        }
                    }
                }
            }
        }
        return $array;
    }

    public static function limit_text($text, $limit='200', $includeTags=FALSE)
    {
        if(!$includeTags)
            $text=strip_tags($text);
        if (strlen($text) > $limit) {
          $text=substr($text,0,$limit) . '...';
        }
        return $text;
    }

    public static function array_strip_tags($array)
    {
        $result = array();
     
        foreach ($array as $key => $value) {
            /*Don't allow tags on key either, maybe useful for dynamic forms.*/
            $key = strip_tags($key);
     
            /*If the value is an array, we will just recurse back into the*/
            /*function to keep stripping the tags out of the array,*/
            /*otherwise we will set the stripped value.*/
            if (is_array($value)) {
                $result[$key] = static::arrayStripTags($value);
            } else {
                /*I am using strip_tags(), you may use htmlentities(),*/
                /*also I am doing trim() here, you may remove it, if you wish.*/
                $result[$key] = trim(strip_tags($value));
            }
        }
     
        return $result;
    }

    public static function strip_tags($term)
    {
        return trim(strip_tags($term));
    }

    public static function clean_text($text) 
    {
        return trim(preg_replace('/\s+/', ' ', $text));
    }

    public static function is_value_exists($needle, $haystack) 
    {
        if(in_array($needle, $haystack)) { return TRUE; }
        foreach($haystack as $element) {
            if(is_array($element) && self::is_value_exists($needle, $element)) { return TRUE; }
        }
        return FALSE;
    }

    public static function array_to_json($array) 
    {
        if (!is_array($array)) {
            return FALSE;
        }

        $associative = count(array_diff(array_keys($array), array_keys(array_keys($array))));
        if ($associative) {

            $construct = array();
            foreach ($array as $key => $value) {

                /*We first copy each key/value pair into a staging array,*/
                /*formatting each key and value properly as we go.*/
                /*Format the key:*/
                if (is_numeric($key)) {
                    $key = "key_$key";
                }
                $key = "\"" . addslashes($key) . "\"";

                /*Format the value:*/
                if (is_array($value)) {
                    $value = self::array_to_json($value);
                } else if (!is_numeric($value) || is_string($value)) {
                    $value = "\"" . addslashes($value) . "\"";
                }

                /*Add to staging array:*/
                $construct[] = "$key: $value";
            }

            /*Then we collapse the staging array into the JSON form:*/
            $result = "{ " . implode(", ", $construct) . " }";
        } else { /*If the array is a vector (not associative):*/
            $construct = array();
            foreach ($array as $value) {

                /*Format the value:*/
                if (is_array($value)) {
                    $value = self::array_to_json($value);
                } else if (!is_numeric($value) || is_string($value)) {
                    $value = "'" . addslashes($value) . "'";
                }

                /*Add to staging array:*/
                $construct[] = $value;
            }

            /*Then we collapse the staging array into the JSON form:*/
            $result = "[ " . implode(", ", $construct) . " ]";
        }

        return $result;
    }

    public static function json_file_parse($path, $file)
    {
        return file_get_contents($path . $file);
    }

    public static function add_into_json($json, $value)
    {
        $array = json_decode($json); 
        if($array != null && !in_array($value, $array)) {
            array_push($array, $value);
            return json_encode($array);
        }
        return $json;
    }

    public static function add_array_into_json($json, $value, $not_array)
    {
        $array = json_decode($json); 
        if($array != null) {
            if (is_array($value)) {
                foreach($value as $val):
                    if (!in_array($val, $array) && !in_array($val, $not_array))
                        array_push($array, $val);
                endforeach;
                return json_encode($array);
            }
            else {
                if (!in_array($value, $array) && !in_array($val, $not_array))
                    array_push($array, $value);
                return json_encode($array);
            }
        }
        return $json;
    }

    public static function remove_from_json($json, $value)
    {
        $array = json_decode($json);
        if($array != null && in_array($value, $array)) {
            array_splice($array, array_search($value, $array));
            return json_encode($array);
        }
        return $json;
    }

    public static function remove_array_from_json($json, $value, $not_array)
    {
        $array = json_decode($json); 
        if($array != null) {
            if (is_array($value)) {
                foreach($value as $val):
                    if (in_array($val, $array) && !in_array($val, $not_array))
                        array_splice($array, array_search($val, $array));
                endforeach;
                return json_encode($array);
            }
            else {
                if (in_array($value, $array) && !in_array($val, $not_array)) 
                    array_splice($array, array_search($value, $array));
                return json_encode($array);
            }
        }
        return $json;
    }

    public static function delete_file($filename, $type)
    {
        $file_path = Yii::$app->params['upload_path'][$type];
        if (file_exists($file_path.$filename)) {
            chdir($file_path);  /*Comment this out if you are on the same version*/
            chown($filename,465); /*Insert an invalid UserId to set Nobody Owner; for instance 465*/
            unlink($file_path.$filename);
            return TRUE;
        }
        return FALSE;
    }

    public static function uploadFile($file_data, $type) 
    {
        $post = time();
        $target_dir = Yii::$app->params['upload_path'][$type];
        $basename = explode('.', basename($file_data["name"]));
        $name = '';

        foreach ($basename as $key => $base) {
            if($key == count($basename) - 1) {
                $name .= '_' . $post . '.' . $base;
            } else {
                $name .= $base;
            }
        }
        $target_file =  $name;

        $orig_name = basename($file_data["name"]);
        $uploadOk = 1;

        /*Check if file already exists*/
        if (file_exists($target_dir.$target_file)) {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            return array(
                    'uploaded'      => 'ERROR',
                    'upload_error'  => 'Sorry, file already exists. Your file was not uploaded.'
                     ); 
            /*if everything is ok, try to upload file*/
        } else {
            if (move_uploaded_file($file_data["tmp_name"], $target_dir . $target_file)) {

                if($type == 'menu') {
                    $data = self::import_clients_sort($target_file,'upload');
                }
                else {
                    $data = '';
                }

                return array(
                        'uploaded'      => 'OK', 
                        'data'          => $data,
                        'filename'      => $target_file,
                        'orig_name'     => $orig_name
                        );
            } else {

                $file_error = array(
                    0 => "There is no error, the file uploaded with success",
                    1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
                    2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
                    3 => "The uploaded file was only partially uploaded",
                    4 => "No file was uploaded",
                    6 => "Missing a temporary folder"
                );

                return array(
                        'uploaded'      => 'ERROR',
                        'upload_error'  =>  $file_error[$_FILES['files']['error']]
                        );
            }
        }
        return array(
                'uploaded'      => 'ERROR',
                'upload_error'  => 'Sorry, your file was not uploaded.'
                 );
    }

    /*maximum support upto AAA.*/
    public static function alphaCount($size) 
    {
        $alpha = [1=>'A', 2=>'B', 3=>'C', 4=>'D', 5=>'E', 6=>'F', 7=>'G', 8=>'H', 9=>'I', 10=>'J', 11=>'K', 12=>'L', 13=>'M', 14=>'N', 15=>'O', 16=>'P', 17=>'Q', 18=>'R', 19=>'S', 20=>'T', 21=>'U', 22=>'V', 23=>'W', 24=>'X', 25=>'Y', 26=>'Z'];
        if($size > 26) {
            $a = floor($size/26);
            $b = $size%26;

            if($a > 26) return 'AAA';
            else if($b == 0) return $alpha[$a-1].$alpha[26];
            return $alpha[$a].$alpha[$b];
        }
        return $alpha[$size];
    }

    public static function importXL($inputFileName) 
    {
        $path = Yii::getAlias("@vendor/PHPExcel.php");
        require_once($path);

        if (file_exists($inputFileName)) {

            $objPHPExcel = new \PHPExcel();
            $inputFileType = 'Excel2007';
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $sheetnames = $objReader->listWorksheetNames($inputFileName); 
            for ($sheet = 0; $sheet <= 5; $sheet++) {
                if(isset($sheetnames[$sheet]) && $sheetnames[$sheet] != null) {
                    $objReader->setLoadSheetsOnly($sheetnames[$sheet]);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $data[$sheetnames[$sheet]] = $objPHPExcel->getActiveSheet()->toArray(null, TRUE, TRUE, TRUE);
                }
            } 
            return $data;
        }
    }

    public static function exportXL($data, $titles) 
    {
        $path = Yii::getAlias("@vendor/PHPExcel.php");
        require_once($path);

        $objPHPExcel = new \PHPExcel(); 
        $objPHPExcel->getProperties()->setCreator("Klientscape Software")
                                     ->setLastModifiedBy("Klientscape Software")
                                     ->setTitle("Office 2007 XLSX Exported Document")
                                     ->setSubject("Office 2007 XLSX Exported Document")
                                     ->setDescription("Exported document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Exported data file from software");
         
        $alpha = self::alphaCount(count($titles)+1);
        /*Add titles data*/
        $j=0;
        for ($i = 'A'; $i != $alpha; $i++): 
            if(isset($titles[$j]) && $titles[$j] != null) 
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($i.'1', $titles[$j]);
            else break;
            $j++;
        endfor;

        $j=0;
        foreach($data as $d):
            $l=0;
            for ($i = 'A'; $i != $alpha; $i++):
                if(isset($titles[$l]) && $titles[$l] != null) 
                    $objPHPExcel->setActiveSheetIndex(0)->setCellValue($i.($j+2), $d[str_replace(' ', '_', strtolower($titles[$l]))]);
                $l++;
            endfor;
            $j++;
        endforeach;
         
        /*Rename worksheet*/
        $objPHPExcel->getActiveSheet()->setTitle('Your Document');       
         
        /*Set active sheet index to the first sheet, so Excel opens this as the first sheet*/
        $objPHPExcel->setActiveSheetIndex(0);         
         
        /*Redirect output to a client's web browser (Excel5)*/
        /*header('Content-Type: application/vnd.ms-excel');*/
        header('Content-Disposition: attachment;filename="exported.xls"');
        header('Cache-Control: max-age=0');
        /*If you're serving to IE 9, then the following may be needed*/
        header('Cache-Control: max-age=1');
         
        /*If you're serving to IE over SSL, then the following may be needed*/
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); /*Date in the past*/
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); /*always modified*/
        header ('Cache-Control: cache, must-revalidate'); /* HTTP/1.1*/
        header ('Pragma: public'); /*HTTP/1.0*/
         
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        /*Yii::$app->end();*/
    }

    public static function import_clients_sort($target_file, $path_type)
    {
        $data   = [];
        $ex     = []; 
        $fixed  = ['name', 'price', 'description'];
        $caps   = ['name'];

        $path   = Yii::$app->params['upload_path'][$path_type];
        $extracted = self::importXL($path.$target_file); 

        $i=0;
        foreach ($extracted as $key => $value) { $i++; $j=0;
            $item_array = [];
            foreach ($value as $val) { $j++; $k=0;
                if ($j != 1) {
                    foreach ($val as $row) { $k++;
                        $item_array[$j][] = $row;
                    }
                }
            }

            $data[$i]['category'] = $key;
            $data[$i]['items'] = $item_array;

        }

        return $data;
    }

    public static function resetData ($file_name, $reset_data) /* other client devices must logout before using this function */
    {
        $json_file      = Yii::getAlias("@webroot/assets/json/".$file_name.".json");
        $json_array     = json_decode(file_get_contents($json_file), true); 
        $fp = fopen($json_file, 'w');
        fwrite($fp, $reset_data);
        fclose($fp);
    }

    public static function convertNumberToWords($number)
    {
        $hyphen      = ' '; /* '-';*/
        $conjunction = ' and ';
        $separator   = ' '; /* ', ';*/
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'One',
            2                   => 'Two',
            3                   => 'Three',
            4                   => 'Four',
            5                   => 'Five',
            6                   => 'Six',
            7                   => 'Seven',
            8                   => 'Eight',
            9                   => 'Nine',
            10                  => 'Ten',
            11                  => 'Eleven',
            12                  => 'Twelve',
            13                  => 'Thirteen',
            14                  => 'Fourteen',
            15                  => 'Fifteen',
            16                  => 'Sixteen',
            17                  => 'Seventeen',
            18                  => 'Eighteen',
            19                  => 'Nineteen',
            20                  => 'Twenty',
            30                  => 'Thirty',
            40                  => 'Fourty',
            50                  => 'Fifty',
            60                  => 'Sixty',
            70                  => 'Seventy',
            80                  => 'Eighty',
            90                  => 'Ninety',
            100                 => 'Hundred',
            1000                => 'Thousand',
            1000000             => 'Million',
            1000000000          => 'Billion',
            1000000000000       => 'Trillion',
            1000000000000000    => 'Quadrillion',
            1000000000000000000 => 'Quintillion'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            /*overflow*/
            trigger_error(
                'convertNumberToWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . self::convertNumberToWords(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    /*$string .= $conjunction . self::convertNumberToWords($remainder);*/
                    $string .= " ".self::convertNumberToWords($remainder);
                }
                break;
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = self::convertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= self::convertNumberToWords($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }
        return $string;
    }

    public static function getLatestDate ()
    {
        $data = Query::queryOne("SELECT MAX(DATE(created_at)) as latest_date FROM `audit_log`");
        return ($data != null && $data['latest_date'] != '') ? $data : '';
    }
}

/*
Array
(
    [food item] => Array
        (
            [1] => Array
                (
                    [A] => name 
                    [B] => price
                    [C] => description
                )

            [2] => Array
                (
                    [A] => Food Item One
                    [B] => 100
                    [C] => asdf
                )

            [3] => Array
                (
                    [A] => Food Item Two
                    [B] => 200
                    [C] => asdf
                )

            [4] => Array
                (
                    [A] => Food Item Three
                    [B] => 50
                    [C] => asdf
                )

            [5] => Array
                (
                    [A] => Food Item Four
                    [B] => 75
                    [C] => asdf
                )

            [6] => Array
                (
                    [A] => Food Item Five
                    [B] => 125
                    [C] => asdf
                )

        )

    [hot breverage] => Array
        (
            [1] => Array
                (
                    [A] => name 
                    [B] => price
                    [C] => description
                )

            [2] => Array
                (
                    [A] => Hot Breverage One
                    [B] => 100
                    [C] => asdf
                )

            [3] => Array
                (
                    [A] => Hot Breverage Two
                    [B] => 200
                    [C] => asdf
                )

            [4] => Array
                (
                    [A] => Hot Breverage Three
                    [B] => 50
                    [C] => asdf
                )

            [5] => Array
                (
                    [A] => Hot Breverage Four
                    [B] => 75
                    [C] => asdf
                )

            [6] => Array
                (
                    [A] => Hot Breverage Five
                    [B] => 125
                    [C] => asdf
                )

        )
)
*/
