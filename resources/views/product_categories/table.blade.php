<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Marca</th>
            <th>Descripcion</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productCategories as $productCategory)
            <tr>
                <td>{{ $productCategory->brand->descripcion }}</td>
                <td>{{ $productCategory->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['productCategories.destroy', $productCategory->id], 'method' => 'delete', 'id' => "delete_form_$productCategory->id"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productCategories.show', [$productCategory->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productCategories.edit', [$productCategory->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Categoria',
                                   'Esta accion eliminara el Categoria ' + '{{ $productCategory->descripcion }}. Desea continuar?', 'delete_form_{{ $productCategory->id }}')"
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