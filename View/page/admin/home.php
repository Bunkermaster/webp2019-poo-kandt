<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des pages</title>
</head>
<body>
<a href="./?a=admin/add">+ Ajouter</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $unePage):?>
            <tr>
                <td><?=$unePage->id?></td>
                <td><?=$unePage->slug?></td>
                <td>
                    <a href="./?a=details&s=<?=$unePage->slug?>">Details</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>