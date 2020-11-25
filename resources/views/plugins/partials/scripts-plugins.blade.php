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
        var plugins = JSON.parse(document.getElementById('plugins').value);
        var user = JSON.parse(document.getElementById('user').value);
        var pluginSelected = '';
        installModule = function (id) {
            plugins.forEach(element => {
                if (element.id == id) {
                    pluginSelected = element;
                }
            });
            pluginSelected.companyId = user.com_companies_id;
            $.ajax({
                method: "GET",
                url: "/api/plugins",
                data: pluginSelected,
                statusCode: {
                    400: function() {
                        button.disabled = false;
                        alert("Hubo un error al momento de instalar. Intentelo de nuevo");
                    }
                }
            }).done(function(response) {
                alert("Instalación exitosa");
                location.reload();
            });
        }
        unistallModule = function (id) {
            plugins.forEach(element => {
                if (element.id == id) {
                    pluginSelected = element;
                }
            });
            pluginSelected.companyId = user.com_companies_id;
            $.ajax({
                method: "DELETE",
                url: "/api/plugins",
                data: pluginSelected,
                statusCode: {
                    400: function() {
                        button.disabled = false;
                        alert("Hubo un error al momento de instalar. Intentelo de nuevo");
                    }
                }
            }).done(function(response) {
                alert("El plugin se eliminó");
                location.reload();
            });
        }
    });
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>