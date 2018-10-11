<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Descripcion</th>
            <th>Fecha Creacion</th>
            <th>Fecha Actualizacion</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productBrands as $productBrand)
            <tr>
                <td>{{ $productBrand->descripcion }}</td>
                <td>{{ $productBrand->fecha_creacion }}</td>
                <td>{{ $productBrand->fecha_actualizacion }}</td>
                <td>
                    {!! Form::open(['route' => ['productBrands.destroy', $productBrand->id], 'method' => 'delete', 'id' => "delete_form_{$productBrand->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productBrands.show', [$productBrand->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productBrands.edit', [$productBrand->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Marca',
                                   'Esta accion eliminara la Marca ' + '{{ $productBrand->descripcion }}. Desea continuar?', 'delete_form_{{ $productBrand->id }}')"
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