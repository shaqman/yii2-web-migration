<?php
/**
 * Created by PhpStorm.
 * User: bluespy
 * Date: 10/4/18
 * Time: 7:23 AM
 */

namespace shaqman\web\migration\models;


use shaqman\web\migration\Module;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;

/**
 * @property mixed version
 * @property int apply_time
 */
class Migration extends ActiveRecord
{
    public static function tableName()
    {
        return Module::getInstance()->migrationTableName;
    }

    public static function activeMigrations() {
        $migrations = Migration::find()->all();
        $migrationFiles = FileHelper::findFiles(\Yii::getAlias(Module::getInstance()->migrationPath));

        array_walk($migrationFiles, function (&$array, $index) {
            $path = explode('/', $array);
            $array = str_replace(".php", "", $path[count($path)-1]);
        });

        $migrationFiles = array_merge($migrationFiles,  [Module::getInstance()->initialMigrationVersion]);

        $activeMigration = array_filter($migrationFiles, function($var) use($migrations) {
            foreach ($migrations as $migration) {
                if($migration->version == $var) {
                    return false;
                }
            }

            return true;
        });

        return $activeMigration;
    }
}