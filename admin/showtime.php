<?php
require '../config/rb.php';
$db = require '../config/config_db.php';
require '../config/functions.php';
R::setup($db['dsn'], $db['user'], $db['pass']);
if(isset($_POST['time'])) {
    $seanses = R::dispense('seanses');
    $seanses->time = $_POST['time'];
    $seanses->hall_number = $_POST['hall_number'];
    $id = R::store($seanses);
}
//header('Location: index.php');

?>
<div class="popup">
  <div class="popup__container">
    <div class="popup__content">
      <div class="popup__header">
        <h2 class="popup__title">
Добавление сеанса
<a class="popup__dismiss" href="#"><img src="i/close.png" alt="Закрыть"></a>
        </h2>

      </div>
      <div class="popup__wrapper">
        <form action="showtime.php" method="post" accept-charset="utf-8">
<!--          <label class="conf-step__label conf-step__label-fullsize" for="hall">-->
<!--Название зала-->
<!--<select class="conf-step__input" name="hall" required>-->
<!--              <option value="1" selected>Зал 1</option>-->
<!--              <option value="2">Зал 2</option>-->
<!--            </select>-->
<!--          </label>-->
          <label class="conf-step__label conf-step__label-fullsize" for="name">
Время начала
<input class="conf-step__input" type="time" value="00:00" name="time" required>
          </label>

          <label class="conf-step__label conf-step__label-fullsize" for="name">
Название зала
<input class="conf-step__input" type="text" placeholder="Например, &laquo;Зал 1&raquo;" name="hall_number" required>
          </label>

          <div class="conf-step__buttons text-center">
            <input type="submit" value="Добавить" class="conf-step__button conf-step__button-accent">
            <button class="conf-step__button conf-step__button-regular">Отменить</button>
          </div>
        </form>
          <button onclick="location.href = 'index.php'">Назад</button>
      </div>
    </div>
  </div>
</div>