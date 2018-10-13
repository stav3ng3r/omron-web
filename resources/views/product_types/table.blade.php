<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Categoria</th>
            <th>Descripcion</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productTypes as $productType)
            <tr>
                <td>{{ $productType->category->descripcion }}</td>
                <td>{{ $productType->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['productTypes.destroy', $productType->id], 'method' => 'delete', 'id' => "delete_form_{$productType->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productTypes.show', [$productType->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productTypes.edit', [$productType->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Tipo',
                                   'Esta accion eliminara el Tipo ' + '{{ $productType->descripcion }}. Desea continuar?', 'delete_form_{{ $productType->id }}')"
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