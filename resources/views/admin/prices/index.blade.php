@extends('adminlte::page')

@section('title', 'SysQA Tests')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.prices.create')}}">Nuevo Precio</a>
    <h1>Lista de Precios</h1>
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
                   @foreach ($prices as $price)
                   <tr>
                       <td>{{$price->id}}</td>
                       <td>{{$price->name}}</td>
                       <td width="10px">
                           <a class="btn btn-primary" href="{{route('admin.prices.edit', $price)}}">Editar</a>
                       </td>
                       <td width="10px">
                          <form method="POST" action="{{route('admin.prices.destroy', $price)}}">
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
    <script> console.log('Hi!'); </script>
@stop