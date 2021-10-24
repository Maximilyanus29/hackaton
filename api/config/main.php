<?php
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/api');

require __DIR__ . '/params.php';


return [
    'id' => 'api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers'
];
