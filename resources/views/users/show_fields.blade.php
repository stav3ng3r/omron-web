<tr>
    <td style="font-weight: bold; text-align: right">ID</td>
    <td style="text-align: right">{{ $user->id }}</td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Nombre</td>
    <td style="text-align: right">{{ $user->name }}</td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Usuario</td>
    <td style="text-align: right">{{ $user->username }}</td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Email</td>
    <td style="text-align: right">{{ $user->email }}</td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Reiniciar Contraseña</td>
    <td style="text-align: right">
            <span class="label label-{{ ($user->reset_password ? 'success' : 'default') }}">
                {{ ($user->reset_password ? 'SI' : 'NO') }}
            </span>
    </td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Bloqueado</td>
    <td style="text-align: right">
            <span class="label label-{{ ($user->blocked ? 'success' : 'default') }}">
                {{ ($user->blocked ? 'SI' : 'NO') }}
            </span>
    </td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Fecha Bloqueado</td>
    <td style="text-align: right">{{ $user->blocked_at }}</td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Fecha Creacion</td>
    <td style="text-align: right">{{ $user->created_at }}</td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Ultima Actualizacion</td>
    <td style="text-align: right">{{ $user->updated_at }}</td>
</tr>
<tr>
    <td style="font-weight: bold; text-align: right">Fecha Baja</td>
    <td style="text-align: right">{{ $user->deleted_at }}</td>
</tr>
