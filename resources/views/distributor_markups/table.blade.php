<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Distribuidor</th>
        <th>Porcentaje Envio</th>
        <th>Porcentaje Aduana</th>
        <th>Porcentaje Utilidad</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($distributorMarkups as $distributorMarkup)
            <tr>
                <td>{{ $distributorMarkup->distribuidor }}</td>
            <td>{{ $distributorMarkup->porcentaje_envio }}</td>
            <td>{{ $distributorMarkup->porcentaje_aduana }}</td>
            <td>{{ $distributorMarkup->porcentaje_utilidad }}</td>
                <td>
                    {!! Form::open(['route' => ['distributorMarkups.destroy', $distributorMarkup->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('distributorMarkups.show', [$distributorMarkup->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('distributorMarkups.edit', [$distributorMarkup->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs"
                                               onclick="swal_delete('Eliminar Distributor Markup',
                                                       'Esta accion eliminara el Distributor Markup ' + '{{ $distributorMarkup->name }}. Desea continuar?', 'delete_form_{{ $distributorMarkup->id }}')"
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