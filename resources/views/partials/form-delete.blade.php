@auth
    
<form class="alert" action="{{route($variables['routeName'].'.delete.'.$variables['routeName'], $variables['element']->url)}}" method="post">
    @csrf
    @method('DELETE')
    <div class="warn">
        <h2>Desea eliminar el elemento {{$variables['element']->title}}</h2>
        <button type="submit" class="deleteButton">Eliminar</button>
    </div>
</form>
@endauth