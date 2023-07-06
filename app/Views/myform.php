<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        .text-danger{color:red;}
    </style>
</head>
<body>
    <h1>Form Validation</h1>
    <?= form_open(); ?>
    <table>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username" value='<?= set_value('username'); ?>'>
                <span class="text-danger"><?= display_error($validation, 'username');?> </span>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="text" name="email" value='<?= set_value('email'); ?>'>
                <span class="text-danger"><?= display_error($validation, 'email');?> </span>
            </td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>
                <input type="text" name="mobile" value='<?= set_value('mobile'); ?>'>
                <span class="text-danger"><?= display_error($validation, 'mobile');?> </span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="save" value="Save">
            </td>
        </tr>
    </table>
    <?= form_close(); ?>
</body>
</html>