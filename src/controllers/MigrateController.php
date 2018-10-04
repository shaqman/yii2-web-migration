<?php

namespace shaqman\web\migration\controllers;

use shaqman\web\migration\Module;
use Yii;
use yii\console\Application;
use yii\db\Migration;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\HttpException;

class MigrateController extends Controller
{
    /**
     * Run action migrate up or down in web interface.
     * @return mixed
     */
    public function actionUp()
    {
        $migrations = \shaqman\web\migration\models\Migration::activeMigrations();

        foreach ($migrations as $migration) {
            require_once Yii::getAlias(Module::getInstance()->migrationPath . '/' . $migration . '.php');

            echo "<pre>";
            $obj = new $migration();
            $obj->up();
        }
    }
}
