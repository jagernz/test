@extends('layouts.index')

  @section('content')

      {{--<ul class="list-group">--}}
            {{--<li class="list-group-item">Достали из базы {{$user->id}}-го юзера с именем {{$user->name}}</li>--}}
      {{--</ul>--}}

      <div class="container">

      </div>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Перерыв в работе</h4>
            </div>

            <div class="modal-body">
              <form method="post" id="myForm">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="message-text" class="control-label">Комментарий о причине перерыва</label>
                  <textarea class="form-control" id="message-text" name="comment"></textarea>
                </div>
                <input type="hidden" value="{{ $user->id  }}" id="getUserId">
                <input type="hidden" value="{{ $now }}" id="getResTime">
                <input type="hidden" value="{{ $day }}" id="getResDay">
                <div class="modal-footer">
                  <button type="button" class="btn btn-info" id="saveComment">Отправить комментарий</button>
                  <button type="button" class="btn btn-primary" id="continueWork">Продолжить работу</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>


@endsection