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
    var saleSerie = '';
    var saleAmount = '';
    var saleClient = '';
    var saleList = JSON.parse(document.getElementById('listOfSales').value);
    var newSaleList = [];
    var selectedSale = null;
    var saleTicket = '';
    var saleTypeDocument = '';
    var saleTypePayment = '';
    var saleTaxes = '';
    var saleSubTotal = '';

    
    saleList.forEach(element => {
        newSaleList[element.id] = element;
    });
    console.log(newSaleList)
    $(document).ready(function() {

        createNewProduct = function () {
            productName = document.getElementById('productName').value;
            productPrice = document.getElementById('productPrice').value;
            productCode = document.getElementById('productCode').value;
            productCategory = document.getElementById('productCategory').value;
            productDescription = document.getElementById('productDescription').value;
            var data = {
                "name"        : productName,
                "price"       : productPrice,
                "code"        : productCode,
                "category"    : productCategory,
                "description" : productDescription
            }
            $.ajax({
                method: "POST",
                url: "/api/product",
                context: document.body,
                data: data,
                statusCode: {
                    400: function() {
                        alert("Hubo un error en el registro. Es posible que los datos no sean los correctos.");
                    }
                }
            }).done(function(response) {
                alert("Registro exitoso.");
                location.reload();
            });
        }

        editProductModal = function (id) {
            $('#editProductModal').modal({ backdrop: 'static', keyboard: false });
            selectedProduct = id;
            document.getElementById('editProductName').value = newProductList[id].name;
            document.getElementById('editProductPrice').value = newProductList[id].price;
            document.getElementById('editProductCode').value = newProductList[id].code;
            document.getElementById('editProductCategory').value = newProductList[id].category;
            document.getElementById('editProductDescription').value = newProductList[id].description;
        }

        saveProduct = function () {
            productName = document.getElementById('editProductName').value;
            productPrice = document.getElementById('editProductPrice').value;
            productCode = document.getElementById('editProductCode').value;
            productCategory = document.getElementById('editProductCategory').value;
            productDescription = document.getElementById('editProductDescription').value;
            var data = {
                "name"        : productName,
                "price"       : productPrice,
                "code"        : productCode,
                "category"    : productCategory,
                "description" : productDescription
            }
            $.ajax({
                method: "PATCH",
                url: "/api/product/" + selectedProduct,
                context: document.body,
                data: data,
                statusCode: {
                    400: function() {
                        selectedProduct = null;
                        alert("Hubo un error en el registro. Es posible que los datos no sean los correctos.");
                    }
                }
            }).done(function(response) {
                selectedProduct = null;
                alert("Actualización exitosa.");
                location.reload();
            });
        }
    });
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>