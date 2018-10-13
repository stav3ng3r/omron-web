<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Descripcion</th>
            <th>Simbolo</th>
            <th colspan="3">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($currencies as $currency)
            <tr>
                <td>{{ $currency->descripcion }}</td>
                <td>{{ $currency->simbolo }}</td>
                <td>
                    {!! Form::open(['route' => ['currencies.destroy', $currency->id], 'method' => 'delete', 'id' => "delete_form_{$currency->id}"]) !!}
                    <div class='btn-group'>
                        <a href="{!! route('currencies.show', [$currency->id]) !!}" class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('currencies.edit', [$currency->id]) !!}" class='btn btn-default btn-xs block-on-click'><i
                                    class="glyphicon glyphicon-edit"></i></a>

                        <a href="#" class="btn btn-danger btn-xs block-on-click"
                           onclick="swal_delete('Eliminar Moneda',
                                   'Esta accion eliminara la Moneda ' + '{{ $currency->descripcion}}. Desea continuar?', 'delete_form_{{ $currency->id }}')"
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