<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Users List</h1>
    <?php if(!empty($users)): ?>
        <table border="1">
            <tr>
                <th>UserID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->password; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <h1>Sorry! No Records Found.</h1>
    <?php endif; ?>
</body>
</html>