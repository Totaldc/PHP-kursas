<?php
$current_data = file_get_contents('db.txt');
$array_data = json_decode($current_data, true);

?>
<style>
    table {
        border: 1px solid black;
    }

    td {
        border: 1px solid black;
    }
</style>
<table>
    <thead>
        <td>Password</td>
        <td>User</td>
    </thead>
    <?php foreach ($array_data as $key => $value) : ?>
        <tr>
            <?php foreach ($value as $key => $item) : ?>
                <td>
                    <?php print $item; ?>
                </td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>