@extends('sales.partials.layout-sale-document')
@section('main-content')
<section class="content">
    <div class="row">
        <input type="hidden" id="arrayProducts" value="{{ json_encode($jsonResponse->products) }}">
        <div class="col-8">
            <div style="background-color: #343a40; height: 780px">
                <div style="padding: 30px">
                    <div class="row">
                        <div class="col-md-6" style="text-align:center;">
                            <button onClick="searchByCategory(0)" class="btn btn-primary btn-lg">Productos</button>
                        </div>
                        <div class="col-md-6" style="text-align:center;">
                            <button onClick="searchByCategory(1)" class="btn btn-primary btn-lg">Servicios</button>
                        </div>
                    </div>
                    <br>
                </div>
                <div id="productsCards" class="row" style="padding: 10px; overflow: scroll; height:650px;">
                </div>
            </div>
        </div>
        <div class="col-4">
            <div style="background-color: #222a42; text-align: center; height: 550px">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="saleTbody">
                    </tbody>
                </table>
            </div>
            <div class="container" style="background-color: #343a40; text-align: center;">
                <h3 style="color: #e6e6e6;">TIPOS DE PAGO:</h3>
                <div style="padding: 2px">
                    <img id="typePayment_1" onClick="typePayments(1);" class="payment-1-selected"/> <!-- title="PAGO EN EFECTIVO"/> -->
                    <img id="typePayment_2" onClick="typePayments(2);" class="payment-2-unselected"/> <!-- title="PAGO EN VISA"/> -->
                    <img id="typePayment_3" onClick="typePayments(3);" class="payment-3-unselected"/> <!-- title="PAGO EN MASTERCARD"/> -->
                    <img id="typePayment_6" onClick="typePayments(6);" class="payment-6-unselected"/> <!-- title="PAGO EN DEPOSITO"/> -->
                    <img id="typePayment_10" onClick="typePayments(10);" class="payment-10-unselected"/> <!-- title="PAGO EN DEPOSITO"/> -->
                    <img id="typePayment_12" onClick="typePayments(12);" class="payment-12-unselected"/> <!-- title="PAGO EN DEPOSITO"/> -->
                    <img id="typePayment_13" onClick="typePayments(13);" class="payment-13-unselected"/> <!-- title="PAGO EN DEPOSITO"/> -->
                    </div>
                    <div style="padding: 5px">
                    <img id="typePayment_14" onClick="typePayments(14);" class="payment-14-unselected"/> <!-- title="PAGO EN DEPOSITO"/> -->
                    <img id="typePayment_15" onClick="typePayments(15);" class="payment-15-unselected"/> <!-- title="PAGO LUKITA"/> -->
                    <img id="typePayment_16" onClick="typePayments(16);" class="payment-16-unselected"/> <!-- title="PAGO YAPE"/> -->
                    <img id="typePayment_17" onClick="typePayments(17);" class="payment-17-unselected"/> <!-- title="PAGO YAPE"/> -->
                    <img id="typePayment_18" onClick="typePayments(18);" class="payment-18-unselected"/> <!-- title="PAGO YAPE"/> -->
                    <img id="typePayment_19" onClick="typePayments(19);" class="payment-19-unselected"/> <!-- title="PAGO YAPE"/> -->
                </div>
                <div class="container" style="padding: 10px">
                    <h3 style="color: ##222a42;">OPCIONES DE VENTA</h3>
                    <button onClick="clearAllSelectedProduct();" title="Eliminar todos los productos" class="btn btn-danger animation-on-hover">
                        <i class="tim-icons icon-trash-simple"></i>
                    </button>
                    <button onClick="finishNewSale()" title="Finalizar venta" class="btn btn-success animation-on-hover" type="button">
                        <i class="tim-icons icon-wallet-43"></i>
                    </button>
                </div>
            </div>
        </div>
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