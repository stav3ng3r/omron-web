<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Categoria Producto</th>
            <th>Distribuidor</th>
            <th>Descripcion</th>
            <th>Porcentaje</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($distributorMultipliers as $distributorMultiplier)
            <tr>
                <td>{{ $distributorMultiplier->product_category->descripcion }}</td>
                <td>{{ $distributorMultiplier->distributor->titulo }}</td>
                <td>{{ $distributorMultiplier->descripcion }}</td>
                <td>
                    <span class="badge bg-light-blue">
                        {{ ($distributorMultiplier->porcentaje ? $distributorMultiplier->porcentaje : 0) }}
                        %</span>
                </td>
                <td>
                    {!! Form::open(['route' => ['distributorMultipliers.destroy', $distributorMultiplier->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('distributorMultipliers.show', [$distributorMultiplier->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('distributorMultipliers.edit', [$distributorMultiplier->id]) !!}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Distributor Multiplier',
                                   'Esta accion eliminara el Distributor Multiplier ' + '{{ $distributorMultiplier->descripcion }}. Desea continuar?', 'delete_form_{{ $distributorMultiplier->id }}')"
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