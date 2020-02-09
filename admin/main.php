<?php
//require '../config/rb.php';
//$db = require '../config/config_db.php';
//require '../config/functions.php';
//R::setup($db['dsn'], $db['user'], $db['pass']);
//$filter_param = isset($_GET['hall']) ? "&hall=" . $_GET['hall'] : "";
//Конфигурация зала

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ИдёмВКино</title>
    <link rel="stylesheet" href="CSS/normalize.css">
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>

<body>
<header class="page-header">
    <h1 class="page-header__title">Идём<span>в</span>кино</h1>
    <span class="page-header__subtitle">Администраторррская</span>
</header>

<main class="conf-steps">
    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Управление залами</h2>
        </header>

        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Доступные залы:</p>
            <ul class="hideHall conf-step__list">
<?php
$hallsRead = R::getCol('SELECT `hall_name` FROM halls ');
//debug($hallsRead);
?>
                <?php foreach ($hallsRead as $hallRead): ?>
                <li id="hiddenHall">Зал <?=$hallRead?>
<!--                    <form action="deleteHall.php" method="post"></form>-->
                    <button class="dellHall conf-step__button conf-step__button-trash" onclick="location.href = location.href + '?hallName=<?=$hallRead?>'"></button>
                    <?php
                    if (isset($_GET['hallName'])) {
                        $id = $_GET['hallName'];
                        $oneHall = R::load('halls', $id);
                        R::trash($oneHall);

                    }

                    ?>
                </li>
                <?php endforeach; ?>

<!--                <li>Зал 2-->
<!--                    <button class="conf-step__button conf-step__button-trash"></button>-->
<!--                </li>-->
            </ul>
            <button id="opener" class="conf-step__button conf-step__button-accent">Создать зал</button>
        </div>

    </section>
    <!--======ADD Hall POP-UP=======-->
    <div id="addHall" class="popup">

        <div class="popup__container">
            <div class="popup__content">
                <div class="popup__header">
                    <h2 class="popup__title">
                        Добавление зала
                        <a class="popup__dismiss" href="main.php"><img src="i/close.png" alt="Закрыть"></a>
                    </h2>

                </div>
                <div class="popup__wrapper">
                    <form action="addHall.php" method="post" accept-charset="utf-8">
                        <label class="conf-step__label conf-step__label-fullsize" for="name">
                            Название зала
                            <input class="conf-step__input" type="text" placeholder="Например, &laquo;Зал 1&raquo;" name="hallName" required>
                        </label>
                        <div class="conf-step__buttons text-center">
                            <input type="submit" value="Добавить зал" class="conf-step__button conf-step__button-accent">
                            <button id="closeAddHallPopup" class="conf-step__button conf-step__button-regular">Отменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--======ADD Hall POP-UP end=======-->
    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Конфигурация залов</h2>
        </header>
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Выберите зал для конфигурации:</p>
            <ul class="conf-step__selectors-box">
                <?php foreach ($hallsRead as $hallRead): ?>
<!--                    <script> function getUrl (url) {-->
<!--                            url = location.href;-->
<!--                            if (url.indexOf('?hall=') === -1) {-->
<!--                                console.log(location.href + '?hall=');}-->
<!--                            return 'index.php' + '?hall=';}-->
<!---->
<!--                    </script>-->
<!--
<li><input onclick="location.href = getUrl() + '--><?//=$hallRead?>//' " type="radio" class="conf-step__radio" name="chairs-hall" value="Зал <?//=$hallRead?><!--" checked><span class="conf-step__selector">Зал --><?//=$hallRead?><!--</span></li>-->
                <form action="index.php" method="post">
                    <li><input  type="radio" class="conf-step__radio" name="hall_number" value="<?=$hallRead?>" checked><span class="conf-step__selector">Зал <?=$hallRead?></span></li>
                <?php endforeach; ?>
