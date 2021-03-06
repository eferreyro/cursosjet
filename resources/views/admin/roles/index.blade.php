@extends('adminlte::page')

@section('title', 'Coders Free')

@section('content_header')
    <h1>Lista de Roles</h1>
@stop

@section('content')

@if (session('info'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Hecho!</strong> {{session('info')}}
</div>

@endif

    <div class="card">
        <div class="card-header">
            
            <a href="{{route('admin.roles.create')}}">
            <span>  <i class="fas fa-plus-circle"></i>
            </span>
            Crear Rol
            </a>
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
                        <td width="10px">
                            <a class="btn btn-secondary" href="{{route('admin.roles.edit', $role)}}">Edit</a>
                        </td>
                        <td width="10px">
                        <form action="{{route('admin.roles.destroy', $role)}}" method="POST" class="delete-form">
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
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('.delete-form').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Confirmacion requerida',
                text: "Estas a punto de eliminar una entrada",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })


        });

    </script>
@stop