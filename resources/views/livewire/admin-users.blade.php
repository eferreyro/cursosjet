<div>
  <div class="card">
      <div class="card-header">
        <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" type="text" name="" placeholder="Search">
      </div>
@if ($users->count())
          <div class="card-body">
          <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td width="10px">
                        <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Edit</a>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
          </table>
      </div>
      <div class="card-footer">
          {{$users->links()}}
      </div>
      @else
      <div class="card-body">
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Lo sentimos... </strong>  La búsqueda no coincide o es inexistente.
</div>
      </div>
@endif
  </div>

</div>
