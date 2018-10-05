<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id Producto</th>
        <th>Url Imagen</th>
        <th>Codigo</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productImages as $productImage)
            <tr>
                <td>{{ $productImage->id_producto }}</td>
            <td>{{ $productImage->url_imagen }}</td>
            <td>{{ $productImage->codigo }}</td>
                <td>
                    {!! Form::open(['route' => ['productImages.destroy', $productImage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productImages.show', [$productImage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productImages.edit', [$productImage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Product Image',
                                                       'Esta accion eliminara el Product Image ' + '{{ $productImage->name }}. Desea continuar?', 'delete_form_{{ $productImage->id }}')"
                                            >
                            <i class="glyphicon glyphicon-trash"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>