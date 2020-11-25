@extends('product.partials.layout-product')
@section('main-content')
<section class="content">
    <div class="row">
        <input id="listOfSales" type="hidden" value="{{ $jsonResponse->sales }}">
        <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#createProductModal">
            <i class="tim-icons icon-simple-add"></i>   Nuevo producto
        </button>
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th class="text-center">#</th>
                    <th>Cliente</th>
                    <th>Tipo de comprobante</th>
                    <th>Ticket</th>
                    <th>Total</th>
                    <th>Sub total</th>
                    <th>IGV</th>
                    <th>Tipo de pago</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 0;
                @endphp
                @foreach($jsonResponse->sales as $sale)
                @php
                    $count++;
                    if ($sale->sal_type_document_id == 0) {
                        $typeDocument = 'PRECUENTA';
                    } elseif ($sale->sal_type_document_id == 1) {
                        $typeDocument = 'BOLETA';
                    } else {
                        $typeDocument = 'FACTURA';
                    }
                  
                  
                    if(!is_null($sale->sal_type_document_id)){
                        switch($sale->sal_type_document_id){
                            case 1:
                                $typeDocument = 'EFECTIVO';
                            break;
                            case 2:
                                $typeDocument = 'VISA';
                            break;
                            case 3:
                                $typeDocument = 'MASTERCARD';
                            break;
                            case 4:
                                $typeDocument = 'PAGO A CUOTAS';
                            break;
                            case 5:
                                $typeDocument = 'PAGO MIXTO';
                            break;
                            case 6:
                                $typeDocument = 'DEPOSITO/TRANSFERENCIA';
                            break;
                            case 7:
                                $typeDocument = 'CHEQUE FINANCIERO';
                            break;
                            case 8:
                                $typeDocument = 'CREDITO';
                            break;
                            case 9:
                                $typeDocument = 'LETRA';
                            break;
                            case 10:
                                $typeDocument = 'IZIPAY';
                            break;
                            case 11:
                                $typeDocument = 'OTRO';
                            break;
                            case 12:
                                $typeDocument = 'GLOVO';
                            break;
                            case 13:
                                $typeDocument = 'RAPPI';
                            break;
                            case 14:
                                $typeDocument = 'VENDEMAS';
                            break;
                            case 15:
                                $typeDocument = 'LUKITA';
                            break;
                            case 16:
                                $typeDocument = 'YAPE';
                            break;
                            case 17:
                                $typeDocument = 'TUNKI';
                            break;
                            case 18:
                                $typeDocument = 'AMERICAN EXPRESS';
                            break;
                            case 19:
                                $typeDocument = 'PLIM';
                            break;
                        }
                        

                @endphp

                
                
                <tr class="text-center">
                    <td class="text-center">{{ $count }}</td>
                    <td>{{ $sale->data_client['lastnames'] }}</td>
                    <td>{{ $typeDocument }}</td>
                    <td>{{ $sale->ticket }}</td>
                    <td>S/. {{ $sale->amount }}</td>
                    <td>S/. {{ $sale->sub_total }}</td>
                    <td>S/. {{ $sale->taxes }}</td>
                    <td>S/. {{ $type_payment }}</td>
                    <td class="td-actions text-center">
                        <button onClick="editProductModal()" type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                            <i class="tim-icons icon-pencil"></i>
                        </button>
                        <button onClick="" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal -->
    
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