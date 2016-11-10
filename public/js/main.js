
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

    jQuery('#myModal').modal('hide');

    /*
      Вытягиваем данные из скрытых инпутов
     */
    var $userId = jQuery('#getUserId').val();
    var $comment = jQuery('#message-text').val();
    var $date = jQuery('#getResTime').val();
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
        time: $date,
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
          jQuery('body>.container').append('<p class="alert-danger">'+ $name +' ушла на перерыв в '+$time+'</p>');
        }
      }
    });


});

  /*
   Происходит AJAX-запрос, идет запись в базу данных и паралельно
   в DOM вставлям строчку о начале отсчета рабочего времени
   */
  jQuery('.start').on('click', function () {

    var $user_id = $(this).data('id');

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
          jQuery(this).remove();
        }
      }
    });


  });


});