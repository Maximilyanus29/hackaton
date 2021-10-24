<?php
$this->title = "Библиотека москвы";
$storage = Yii::$app->session->get('favorite', []);


?>
<main>
    <section class="hero">
        <div class="content">
            <div class="hero__wrapper">
                <h1>Бибилиотеки москвы</h1>
                <p class="hero__subtitle">
                    находите и бронируйте любимые книги прямо из дома
                </p>
                <p class="hero__image">
                    <img src="/images/hero.png" alt="Логотип сайта" width="421">
                </p>
            </div>
        </div>
    </section>
    <?= $this->render('_searchBlock') ?>
    <section class="books">
        <div class="content">
            <div class="books__header section-header">
                <h2>Выбор читателей</h2>
                <a href="/">Смотреть все</a>
            </div>
            <div class="books__wrapper">
                <?php foreach ($catalog as $book) : ?>
                    <article class="book books__item">
                        <div class="book__thumb">
                            <img src="/images/Chelovek-Pikasso-big.jpg" alt="<?= $book->title ?>">
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
    </section>
    <section class="categories">
        <div class="content">
            <div class="section-header categories__header">
                <h2>Подборки на любой вкус</h2>
                <a href="/">Смотреть все</a>
            </div>
            <div class="categories__wrapper">
                <article class="plate categories__item">
                    <p class="plate__title">
                        Зарубежные классики
                    </p>
                    <a href="/" class="plate__link">Смотреть все</a>
                </article>
                <article class="plate categories__item">
                    <p class="plate__title">
                        Зарубежные классики
                    </p>
                    <a href="/" class="plate__link">Смотреть все</a>
                </article>
                <article class="plate categories__item">
                    <p class="plate__title">
                        Зарубежные классики
                    </p>
                    <a href="/" class="plate__link">Смотреть все</a>
                </article>
                <article class="plate categories__item">
                    <p class="plate__title">
                        Зарубежные классики
                    </p>
                    <a href="/" class="plate__link">Смотреть все</a>
                </article>
                <article class="plate categories__item">
                    <p class="plate__title">
                        Зарубежные классики
                    </p>
                    <a href="/" class="plate__link">Смотреть все</a>
                </article>
                <article class="plate categories__item">
                    <p class="plate__title">
                        Зарубежные классики
                    </p>
                    <a href="/" class="plate__link">Смотреть все</a>
                </article>
            </div>
        </div>
    </section>
  <?= $this->render('_slider') ?>
</main>