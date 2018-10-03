<?php

namespace shaqman\web\migration\controllers;

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

class DefaultController extends Controller
{
    /**
     * Run action migrate up or down in web interface.
     * @param string $action
     * @return mixed
     * @throws BadRequestHttpException
     * @throws HttpException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\base\InvalidRouteException
     * @throws \yii\console\Exception
     */
    public function actionMigrate()
    {
        Yii::$app->db->createCommand("SELECT * FROM migration");
    }
}