<!--                <li><input type="radio" class="conf-step__radio" name="chairs-hall" value="Зал 2"><span class="conf-step__selector">Зал 2</span></li>-->
            </ul>
            <p class="conf-step__paragraph">Укажите количество рядов и максимальное количество кресел в ряду:</p>



            <div class="conf-step__legend">
                <label class="conf-step__label">Рядов, шт<input name = "rows" type="text" class="conf-step__input" placeholder="10" ></label>
                <span class="multiplier">x</span>

                <label class="conf-step__label">Мест, шт<input name = "places" type="text" class="conf-step__input" placeholder="8" ></label>
            </div>
            <p class="conf-step__paragraph">Теперь вы можете указать типы кресел на схеме зала:</p>
            <div class="conf-step__legend">
                <span class="conf-step__chair conf-step__chair_standart"></span> — обычные кресла
                <span class="conf-step__chair conf-step__chair_vip"></span> — VIP кресла
                <span class="conf-step__chair conf-step__chair_disabled"></span> — заблокированные (нет кресла)
                <p class="conf-step__hint">Чтобы изменить вид кресла, нажмите по нему левой кнопкой мыши</p>
            </div>
            <?php
            //Схема мест в зале
            if (isset($_POST['hall_number'])) {
                $hallNumber = $_POST['hall_number'];
                $rows = R::load('hallconfig', $hallNumber);
                $numRows = $rows->rows;
                $places = R::load('hallconfig', $hallNumber);
                $numPlaces = $places->places;
                debug($hallNumber);
            }?>
            <div class="conf-step__hall">
                <div class="conf-step__hall-wrapper">

                    <?php
                    for ($row = 1; $row<=$numRows; $row++) {
                        echo '<div class="conf-step__row">';
                        for($place = 1; $place<=$numPlaces; $place++) {
                            echo '<span class="conf-step__chair conf-step__chair_standart"></span>';
                        }

                        echo '</div>';
                    }
                    ?>
<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_disabled"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_disabled"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_disabled"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_disabled"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_disabled"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_disabled"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_vip"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_vip"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_vip"></span><span class="conf-step__chair conf-step__chair_vip"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_vip"></span><span class="conf-step__chair conf-step__chair_vip"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_vip"></span><span class="conf-step__chair conf-step__chair_vip"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_vip"></span><span class="conf-step__chair conf-step__chair_vip"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_vip"></span><span class="conf-step__chair conf-step__chair_vip"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_vip"></span><span class="conf-step__chair conf-step__chair_vip"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_disabled"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                    </div>-->

<!--                    <div class="conf-step__row">-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                        <span class="conf-step__chair conf-step__chair_standart"></span><span class="conf-step__chair conf-step__chair_standart"></span>-->
<!--                    </div>-->
                </div>
            </div>

            <fieldset class="conf-step__buttons text-center">
                <button class="conf-step__button conf-step__button-regular">Отмена</button>
                <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent">

            </fieldset>
            </form>
        </div>
    </section>

    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Конфигурация цен</h2>
        </header>
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Выберите зал для конфигурации:</p>
            <form action="priceConfig.php" method="POST">
            <ul class="conf-step__selectors-box">
                <?php foreach ($hallsRead as $hallRead): ?>
                <li><input type="radio" class="conf-step__radio" name="hall_number" value="<?=$hallRead?>"><span class="conf-step__selector">Зал <?=$hallRead?></span></li>
               <?php endforeach;?>
<!--                <li><input type="radio" class="conf-step__radio" name="prices-hall" value="Зал 2" checked><span class="conf-step__selector">Зал 2</span></li>-->
            </ul>

            <p class="conf-step__paragraph">Установите цены для типов кресел:</p>
            <div class="conf-step__legend">
                <label class="conf-step__label">Цена, рублей<input name="standartPrice" type="text" class="conf-step__input" placeholder="0" ></label>
                за <span class="conf-step__chair conf-step__chair_standart"></span> обычные кресла
            </div>
            <div class="conf-step__legend">
                <label class="conf-step__label">Цена, рублей<input name="vipPrice" type="text" class="conf-step__input" placeholder="0" value="350"></label>
                за <span class="conf-step__chair conf-step__chair_vip"></span> VIP кресла
            </div>

            <fieldset class="conf-step__buttons text-center">
                <button onclick="location.href = 'index.php'" class="conf-step__button conf-step__button-regular">Отмена</button>
                <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent">
            </fieldset>
            </form>
        </div>
    </section>

