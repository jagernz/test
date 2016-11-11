
/*
  Все выполняется поле загрузки всего документа
 */
jQuery(document).ready( function() {
   /*
   По клику на перерыв вызываем модальное окно с возможностью
   взять перерыв и оставить свой комментарий
   */
  jQuery('.stop').on('click', function () {
    jQuery('#myModal').modal('show');
  });

  /*
   Происходит AJAX-запрос, идет запись в базу данных и паралельно
   в DOM вставлям строчку о с записью о перерыве и прячем модальное окошко
   */
  jQuery('#saveComment').on('click', function () {

    /*
      Вытягиваем данные из скрытых инпутов
     */
    var $userId = jQuery('#getUserId').val();
    var $comment = jQuery('#message-text').val();
    var $day = jQuery('#getResDay').val();

    /*
      формируем Ajax-запрос
     */
    jQuery.ajax({
      url: '/sentComment',
      type: 'POST',
      dataType: 'JSON',
      data: {
        _token: $('meta[name="_token"]').attr('content'),
        id: $userId,
        comment: $comment,
        day: $day
      },
      /*
        Обрабатываем то что пришло в случае успешного ответа от
        сервера и вставляем в DOM
       */
      success: function (e) {
        if(e){
          var $name = e.user;
          var $time = e.now;
          jQuery('body>.container').append('<p class="alert-danger">'+ $name +' уходит на перерыв в '+$time+'</p>');
        }
      }
    });

    /*
      Дизейблим кнопку оставить комментарий
     */
    jQuery(this).attr('disabled',true);
    jQuery('textarea').hide();


  });

  /*
   Происходит AJAX-запрос, идет запись в базу данных и паралельно
   в DOM вставлям строчку о начале отсчета рабочего времени
   */
  jQuery('.start').on('click', function () {

    var $user_id = jQuery(this).data('id');

    /*
     формируем Ajax-запрос
     */
    jQuery.ajax({
      url: '/startWork',
      type: 'POST',
      dataType: 'JSON',
      data: {
        _token: $('meta[name="_token"]').attr('content'),
        id: $user_id
      },
      /*
       Обрабатываем то что пришло в случае успешного ответа от
       сервера и вставляем в DOM
       */
      success: function (e) {
        if(e){
          var $time = e.time;
          jQuery('body>.container').append('<p class="alert-info"> Старт работы в '+ $time +'</p>');
        }
      }
    });

    /*
     Дизейблим возможность еще раз стартовать
     */
    jQuery(this).parents().addClass('disabled');

  });



  /*
   Происходит AJAX-запрос, в данный момент апдейтится запись о перерыве
   в базе данных, таким образом фиксируется что перерыв окончен
    */
  jQuery('#continueWork').on('click', function () {

    var $user_id = jQuery('#getUserId').val();
    var $day = jQuery('#getResDay').val();

    /*
     формируем Ajax-запрос
     */
    jQuery.ajax({
      url: '/endOfRest',
      type: 'POST',
      dataType: 'JSON',
      data: {
        _token: $('meta[name="_token"]').attr('content'),
        id: $user_id,
        day: $day
      },
      /*
       Обрабатываем то что пришло в случае успешного ответа от
       сервера и вставляем в DOM
       */
      success: function (e) {
        if(e){
          var $time = e.now;
          var $name = e.user;
          jQuery('body>.container').append('<p class="alert-danger">'+ $name +' приходит с перерыва в '+$time+'</p>');
        }
      }
    });

    /*
     Дизейблим модальное окно
     */
    jQuery('#myModal').modal('hide');
    jQuery('#saveComment').removeAttr('disabled');
    jQuery('textarea').val('');
    jQuery('textarea').show();
  });



  /*
   Происходит AJAX-запрос, который записывает в текущий день конец рабочего времени
   и сигнализирует об этом пользователя в DOM
   */
  jQuery('.end').on('click', function () {

    var $user_id = jQuery('#getUserId').val();
    var $day = jQuery('#getResDay').val();

    /*
     формируем Ajax-запрос
     */
    jQuery.ajax({
      url: '/end',
      type: 'POST',
      dataType: 'JSON',
      data: {
        _token: $('meta[name="_token"]').attr('content'),
        id: $user_id,
        day: $day
      },
      /*
       Обрабатываем то что пришло в случае успешного ответа от
       сервера и вставляем в DOM
       */
      success: function (e) {
        if(e){
          var $message = 'Конец рабочего дня';
          jQuery('body>.container').append('<p class="alert-info">'+$message+'</p>');
        }
      }
    });

  });



});