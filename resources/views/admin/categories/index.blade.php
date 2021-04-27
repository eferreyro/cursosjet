@extends('adminlte::page')

@section('title', 'SysQA Tests')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.categories.create') }}">Nueva Categoria</a>
    <h1>Lista de Categorias</h1>
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
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>

                            <td>{{ $category->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm"
                                    href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                    class="delete-form">
                                    @csrf

                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
