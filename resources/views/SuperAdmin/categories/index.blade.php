@extends('adminlte::page')

@section('title', 'CRUD Categorías')

@section('content_header')
<h1>
    Titulos
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
        Crear
    </button>
</h1>
@stop


@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-12">
            <div class="card">
                
                <div class="card-header">
                    <h3 class="card-title">Listado de  municipios</h3>
                </div>
            <!-- /.card-header -->

            <div class="card-body" >
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Municipio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td >{{$category->id}}</td>
                            <td>{{$category->titulo}} </td> 
                            <td>

                            <div class="row">
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-category-{{$category->id}}">
                                        <img src="{{ asset('images/iconos/editar.png') }}" width="20" height="20"  class="icon-table">
                                    </button>
                                </div>
                            <div class="col-sm-3">
                                <form action="{{route('SuperAdmin.categories.delete', $category->id)}}" class="formulario-eliminar" method="post">
                            
                                {{ csrf_field() }}
                                @method('delete')
                                <button class="btn btn-danger"><img src="{{ asset('images/iconos/eliminar.png') }}" width="20" height="20"  class="icon-table"> </button>
                                </form>
                            </div>


                            
                            </td>
                        </tr>
                        <!-- modal update category -->
                    @include('SuperAdmin.categories.modal-update-category')
         <!-- /.modal-dialog -->
<!-- /.modal -->
                        @endforeach
                        
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Municipio</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>

            <form action="{{ route('SuperAdmin.categories.store') }}" method="POST"> 
                {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-gorup">
                    <label for="titulo"> Categoría</label>
                    <input type="text" name="titulo" class="form-control" id="titulo" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-outline-primary">guardar</button>
            </div>
            </form>

        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@stop

@section('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if(session('nuevo') == 'ok')
    <script>
     Swal.fire(
        '¡Creado!',
        'Tu post ha sido creado',
        'Exitoso'
    )
    </script>


@endif

@if(session('actualizar') == 'ok')
    <script>
     Swal.fire(
        '¡Actualizado!',
        'Tu post ha sido actualizado',
        'Exitoso'
    )
    </script>


@endif

<script> 
    $('.boton-actualizar').submit(function(e){
        e.preventDefault();

        Swal.fire({
    title: '¿Estas seguro?',
    text: "¡Este post se actualizara!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Si, actualizar!',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
       
        this.submit();
    }
    })
    
    });


</script>


@if(session('eliminar') == 'ok')
    <script>
     Swal.fire(
        '¡Eliminado!',
        'Tu post ha sido eliminado',
        'Exitoso'
    )
    </script>


@endif

<script> 
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();

        Swal.fire({
    title: '¿Estas seguro?',
    text: "!Este post se eliminara definitivamente!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: '¡Si, eliminar!',
    cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.isConfirmed) {
       
        this.submit();
    }
    })
    
    });


</script>

@stop()


@section('js')
<script>
$(document).ready(function() {
    $('#categories').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop