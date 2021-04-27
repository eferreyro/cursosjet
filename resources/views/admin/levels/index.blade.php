@extends('adminlte::page')

@section('title', 'SysQA Tests')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('admin.levels.create') }}">Nuevo Nivel</a>
    <h1>Lista de Niveles</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>

    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>{{ $level->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary
                                   " href="{{ route('admin.levels.edit', $level) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form method="POST" action="{{ route('admin.levels.destroy', $level) }}"
                                    class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

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
