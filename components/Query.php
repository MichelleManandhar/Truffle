<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of query command functions
 *
 * @author gaurav maharjan
 */

namespace app\components;

 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use app\components\Dbi;

class Query extends Component {

    public static function execute($sql)
    {
        return Yii::$app->db->createCommand($sql)->execute();
    }

	public static function queryAll($sql)
    {
    	return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function queryOne($sql)
    {
    	return Yii::$app->db->createCommand($sql)->queryOne();
    }

    public static function queryColumn($sql)
    {
    	return Yii::$app->db->createCommand($sql)->queryColumn();
    }

    public static function queryScalar($sql)
    {
    	return Yii::$app->db->createCommand($sql)->queryScalar();
    }

    public static function batchInsert($table, $fields, $values)
    {
        return Yii::$app->db->createCommand()->batchInsert($table, $fields, $values)->execute();
    } 

    public static function executeSecure($sql, $bind_value)
    {
        return Yii::$app->db->createCommand($sql)->bindValues($bind_value)->execute();
    }

    public static function queryAllSecure($sql, $bind_value)
    {
        return Yii::$app->db->createCommand($sql)->bindValues($bind_value)->queryAll();
    }

    public static function queryOneSecure($sql, $bind_value)
    {
        return Yii::$app->db->createCommand($sql)->bindValues($bind_value)->queryOne();
    }

    public static function queryColumnSecure($sql, $bind_value)
    {
        return Yii::$app->db->createCommand($sql)->bindValues($bind_value)->queryColumn();
    }

    public static function queryScalarSecure($sql, $bind_value)
    {
        return Yii::$app->db->createCommand($sql)->bindValues($bind_value)->queryScalar();
    } 

    public static function pairKeyValue($sql)
    {
        return Yii::$app->db->createCommand($sql)->queryAll(PDO::FETCH_KEY_PAIR);
    }
}
