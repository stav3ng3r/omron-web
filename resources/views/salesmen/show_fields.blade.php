<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $salesman->id }}</td>
</tr>

<!-- Id Persona Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Persona</td>
    <td style="text-align: right">{{ $salesman->person->full_name }}</td>
</tr>

<!-- Email Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Email</td>
    <td style="text-align: right">{{ $salesman->email }}</td>
</tr>

<!-- Activo Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Activo</td>
    <td style="text-align: right">
        <span class="label label-{{ ($salesman->activo ? 'success' : 'default') }}">
                        {{ ($salesman->activo ? 'SI' : 'NO') }}
                    </span>
    </td>
</tr>

<!-- Porcentaje Comision Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Porcentaje Comision</td>
    <td style="text-align: right">{{ $salesman->porcentaje_comision }}</td>
</tr>

<!-- Meta Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Meta</td>
    <td style="text-align: right">{{ $salesman->meta }}</td>
</tr>

<!-- Fecha Creacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Creacion</td>
    <td style="text-align: right">{{ $salesman->fecha_creacion }}</td>
</tr>

<!-- Fecha Actualizacion Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Actualizacion</td>
    <td style="text-align: right">{{ $salesman->fecha_actualizacion }}</td>
</tr>

<!-- Fecha Borrado Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Fecha Borrado</td>
    <td style="text-align: right">{{ $salesman->fecha_borrado }}</td>
</tr>