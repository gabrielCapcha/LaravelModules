@extends('plugins.partials.layout-plugins')
@section('main-content')
<section class="content">
    <div class="row">
    <input id="plugins" type="hidden" value="{{ $jsonResponse->plugins }}">
    <input id="user" type="hidden" value="{{ Auth::user() }}">
    <div style="padding: 100px">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th class="text-center">#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 0;
                @endphp
                @foreach($jsonResponse->plugins as $plugin)
                @php
                    $count++;
                @endphp
                <tr class="text-center">
                    <td class="text-center">{{ $count }}</td>
                    <td>{{ $plugin->name }}</td>
                    <td>{{ $plugin->description }}</td>
                    <td class="td-actions text-center">
                        <button onClick="installModule({{ $plugin->id }})" type="button" rel="tooltip" class="btn btn-primary btn-sm btn-icon">
                            <i class="tim-icons icon-cloud-download-93"></i>
                        </button>
                        <button onClick="unistallModule({{ $plugin->id }})" type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <!-- Modal -->
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