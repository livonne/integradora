<div class="modal fade" id="modal-update-post-{{$post->id}}">
        <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Publicación</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                     <form action="{{ route('Administrador.posts.update', $post->id) }}" method="POST" class="boton-actualizar" enctype="multipart/form-data"> 
                         {{ csrf_field() }}
             
                <div class="modal-body">
               
                 <!--PARA MODIFICAR EL TITULO O ENCABEZADO-->
                
                 <div class="form-gorup">
                    <label for="encabezado">Titulo o encabezado</label>
                    <input type="text" name="encabezado" class="form-control" id="encabezado" value="{{$post->encabezado}}">
                </div>

                <!--PARA MODIFICAR EL CONTENIDO DEL POST-->
                <div class="form-group" >
                        <label for="descripcion">Descripcion del cuarto</label>
                            <textarea name="descripcion" class="form-control" id="descripcion" cols="20" rows="5" required>{{$post->descripcion}}</textarea>
                </div>

                <!--PARA MODIFICAR LA CATEGORIA-->

                <div class="form-group">
                        <label for="category_id">Municipio</label>
                        <select name="category_id" id="category-id" class="form-control" type="text" name="categoria"  placeholder="categoria" required>
                       <option value=""> Elegir Municipio</option>
                       @foreach($categories as $category)
                        <option value="{{$category->id}}" <?= $category->id == $post->category->id ? 'selected': '' ?> > {{$category->titulo}} </option>
                       @endforeach
                    </select>
                </div>

             
                
             <!--PARA MODIFICAR EL PRECIO-->
                <div class="form-gorup">
                    <label for="precio">Precio de renta</label>
                    <input type="text" name="precio" class="form-control" id="precio" value="{{$post->precio}}">
                </div>

             


             <!--PARA MODIFICAR LA UBICACION PENDIENTEEE EL GOOGLE-->
                <div class="form-gorup">
                    <label for="ubicacion">Ubicación del cuarto</label>
                    <input type="text" name="ubicacion" class="form-control" id="ubicacion" value="{{$post->ubicacion}}">
                </div>

                <div class="form-group">
                       <!--PARA CAMBIAR TITULO DEL POST--> 
                            <label for="featured">Imagen principal</label>
                            <input type="file" name="featured" class="form-control" id="featured" >
                            <small>imagen actual</small> <br>
                            <img src="{{asset($post->featured)}}"  width="80px" class="img-fluid img-thumbnail" alt="{{$post->featured}}">
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                <!--<a   href="#"  onclick="return confirm('¿Estás seguro que deseas guardar los?');" >-->
                <button type="submit" class="btn btn-outline-warning boton-actualizar">Guardar</button>
                <!--</a>-->
            </div>
            </form>

        </div>
      <!-- /.modal-content -->
    </div>
</div>