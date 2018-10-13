<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Descripcion</th>
            <th>Abreviatura</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{ $country->descripcion }}</td>
                <td>{{ $country->abreviatura }}</td>
                <td>
                    {!! Form::open(['route' => ['countries.destroy', $country->id], 'method' => 'delete', 'id' => "delete_form_{$country->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('countries.show', [$country->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('countries.edit', [$country->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Pais',
                                   'Esta accion eliminara el Pais ' + '{{ $country->descripcion }}. Desea continuar?', 'delete_form_{{ $country->id }}')"
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