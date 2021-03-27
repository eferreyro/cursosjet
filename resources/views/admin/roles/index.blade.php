@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}">Crear curso</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($roles as $role)
                     <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{route('admin.roles.edit', $role)}}">Edit</a>
                        </td>
                        <td>
                        <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                   @empty
                       <tr>
                           <td colspan="4"> No hay roles registrados</td>
                       </tr>
                   @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop