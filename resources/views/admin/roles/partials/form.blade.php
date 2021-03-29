<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control '. ($errors->has('name')? 'is-invalid' : ''), 'placeholder="Nombre del Rol"']) !!}
        @error('name')
            <span class="invalid-feedback">
            <strong> El campo Nombre es obligatorio</strong>
        @enderror
</div>

<strong>Permisos</strong>
<br>
    @error('permissions')
        <small class="text-danger">
            <strong>{{$message}}</strong>
        </small>
                    
    @enderror
@foreach ($permissions as $permission)
    <div>
       <label>
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
        {{$permission->name}}
        </label>
    </div>
@endforeach

