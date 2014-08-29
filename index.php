<?php

defined('YII_DEBUG') or define('YII_DEBUG', true);

require_once(__DIR__ . '/../../framework/yii.php');

$config = 'protected/config/config.php';

// Pass as argument the config file to the createWebApplication method
Yii::createWebApplication($config)->run();