<script src="{{ asset('/black-dashboard/assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('/black-dashboard/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('/black-dashboard/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('/black-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ asset('/black-dashboard/assets/js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('/black-dashboard/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('/black-dashboard/assets/js/black-dashboard.min.js?v=1.0.0') }}" type="text/javascript"></script>
<!-- Black Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('/black-dashboard/assets/demo/demo.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
    var products = [];
    var data = {};
    var companyData = JSON.parse(document.getElementById('companyData').value);
    data.client = {};
    data.dataClient = {};
    data.products = [];
    data.typePayment = 1;
    var selectedProducts = [];
    var totalAmount = 0;
    var typePaymentNames = {
                1 : { "name": "EFECTIVO", "type": "number", "htmlId": "cashInputValue", "selected": true, "additionalBox": false, "readOnly": false, "exchange": true },
                2 : { "name": "VISA", "type": "number", "htmlId": "visaInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                3 : { "name": "MASTERCARD", "type": "number", "htmlId": "mastercardInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                6 : { "name": "DEPÓSITO", "type": "number", "htmlId": "depositInputValue", "selected": false, "additionalBox": true, "readOnly": false, "exchange": false },
                8 : { "name": "CRÉDITO", "type": "text", "htmlId": "creditInputValue", "selected": false, "additionalBox": true, "readOnly": false, "exchange": false },
                10 : { "name": "IZIPAY", "type": "number", "htmlId": "izipayInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                12 : { "name": "GLOVO", "type": "number", "htmlId": "glovoInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                13 : { "name": "RAPPI", "type": "number", "htmlId": "rappiInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                14 : { "name": "VENDEMAS", "type": "number", "htmlId": "vendemasInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                15 : { "name": "LUKITA", "type": "number", "htmlId": "lukitaInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                16 : { "name": "YAPE", "type": "number", "htmlId": "yapeInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                17 : { "name": "TUNKI", "type": "number", "htmlId": "tunkiInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                18 : { "name": "AMERICAN EXPRESS", "type": "number", "htmlId": "americanExpressInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
                19 : { "name": "PLIM", "type": "number", "htmlId": "plimInputValue", "selected": false, "additionalBox": false, "readOnly": false, "exchange": false },
    };
    
    if (companyData.flag_a4_document == true && companyData.flag_report == true) {
        document.getElementById("pdfA4").classList.add("col-6");
        document.getElementById("reportSales").classList.add("col-6");
    } else {
        if (companyData.flag_a4_document == true) {
            document.getElementById("pdfA4").classList.add("col-12");
        }
        if (companyData.flag_report == true) {
            document.getElementById("reportSales").classList.add("col-12");
        }
    }
    mapArrayProducts = function(array){
        array.forEach(element => {
            products[element.id] = element;
        });
    }

    finishNewSale = function (){
        
        typeDocument = document.getElementById("type-document").value;
        selectedProducts.forEach(element => {
            totalAmount = parseInt(totalAmount) + parseInt(element.price);
        });
        var dataSale = {
            "sal_type_document_id": typeDocument,
            "sal_type_payment": data.typePayment,
            "amount": totalAmount,
            "sal_series": 1,
            "discount": 0,
            "data_client":{
                "dni": data.dataClient.dni,
                "ruc": null,
                "customer_id": null,
                "names": data.dataClient.nombres,
                "lastnames": data.dataClient.apellidoPaterno + ' ' + data.dataClient.apellidoMaterno,
            },
            "items": selectedProducts,
        }
        $.ajax({
            method: "POST",
            url: "/api/sale-document",
            context: document.body,
            data: dataSale,
            statusCode: {
                400: function() {
                    alert("Hubo un error en la venta.");
                }
            }
        }).done(function(response) {
            $('#successSale').modal({ backdrop: 'static', keyboard: false });
            /* $('#successSale').modal({ backdrop: 'static', keyboard: false }); */
        });
        console.log(dataSale)
    }

    searchByCategory = function(categoryID){
        var dataSearch = { "category": categoryID };
        $.ajax({
            method: "GET",
            url: "/api/product",
            context: document.body,
            data: dataSearch,
            statusCode: {
                400: function() {
                    alert("Ocurrió un error.");
                }
            }
        }).done(function(response) {
            data.products = response;
            mapArrayProducts(data.products);
            var tbody = document.getElementById("productsCards");
            var divinnerHTML = '';
            data.products.forEach(element => {
                divinnerHTML_ = '<div id="card_' + element.id + '" class="col-3">'+
                                    '<div class="card">'+
                                    '<img class="card-img-top" src="{{ asset("/img/hair.jpg") }}" alt="Card image cap">'+
                                    '<div class="card-body" style="text-align: center">'+
                                        '<h4 class="card-title">' + element.name + '</h4>'+
                                        '<p class="card-text">Stock: ' + element.stock + '</p>'+
                                        '<p class="card-text">' + element.description + '</p>'+
                                        '<button onClick="addSelectedProduct(' + element.id + ')" class="btn btn-primary">Agregar</button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                divinnerHTML = divinnerHTML + divinnerHTML_;
            });
            tbody.innerHTML = divinnerHTML;
        });
    }

    typePayments = function(id) {
            data.typePayment = id;
            var selectedPayment = typePaymentNames[id];
            var paymentButton = document.getElementById("typePayment_" + id);
            for (let index = 1; index < 20; index++) {
                if (index != id) {
                    disableButton = document.getElementById("typePayment_" + index);
                    if (disableButton != null) {
                        disableButton.className = 'payment-' + index + '-unselected';
                    }
                }
            }
            if (data.typePayment.name == selectedPayment.name) {
                paymentButton.className = 'payment-' + id + '-unselected';
            } else {
                data.typePayment = selectedPayment;
                paymentButton.className = 'payment-' + id + '-selected';
            }
            console.log("tipo de pago",data.typePayment);
    }

    addSelectedProduct = function(id) {
        product = products[id];
        document.getElementById('product_'+id);
        tBody = document.getElementById('saleTbody');
        var tr = document.createElement('tr');
        tr.setAttribute("id", "row_" + product.id);
        tr.setAttribute("style", "font-size:10px;");
        var trinnerHTML_ = '<td class="static-table-td" onClick="showProductDetail('+ product.id +')"><strong style="cursor:pointer;">' + product.code + '</strong></td>' +
                        '<td>' + product.name + '</td>' + 
                        '<td><input type="number" onClick="this.select();" id="priceProduct_' + product.id + '" value=' + product.price + '></td>' +
                        '<td><input type="number" onClick="this.select();" id="quantityProduct_' + product.id + '" value=1></td>' +
                        '<td class="td-actions text-center"><button onClick="removeItem_' + product.id + '" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">'+
                            '<i class="tim-icons icon-trash-simple"></i>'+
                        '</button></td>';
        tr.innerHTML = trinnerHTML_;
        tBody.insertBefore(tr, tBody.firstChild);
        var addProduct = {
            "product_id" : product.id,
            "price": product.price,
            "name": product.name,
            "category": product.category
        }
        selectedProducts.push(addProduct);
        console.log(selectedProducts);
    }

    var documentClient = document.getElementById('search-customer');
    documentClient.addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        switch (documentClient.value.length) {
            case 8:
                data.client.type_document = 'DNI';
                data.client.document = documentClient.value;
            break;

            case 11:
                data.client.type_document = 'RUC';
                data.client.document = documentClient.value;
            break;

            default:
                data.client.type_document = 'RUC';
                data.client.document = documentClient.value;
            break;
        }
        $.ajax({
            method: "GET",
            url: "/api/customer",
            context: document.body,
            data: data.client,
            statusCode: {
                400: function() {
                    alert("El número de documento no existe.");
                }
            }
        }).done(function(response) {
            alert("Cliente encontrado.");
            data.dataClient = response;
            console.log(data.dataClient)
            document.getElementById('search-customer').value = data.dataClient.apellidoPaterno + ' ' + data.dataClient.apellidoMaterno + ' ' + data.dataClient.nombres;
        });
    }
    });
    });
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>