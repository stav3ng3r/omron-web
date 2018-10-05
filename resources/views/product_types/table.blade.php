<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Id Categoria</th>
        <th>Descripcion</th>
        <th>Fecha Creacion</th>
        <th>Fecha Actualizacion</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productTypes as $productType)
            <tr>
                <td>{{ $productType->id_categoria }}</td>
            <td>{{ $productType->descripcion }}</td>
            <td>{{ $productType->fecha_creacion }}</td>
            <td>{{ $productType->fecha_actualizacion }}</td>
                <td>
                    {!! Form::open(['route' => ['productTypes.destroy', $productType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('productTypes.show', [$productType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('productTypes.edit', [$productType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Product Type',
                                                       'Esta accion eliminara el Product Type ' + '{{ $productType->name }}. Desea continuar?', 'delete_form_{{ $productType->id }}')"
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