<!--    ==========ADD MOVIE POPUP=============-->
    <div id="addMovie" class="popup">
        <div class="popup__container">
            <div class="popup__content">
                <div class="popup__header">
                    <h2 class="popup__title">
                        Добавление фильма
                        <a class="popup__dismiss" href="index.php"><img src="i/close.png" alt="Закрыть"></a>
                    </h2>

                </div>
                <div class="popup__wrapper">
                    <form action="addMovie.php" method="post" accept-charset="utf-8">
                        <label class="conf-step__label conf-step__label-fullsize" for="name">
                            Название фильма
                            <input class="conf-step__input" type="text" placeholder="Например, &laquo;Гражданин Кейн&raquo;" name="movieTitle" required>
                        </label>
                        <div class="conf-step__buttons text-center">
                            <input type="submit" value="Добавить фильм" class="conf-step__button conf-step__button-accent">
                            <button id="closeMovie" class="conf-step__button conf-step__button-regular">Отменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--    ==========ADD MOVIE POPUP END=============-->
    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Сетка сеансов</h2>
        </header>
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">
                <button id="openerMovie" class="conf-step__button conf-step__button-accent">Добавить фильм</button>
            </p>
            <?php
            $movieRead = R::getCol('SELECT `movie_title` FROM addmovie ');
            ?>

            <?php foreach ($movieRead as $movie): ?>
            <div class="conf-step__movies">
                <div id="draggable6" class="conf-step__movie">
                    <img class="conf-step__movie-poster" alt="poster" src="i/poster.png">
                    <h3 class="conf-step__movie-title"><?=$movie?></h3>
                    <p class="conf-step__movie-duration">130 минут</p>
                </div>
            <?php endforeach;?>
            <div class="conf-step__movies">
                <div id="draggable" class="conf-step__movie">
                    <img class="conf-step__movie-poster" alt="poster" src="i/poster.png">
                    <h3 class="conf-step__movie-title">Звёздные войны XXIII: Атака клонированных клонов</h3>
                    <p class="conf-step__movie-duration">130 минут</p>
                </div>

                <div id="draggable2" class="conf-step__movie">
                    <img class="conf-step__movie-poster" alt="poster" src="i/poster.png">
                    <h3 class="conf-step__movie-title">Миссия выполнима</h3>
                    <p class="conf-step__movie-duration">120 минут</p>
                </div>

                <div  id="draggable3" class="conf-step__movie">
                    <img class="conf-step__movie-poster" alt="poster" src="i/poster.png">
                    <h3 class="conf-step__movie-title">Серая пантера</h3>
                    <p class="conf-step__movie-duration">90 минут</p>
                </div>

                <div id="draggable4" class="conf-step__movie">
                    <img class="conf-step__movie-poster" alt="poster" src="i/poster.png">
                    <h3 class="conf-step__movie-title">Движение вбок</h3>
                    <p class="conf-step__movie-duration">95 минут</p>
                </div>

                <div id="draggable5" class="conf-step__movie">
                    <img class="conf-step__movie-poster" alt="poster" src="i/poster.png">
                    <h3 class="conf-step__movie-title">Кот Да Винчи</h3>
                    <p class="conf-step__movie-duration">100 минут</p>
                </div>
            </div>

            <div class="conf-step__seances">
                <div id="snaptarget" class="conf-step__seances-hall">
                    <h3 class="conf-step__seances-title">Зал 1</h3>
                    <div class="conf-step__seances-timeline">
                        <div class="conf-step__seances-movie" style="width: 60px; background-color: rgb(133, 255, 137); left: 0;">
                            <p class="conf-step__seances-movie-title">Миссия выполнима</p>
                            <p class="conf-step__seances-movie-start">00:00</p>
                        </div>
                        <div class="conf-step__seances-movie" style="width: 60px; background-color: rgb(133, 255, 137); left: 360px;">
                            <p class="conf-step__seances-movie-title">Миссия выполнима</p>
                            <p class="conf-step__seances-movie-start">12:00</p>
                        </div>
                        <div class="conf-step__seances-movie" style="width: 65px; background-color: rgb(202, 255, 133); left: 420px;">
                            <p class="conf-step__seances-movie-title">Звёздные войны XXIII: Атака клонированных клонов</p>
                            <p class="conf-step__seances-movie-start">14:00</p>
                        </div>
                    </div>
                </div>
                <div id="snaptarget2" class="conf-step__seances-hall">
                    <h3 class="conf-step__seances-title">Зал 2</h3>
                    <div class="conf-step__seances-timeline">
                        <div class="conf-step__seances-movie" style="width: 65px; background-color: rgb(202, 255, 133); left: 595px;">
                            <p class="conf-step__seances-movie-title">Звёздные войны XXIII: Атака клонированных клонов</p>
                            <p class="conf-step__seances-movie-start">19:50</p>
                        </div>
                        <div class="conf-step__seances-movie" style="width: 60px; background-color: rgb(133, 255, 137); left: 660px;">
                            <p class="conf-step__seances-movie-title">Миссия выполнима</p>
                            <p class="conf-step__seances-movie-start">22:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <fieldset class="conf-step__buttons text-center">
                <button class="conf-step__button conf-step__button-regular">Отмена</button>
                <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent">
            </fieldset>
        </div>
    </section>

    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Открыть продажи</h2>
        </header>
        <div class="conf-step__wrapper text-center">
            <p class="conf-step__paragraph">Всё готово, теперь можно:</p>
            <form action="openSales.php" method="post">

                <button class="conf-step__button conf-step__button-accent">Открыть продажу билетов</button>
            </form>
        </div>
    </section>
</main>


<script src="js/jquery-3.4.1.min.js"> </script>
<script src="js/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="js/accordeon.js"></script>
</body>
</html>

