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