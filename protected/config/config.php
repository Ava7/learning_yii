<?php

return array(
    'name' => 'First Test App With Yii',
    'defaultController' => 'home',
    //'basePath' => 'web',
    'components' => array(
        'session' => array(
            'class' => 'CHttpSession'
        ),
        'user' => array(
            'class' => 'CWebUser',
            'loginUrl' => array('home/login'),
        ),
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=127.0.0.1;dbname=yii_blog',
            'username' => 'root',
            'password' => '',
            'emulatePrepare' => true,
            'charset' => 'utf8',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                //'<controller:\w+>/<id:\d+>' => '<controller>/view',

                // allows me to do /post/delete/1
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                
                // '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
    ),
    'import' => array(
        'application.models.*',
        //'first.components.*'
    )
);