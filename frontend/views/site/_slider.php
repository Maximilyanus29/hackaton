<?php

use common\models\Cat;
use common\models\Circulaton;
use common\models\User;

$user = User::findOne(Yii::$app->session->get('auth'));


if(!$user){
    $recomended = Cat::find()->limit(5)->orderBy('recId DESC')->all();

}else{

    $history = Circulaton::find()->joinWith('cat')->where(['readerId' => $user->id])->limit(5)->all();


    $arrayCategoriesInHistory=[];
    foreach ($history as $his){
        $book = $his->cat;
        $arrayCategoriesInHistory[] = $book->rubrics;


    }


    $recomended = Cat::find()->limit(5)->where(['like', 'rubrics', $arrayCategoriesInHistory])->orderBy('recId DESC')->all();

}
// Получаем ответ json;

// и тащим рекомендации из базы;
//        $recomended = Cat::find()->where(['recId' => [1,2,3]])->limit(5)->all();






$storage = Yii::$app->session->get('favorite', []);


?>
<section class="books-slider">
    <div class="content">
        <div class="books-slider__header section-header">
            <h2>Вам может понравится</h2>
            <a href="/">Смотреть все</a>
        </div>
        <div class="slider">
            <div class="swiper">
                <div class="swiper-wrapper">


                    <?php foreach ($recomended as $book) : ?>
                        <article class="swiper-slide book">
                            <div class="book__thumb">
                                <img src="/images/Chelovek-Pikasso-big.jpg"
                                     alt="<?= $book->title ?>">
                            </div>
                            <div class="book__content">
                                <p class="book__title">
                                    <?= $book->title ?>
                                </p>
                                <p class="book__author">
                                    <?= $book->aut ?>
                                </p>
                            </div>
                            <a class="book__link" href="/"></a>
                            <button type="button" class="book__favorite <?= in_array($book->recId, $storage) ? 'active' : null ?>" data-id="<?= $book->recId ?>">
                                Добавить в избранное
                            </button>
                        </article>
                    <?php endforeach; ?>



                </div>
            </div>
            <div class="swiper-controls">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

    </div>
</section>