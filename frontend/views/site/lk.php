<?php
$this->title = "Личный кабинет";
$storage = Yii::$app->session->get('favorite', []);

?>
<main>
    <section class="user-lk">
        <div class="content">
            <h1>Личный кабинет</h1>
            <div class="tabs">
                <div class="tabs__buttons">
                    <button class="tabs__button tabs__button--profile active" data-tab="profile">Профиль</button>
                    <button class="tabs__button tabs__button--history" data-tab="history">История</button>
                </div>
                <div class="tabs__content user-profile active" data-content="profile">
                    <img src="/images/ava.jpg" alt="<?= $user->id ?>">
                    <div class="user-profile__wrapper">
                        <p class="user-profile__value user-profile__name">Пользователь с id <?= $user->id ?></p>
                        <div class="user-profile__item">
                            <span class="user-profile__title">Адрес:</span>
                            <span class="user-profile__value"><?= $user->address ?></span>
                        </div>
<!--                        <div class="user-profile__item">-->
<!--                            <span class="user-profile__title">Любимые жанры:</span>-->
<!--                            <span class="user-profile__value">Русская классическая литература, Фентези, Зарубежная классика</span>-->
<!--                        </div>-->
<!--                        <div class="user-profile__item">-->
<!--                            <span class="user-profile__title">Любимые авторы:</span>-->
<!--                            <span class="user-profile__value">А.С. Пушкин, А.П. Чехов</span>-->
<!--                        </div>-->

                        <button type="submit" class="button user-profile__button">Изменить</button>
                    </div>
                </div>
                <div class="tabs__content user-history" data-content="history">

                    <?php foreach ($history as $book) : ?>
                        <div class="user-history__book">
                            <img src="/images/Chelovek-Pikasso-big.jpg" alt="<?= $book->cat->title ?>">
                            <div class="user-history__wrapper">
                                <p class="user-history__title"><?= $book->cat->title ?></p>
                                <div class="user-history__item">
                                    <span class="user-history__title">Автор:</span>
                                    <span class="user-history__value"><?= $book->cat->aut ?></span>
                                </div>
                                <div class="user-history__item">
                                    <span class="user-history__title">Библиотека:</span>
                                    <span class="user-history__value"><?= $book->cat->aut ?></span>
                                </div>
                                <div class="user-history__item">
                                    <span class="user-history__title">Адрес:</span>
                                    <span class="user-history__value"><?= $book->bookpoint->adress ?></span>
                                </div>
                                <div class="user-history__item user-history__item--dates">
                                    <div>
                                        <span class="user-history__title">Дата получения:</span>
                                        <span class="user-history__value"><?= $book->startDate ?> </span>
                                    </div>
                                    <div>
                                        <span class="user-history__title">Дата сдачи:</span>
                                        <span class="user-history__value"><?= $book->finishDate ?> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>


                </div>
            </div>
        </div>
    </section>
    <?php if (!empty($favorite)) : ?>
    <section class="books favorites-book">
        <div class="content">
            <div class="favorites-book__header section-header">
                <h2>Избранное</h2>
            </div>
            <div class="books__wrapper">

                <?php foreach ($favorite as $book) : ?>
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
    <?php endif; ?>
</main>