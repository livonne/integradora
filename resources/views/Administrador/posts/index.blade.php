@extends('adminlte::page')

@section('title', 'CRUD Post')

@section('content_header')
<h1>
Publicación nueva
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-post">
        Crear
    </button>
</h1>
@stop

@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de publicaciones</h3>
                </div>
            </div>
        </div>
    </div>
</div>
           
<div class="row">
    <div class="col-12">
        <table id="posts" class="table table-bordered table-striped">
            <thead>
                <tr>
                <!--<th>ID</th>-->
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Municipio</th>
                    <th>Precio</th>
                    <th>Ubicacion</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                <!--<td>{{$post->id}}</td>
                    <td>{{$post->user_id}}</td>-->
                    <td>{{$post->encabezado}} </td>
                    <td>
                        <div class="container">
                            <div class="col-12">
                                {{$post->descripcion}} 
                            </div>
                        </div>
                    </td>
                    <td>{{$post->category->titulo}}</td>
                    <td>{{$post->precio}} </td>
                    <td>{{$post->ubicacion}} </td>
                    <td>
                    <img src="{{asset($post->featured)}}" alt="{{ $post->title }}" class="img-fluid" width="100px">
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                            <div class="" style="margin: 5px;">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-update-post-{{$post->id}}">
                                    <img src="{{ asset('images/iconos/editar.png') }}" width="20" height="20"  class="icon-table">
                                </button>
                            </div>
                            <div class="" style="margin: 5px;">
                                <form  action="{{route('Administrador.posts.delete', $post->id)}}" class="formulario-eliminar" method="post">
                                   <!--<a   href="#"  onclick="return confirm('¿Estás seguro que deseas eliminar el post?');" >-->
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <button  id="btnPromt" class="btn btn-danger"><img src="{{ asset('images/iconos/eliminar.png') }}" width="20" height="20"  class="icon-table"></button>
                                    <!--</a>-->
                                </form>
                            </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
                    @include('Administrador.posts.modal-update-post')
                        @endforeach
        </table>
            
      

<!-- modal -->
<div class="modal fade" id="modal-create-post">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear publicación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>

            <form action="{{ route('Administrador.posts.store') }}" method="POST" enctype="multipart/form-data"> 
                {{ csrf_field() }}
            <div class="modal-body">

                <div class="form-gorup">
                    <label for="encabezado">Titulo o encabezado </label>
                    <input type="text" name="encabezado" class="form-control" id="encabezado" type="text" name="encabezado" placeholder="Titulo" required>
                </div>

                <div class="form-gorup">
                    <label for="descripcion"> Descripcion del cuarto</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" cols="20" rows="5"  placeholder="categoria" required > </textarea>
                </div>

                <div class="form-gorup">
                    <label for="category-id">Municipio</label>
                    <select name="category_id" id="category-id" class="form-control" type="text" name="Municipio"  placeholder="categoria" required> 
                        <option value=""> Seleccionar Municipio</option>
                        @foreach ($categories as $category)
                        <option value ="{{$category->id}}">{{$category->titulo}} </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-gorup">
                    <label for="precio">Precio de renta </label>
                    <input type="text" name="precio" class="form-control" id="precio" type="text" name="Precio" placeholder="Precio" required>
                </div>
                
                <div class="form-gorup">
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" name="ubicacion" class="form-control" id="ubicacion"  type="text" name="Ubicación" placeholder="Ubicación" required>
                </div>

                <div class="form-group">
                   <label for="featured">Imagen principal</label>
                   <input type="file" name="featured" class="form-control" id="featured" type="text" name="imagen"  placeholder="imagen" required>
               </div>

            </div>
            <div class="modal-footer justify-content-between">

                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
              
               <!-- <a  href="#"  onclick="return confirm('¿Estás seguro que deseas agregar este post?');" >-->
                    <button type="submit" class="btn btn-outline-primary boton-actualizar">Guardar</button>
                <!--</a>-->
            </div>
            </form>

        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@stop


<!--ALERTAS PARA POST DE ELIMINAR Y ACTUALIZAR-->

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
    $('#posts').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>

@stop()




<!--ALERTA DE ACTUALIZAR-->






