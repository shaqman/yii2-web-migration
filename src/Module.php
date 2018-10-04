<?php
/**
 * Created by PhpStorm.
 * User: bluespy
 * Date: 10/3/18
 * Time: 1:13 PM
 */

namespace shaqman\web\migration;

use yii\base\BootstrapInterface;
use yii\console\Application;

/**
 * yii2-web-migration module definition class
 */
class Module extends \yii\base\Module {

    public $migrationTableName = "migration";

    public $migrationPath = "@console/migrations";

    public $defaultRoute = "migrate/up";

    public $initialMigrationVersion = "m000000_000000_base";

}
