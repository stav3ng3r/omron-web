<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id Producto</th>
        <th>Cantidad</th>
        <th>En Stock</th>
        <th>Cantidad Minima</th>
        <th>Fecha Creacion</th>
        <th>Fecha Actualizacion</th>
        <th>Distribuidor</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stocks as $stock)
            <tr>
                <td>{{ $stock->id_producto }}</td>
            <td>{{ $stock->cantidad }}</td>
            <td>{{ $stock->en_stock }}</td>
            <td>{{ $stock->cantidad_minima }}</td>
            <td>{{ $stock->fecha_creacion }}</td>
            <td>{{ $stock->fecha_actualizacion }}</td>
            <td>{{ $stock->distribuidor }}</td>
                <td>
                    {!! Form::open(['route' => ['stocks.destroy', $stock->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('stocks.show', [$stock->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('stocks.edit', [$stock->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Stock',
                                                       'Esta accion eliminara el Stock ' + '{{ $stock->name }}. Desea continuar?', 'delete_form_{{ $stock->id }}')"
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