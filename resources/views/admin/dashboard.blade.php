<x-admin.header :title="'Dashboard'" />
<table border="1">
    <tbody>
        <tr>
            <td>ADMIN NAME</td>
            <td>:</td>
            <td><?= $user->name ?></td>
        </tr>
        <tr>
            <td>ADMIN EMAIL</td>
            <td>:</td>
            <td><?= $user->email ?></td>
        </tr>
        <tr>
            <td>ADMIN MOBILE</td>
            <td>:</td>
            <td><?= $user->mobile ?></td>
        </tr>
        <tr>
            <td>ADMIN STATE</td>
            <td>:</td>
            <td><?= $user->state ?></td>
        </tr>
        <tr>
            <td>ADMIN COUNTRY</td>
            <td>:</td>
            <td><?= $user->country ?></td>
        </tr>
    </tbody>
</table>
<x-admin.footer />
