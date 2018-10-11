<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Numero Documento</th>
            <th>Telefono Contacto</th>
            <th>Email</th>
            <th>Fecha Ingreso</th>
            <th>Fecha Creacion</th>
            <th>Fecha Actualizacion</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($people as $person)
            <tr>
                <td>{{ $person->nombre }}</td>
                <td>{{ $person->apellido }}</td>
                <td>{{ $person->numero_documento }}</td>
                <td>{{ $person->telefono_contacto }}</td>
                <td>{{ $person->email }}</td>
                <td>{{ $person->fecha_ingreso }}</td>
                <td>{{ $person->fecha_creacion }}</td>
                <td>{{ $person->fecha_actualizacion }}</td>
                <td>
                    {!! Form::open(['route' => ['people.destroy', $person->id], 'method' => 'delete', 'id' => "delete_form_{$person->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('people.show', [$person->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('people.edit', [$person->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                           onclick="swal_delete('Eliminar Persona',
                                   'Esta accion eliminara la Persona' + '{{ $person->full_name }}. Desea continuar?', 'delete_form_{{ $person->id }}')"
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