<?php
$this->title = "Поиск";
$storage = Yii::$app->session->get('favorite', []);

?>
<main>
    <section class="content main-search">
        <h1>Поиск по книгам</h1>
        <div class="search search--head">
            <div class="search__content">
                <form class="search__form" action="/site/search" method="get" id="search">

                    <input name="q" class="search__input" type="search" placeholder="Название, серия, автор, издательство">
                    <button class="button search__submit" type="submit">Найти</button>
                </form>
            </div>
        </div>
    </section>
    <section class="books search-result">
        <div class="content">
            <div class="books__header section-header">
                <h2>Вот, что нашлось</h2>
            </div>
            <div class="books__wrapper">
                <?php foreach ($books as $book) : ?>
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


    <?= $this->render('_slider') ?>
</main>