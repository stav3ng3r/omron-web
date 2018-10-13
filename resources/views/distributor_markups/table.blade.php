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
                <td>{{ $distributorMarkup->distributor->titulo }}</td>
                <td class="text-center">
                    @if( $distributorMarkup->porcentaje_envio )
                        <span class="badge bg-light-blue">{{ $distributorMarkup->porcentaje_envio }}%</span>
                    @else
                        <span class="badge bg-light-blue">0%</span>
                    @endif
                </td>
                <td class="text-center">
                    @if( $distributorMarkup->porcentaje_aduana )
                        <span class="badge bg-light-blue">{{ $distributorMarkup->porcentaje_aduana }}%</span>
                    @else
                        <span class="badge bg-light-blue">0%</span>
                    @endif
                </td>
                <td class="text-center">
                    @if( $distributorMarkup->porcentaje_utilidad )
                        <span class="badge bg-light-blue">{{ $distributorMarkup->porcentaje_utilidad }}%</span>
                    @else
                        <span class="badge bg-light-blue">0%</span>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['distributorMarkups.destroy', $distributorMarkup->id], 'method' => 'delete', 'id' => "delete_form_{$distributorMarkup->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('distributorMarkups.show', [$distributorMarkup->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('distributorMarkups.edit', [$distributorMarkup->id]) !!}"
                           class='btn btn-default btn-xs block-on-click'><i class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Markup',
                                   'Esta accion eliminara el Markup ' + '{{ $distributorMarkup->name }}. Desea continuar?', 'delete_form_{{ $distributorMarkup->id }}')"
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