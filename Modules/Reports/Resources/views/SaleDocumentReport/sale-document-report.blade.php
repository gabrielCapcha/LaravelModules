@extends('product.partials.layout-product')
@section('main-content')
<section class="content">
    <div class="row">
        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#createProductModal">
            <i class="tim-icons icon-simple-add"></i>   Nuevo producto
        </button>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th class="text-center">#</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black">Agregar nuevo producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="productName">NOMBRE</label>
                        <input class="form-control" type="text" id="productName" name="productName" placeholder="Ingrese nombre del producto">
                        <br>
                        <label for="productName">PRECIO</label>
                        <input class="form-control" type="number" id="productPrice" name="productPrice" placeholder="Ingrese el precio del producto">
                    </div>
                    <div class="col-6">
                        <label for="productName">CÓDIGO</label>
                        <input class="form-control" type="text" id="productCode" name="productCode" placeholder="Ingrese código del producto">
                        <br>
                        <label for="productName">CATEGORÍA</label>
                        <select class="form-control" name="" id="productCategory">
                            <option value="0">Producto</option>
                            <option value="1">Servicio</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" id="productDescription" cols="30" rows="10" placeholder="Ingrese una descripción"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" data-dismiss="modal" onClick="createNewProduct()" class="btn btn-primary">Guardar</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black">Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="productName">NOMBRE</label>
                        <input class="form-control" type="text" id="editProductName" placeholder="Ingrese nombre del producto">
                        <br>
                        <label for="productName">PRECIO</label>
                        <input class="form-control" type="number" id="editProductPrice" placeholder="Ingrese el precio del producto">
                    </div>
                    <div class="col-6">
                        <label for="productName">CÓDIGO</label>
                        <input class="form-control" type="text" id="editProductCode"  placeholder="Ingrese código del producto">
                        <br>
                        <label for="productName">CATEGORÍA</label>
                        <select class="form-control" id="editProductCategory">
                            <option value="0">Producto</option>
                            <option value="1">Servicio</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" id="editProductDescription" cols="30" rows="10" placeholder="Ingrese una descripción"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onClick="saveProduct()" data-dismiss="modal" class="btn btn-primary">Guardar</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black">Eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
               ¿Estás seguro que deseas eliminar este producto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection