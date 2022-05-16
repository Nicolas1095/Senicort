@auth
    
<div class="form-container create disabled">
    <form action="{{ route($routeName.'.store.'.$routeName)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="wrap-custom-file">
            <input id="img" class="inputImg" type="file" name="img" accept=".jpg">
            <label for="img" title="Selecciona una imagen">
                <span>Selecciona una imagen</span>
            </label>
        </div>
        @foreach ($variables['inputs'] as $input)
        <label for="{{$input['name']}}">{{$input['labelName']}}</label>
        <input type="text" name="{{$input['name']}}" id="{{$input['name']}}" value="{{ old($input['name']) }}">
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
    
    <div class="elementos__elemento add">
        <i class="fas fa-plus"></i>
    </div>
    @endauth