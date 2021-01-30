<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2">Contestar mensaje</h4>
</div>
<div class="row">
    <form id="form-upsert" action="{{route('admin_contactMessages_answer',['messageId' => $message->id])}}"
          class="d-flex flex-column align-items-center w-100"
          method="post">
        @csrf
        <div class="row w-75">
            <div class="col-12">
                <p><strong>Nombre: </strong>{{$message->name}}</p>
                <p><strong>Correo electrónico: </strong>{{$message->email}}</p>
                <p><strong>Mensaje: </strong>{{$message->message}}</p>
            </div>
            <div class="col-12">
                <div class="form-group focused">
                    <label for="answer"  class="focused form-label">Respuesta</label>
                    <textarea rows="3" class="form-control" autocomplete="off" id="answer" name="answer"></textarea>
                    <span class="invalid-feedback">{{ $errors->first('answer') }}</span>
                </div>
            </div>
        </div>
        <div class="form-group text-center w-75">
            <button type="submit" class="btn btn-primary">
                Contestar
            </button>
        </div>
    </form>
</div>
