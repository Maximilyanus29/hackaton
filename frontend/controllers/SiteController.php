<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\User;
use common\models\Cat;
use common\models\Circulaton;

/**
 * Site controller
 */
class SiteController extends Controller
{

    const PAGINATION = 12;


    // For IMPORT


    function dopolnitMassiv($count, &$arr)
    {
        for ($i=0; $i < $count; $i++) { 
            $arr[] = null;
        }
    }


    function sokratitMassive($count, &$arr)
    {
        $id = array_shift($arr);

        $ostalnoe = implode(';', $arr);

        $arr = [$id, $ostalnoe];
    }

    public function actionTest()
    {
        ini_set('memory_limit', '-1');
        $db = str_getcsv(
            mb_convert_encoding(file_get_contents('siglaslink.csv'), 'UTF-8', "WINDOWS-1251")
            ,
            PHP_EOL
        );
        
 
        
       

      
        $data = [];
        foreach($db as $row){
            $dat = explode(';',  $row);

            $dat[0] = (int)$dat[0];

            // if(count($dat) > 2){
            //     $this->sokratitMassive(8 - count($dat), $dat);
            // }

            // var_dump(count($dat));die;

        

 
            $data[] = $dat;
        }

        unset($data[0]);

        $data = array_chunk($data, 50);

        // var_dump($data[0]);die;

        // recId;aut;title;place;publ;yea;lan;rubrics;person;serial;material;biblevel;ager
    //   circulationID;catalogueRecordID;barcode;startDate;finishDate;readerID;bookpointID;state;;



        // foreach($data as $da){
        //     Yii::$app->db->createCommand()->batchInsert('siglaslink', [
        //         'sigla',
        //         'bookpoint',
        //     ], $da)->execute();
        // }

 
      


        
       
    }

    // For IMPOERT END




    // Главная
    public function actionIndex()
    {

        $catalog = Cat::find()->limit(self::PAGINATION)->all();

//        var_dump(Yii::$app->session->get('auth'));

        if(!Yii::$app->user->isGuest){
            // Запрос c id юзера
        }else{
            // Запрос с id = 0;
        }
        // Получаем ответ json;

        // и тащим рекомендации из базы;
//        $recomended = Cat::find()->where(['recId' => [1,2,3]])->limit(5)->all();
        $recomended = Cat::find()->limit(5)->orderBy('recId DESC')->all();

        return $this->render('index', compact('catalog', 'recomended'));
    }






    // Лигинимся по айдишнику
    public function actionLoginWithId($id)
    {



        if ($this->login($id)){
            return $this->redirect(Yii::$app->request->referrer);

        }

        return "Не верный id начните со 163, 179, 232, 233, 234";


    }

    // Вспомогательный метод логина
    private function login($id)
    {

        $session = Yii::$app->session;

        $user = User::findOne($id);

        if($user){
            $session->set('auth', $id);
            return true;
        }
        return false;

    }

    // ВЫйти
    private function actionLogout($id)
    {

        $session = Yii::$app->session;

        return $session->remove('auth');

    }


    // Профиль
    public function actionLk()
    {

        if( !Yii::$app->session->get('auth') )  return $this->redirect('/');

        $user = User::findOne(Yii::$app->session->get('auth'));

        $history = Circulaton::find()->joinWith('cat')->where(['readerId' => $user->id])->limit(5)->all();


        $favorite = Cat::find()->where( ['recId' => Yii::$app->session->get('favorite', []) ] )->limit(self::PAGINATION)->orderBy('recId DESC')->all();



        return $this->render('lk', compact('history', 'user', 'favorite'));
    }

    // Список ссылок что бы залогинится

    public function actionLoginList()
    {
        $users = User::find()->limit(self::PAGINATION)->all();

        return $this->render('login-list', compact('users'));
    }

  
    // каталог книг
    public function actionCatalog()
    {
        $books = Cat::find()->limit(self::PAGINATION)->all();

        return $this->render('catalog', compact('books'));
    }

    // Страница поиска
    public function actionSearch()
    {
        $books = Cat::find()->where(['like', 'title' , Yii::$app->request->get('q')])->groupBy('recId')->limit(self::PAGINATION)->all();

        return $this->render('search', compact('books'));
    }



    /*FAVORIT BLOCK*/

    public function actionRemoveFromFavorite($id)
    {
        $session = Yii::$app->session;
        $storage = $session->get('favorite', []);
        unset($storage[array_search($id, $storage)]);
        $session->set('favorite', $storage);

        return true;
    }

    public function actionAddToFavorite($id)
    {
        $session = Yii::$app->session;
        $storage = $session->get('favorite', []);
        $storage[] = $id;
        $session->set('favorite', $storage);

        return true;
    }

    /*FAVORIT BLOCK*/

}
