const headers = Array.from(document.querySelectorAll('.conf-step__header'));
headers.forEach(header => header.addEventListener('click', () => {
  header.classList.toggle('conf-step__header_closed');
  header.classList.toggle('conf-step__header_opened');
}));
$(document).ready(function () {
  //Для ADD HALL POP UP
  $( "#opener" ).on( "click", function() {
    $( "#addHall" ).addClass( "active" ).removeClass('popup');
  });
  $( "#close" ).on( "click", function() {
    $( "#addHall" ).addClass( "popup" ).removeClass('active');
  });
  $( "#closeAddHallPopup" ).on( "click", function() {
    $( "#addHall" ).addClass( "popup" ).removeClass('active');
  });

  //Для ADD MOVIE POP UP
  $( "#openerMovie" ).on( "click", function() {
    $( "#addMovie" ).addClass( "active" ).removeClass('popup');
  });
  $( "#closeMovie" ).on( "click", function() {
    $( "#addMovie" ).addClass( "popup" ).removeClass('active');
  });
  // $( "#closeAddMoviePopup" ).on( "click", function() {
  //   $( "#addHall" ).addClass( "popup" ).removeClass('active');
  // });
//Скрипт смены флажков стандарт-вип-неактивно
  $('.conf-step__chair').each(function() {
    $(this).on("click", function () {
      $(this).toggleClass(function () {
        if($(this).hasClass('conf-step__chair_disabled')) {
          return 'conf-step__chair_disabled conf-step__chair_standart';
        } else if ($(this).hasClass('conf-step__chair_standart')) {
          return 'conf-step__chair_vip conf-step__chair_standart';
        } else {
          return 'conf-step__chair_vip conf-step__chair_disabled'
        }

      });


    })

  })

  //Перетаскивание фильмов в сетку
  $( '#draggable' ).draggable({ snap: '#snaptarget', snapMode: 'inner'});
  $( '#draggable2' ).draggable({ snap: '#snaptarget', snapMode: 'inner'});
  $( '#draggable3' ).draggable({ snap: '#snaptarget', snapMode: 'inner'});
  $( '#draggable4' ).draggable({ snap: '#snaptarget', snapMode: 'inner'});
  $( '#draggable5' ).draggable({ snap: '#snaptarget', snapMode: 'inner'});
  $( '#draggable6' ).draggable({ snap: '#snaptarget', snapMode: 'inner'});

  $('#snaptarget').droppable({
    drop:function (event,ui) {
      ui.draggable.find('img').remove();
      ui.draggable.find('p').remove();
      ui.draggable.find('h3').css("font-size", "10px");
      ui.draggable.css("padding", 0);
      ui.draggable.css("margin", 0);
      ui.draggable.animate({
        width: "50px",
        height: "50px"
      });
    }

  });

  $('#snaptarget2').droppable({
    drop:function (event,ui) {
      ui.draggable.find('img').remove();
      ui.draggable.find('p').remove();
      ui.draggable.find('h3').css("font-size", "10px");
      ui.draggable.css("padding", 0);
      ui.draggable.css("margin", 0);
      ui.draggable.animate({
        width: "50px",
        height: "50px"
      });


    }

  });

  $(".conf-step__seances-hall").mouseover(function () {
    location.href = 'showtime.php';
  })

});