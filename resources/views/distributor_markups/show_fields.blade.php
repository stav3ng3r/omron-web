<!-- Id Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Id</td>
    <td style="text-align: right">{{ $distributorMarkup->id }}</td>
</tr>

<!-- Distribuidor Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Distribuidor</td>
    <td style="text-align: right">{{ $distributorMarkup->distributor->titulo }}</td>
</tr>

<!-- Porcentaje Envio Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Porcentaje Envio</td>
    <td style="text-align: right">
        <span class="badge bg-light-blue">{{ ($distributorMarkup->porcentaje_envio ? $distributorMarkup->porcentaje_envio : 0) }}
            %</span>
    </td>
</tr>

<!-- Porcentaje Aduana Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Porcentaje Aduana</td>
    <td style="text-align: right">
        <span class="badge bg-light-blue">{{ ($distributorMarkup->porcentaje_aduana ? $distributorMarkup->porcentaje_aduana : 0) }}
            %</span>
    </td>
</tr>

<!-- Porcentaje Utilidad Field -->

<tr>
    <td style="font-weight: bold; text-align: right">Porcentaje Utilidad</td>
    <td style="text-align: right">
        <span class="badge bg-light-blue">{{ ($distributorMarkup->porcentaje_utilidad ? $distributorMarkup->porcentaje_utilidad : 0) }}
            %</span>
    </td>
</tr>

