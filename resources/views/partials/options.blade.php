@auth
<div class="options">
    <i class="fas fa-ellipsis-v showOptions"></i>
    <div class="options__links">
        <span class="editButton">Editar</span>
        <span class="deleteButton">Eliminar</span>
        @include('partials.form-delete', ["variables" => ['routeName' => $variables['routeName'], 'element' => $variables['element']]])
    </div>
</div>
@endauth