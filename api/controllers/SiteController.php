<?php

namespace api\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{



    public function actionIndex()
    {
        $response = new Response();

        return $this->asJson('wag');


    }


}
