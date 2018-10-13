<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Pais</th>
            <th>Ciudad</th>
            <th>Direccion</th>
            <th>Oficina Regional</th>
            <th>Marca</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($distributors as $distributor)
            <tr>
                <td>{{ $distributor->titulo }}</td>
                <td>{{ $distributor->descripcion }}</td>
                <td>{{ $distributor->country->descripcion }}</td>
                <td>{{ $distributor->city->descripcion }}</td>
                <td>{{ $distributor->direccion }}</td>
                <td>{{ $distributor->regional_office->titulo }}</td>
                <td>{{ $distributor->brand->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['distributors.destroy', $distributor->id], 'method' => 'delete', 'id' => "delete_form_{$distributor->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('distributors.show', [$distributor->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('distributors.edit', [$distributor->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Distribuidor',
                                   'Esta accion eliminara el Distribuidor ' + '{{ $distributor->titulo }}. Desea continuar?', 'delete_form_{{ $distributor->id }}')"
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