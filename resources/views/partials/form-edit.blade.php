@auth
    <div class="form-container edit disabled"  id="{{ $var->url }}">
        <form action="{{ route($routeName.'.update.'.$routeName, $var->url) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="wrap-custom-file">
                <input id="img{{$var->id}}" type="file" class="inputImg" name="img" accept=".jpg">
                <label for="img{{$var->id}}" title="Selecciona una imagen" class="file-ok" style="background-image: url({{ asset('img/uploads') }}/{{$var->pathImg}}/{{ $var->img }}" alt="{{ $var->img }})">
                    <span>{{ $var->img }}</span>
                </label>
            </div>
            @foreach ($variables['inputs'] as $input)
            <label for="{{$input['name']}}">{{$input['labelName']}}</label>
            <input type="text" name="{{$input['name']}}" id="{{$input['name']}}" value="{{ $var->title }}">
            @endforeach
            @isset($modelCourtain)
            <input type="hidden" value="{{$modelCourtain['url']}}" name="model"> 
            <h6>{{$modelCourtain['title']}}</h6>
            @endisset
            <div class="buttons">
                <button type="submit">Guardar</button>
                <span class="buttonCancel">Cancelar</a>
            </div>
        </form>
    </div>
@endauth
    