<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
        <th>Descripcion</th>
        <th>Pais</th>
        <th>Ciudad</th>
        <th>Telefono</th>
        <th>Direccion Web</th>
        <th>Marca</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($distributionCenters as $distributionCenter)
            <tr>
                <td>{{ $distributionCenter->titulo }}</td>
            <td>{{ $distributionCenter->descripcion }}</td>
            <td>{{ $distributionCenter->pais }}</td>
            <td>{{ $distributionCenter->ciudad }}</td>
            <td>{{ $distributionCenter->telefono }}</td>
            <td>{{ $distributionCenter->direccion_web }}</td>
            <td>{{ $distributionCenter->marca }}</td>
                <td>
                    {!! Form::open(['route' => ['distributionCenters.destroy', $distributionCenter->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('distributionCenters.show', [$distributionCenter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('distributionCenters.edit', [$distributionCenter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Distribution Center',
                                                       'Esta accion eliminara el Distribution Center ' + '{{ $distributionCenter->name }}. Desea continuar?', 'delete_form_{{ $distributionCenter->id }}')"
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