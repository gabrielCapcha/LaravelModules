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
    <div id="successSale" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: black; font-size: 18px">Venta exitosa</h5>
            </div>
            <div class="row" style="padding: 10px;">
                <div class="col-6">
                    <a href="#" style="width:100%" class="btn btn-default">REPORTE DE VENTAS</a>
                </div>
                <div class="col-6">
                    <a href="new-sale" style="width:100%" class="btn btn-primary">NUEVA VENTA</a>
                </div>
                <div class="col-6">
                    <a href="#" style="width:100%" class="btn btn-default">GENERAR TICKET</a>
                </div>
                <div class="col-6">
                    <a href="#" style="width:100%" class="btn btn-default">GENERAR PDF-A4</a>
                </div>
                <div class="col-8" style="padding-top: 10px">
                    <input type="text" id="sendSaleEmailAddress" class="form-control" style="width:100%; color: black"/>
                </div>
                <div class="col-4">
                    <a href="#" style="width:100%" class="btn btn-default">ENVIAR POR CORREO</a>
                </div>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
    <div id="modal-on-load" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body" style="color: black">
                    Procesando venta...
                </div>
            </div>
        </div>
    </div>
</section>
@endsection