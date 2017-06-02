<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des pages</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body role="document">
<div class="container theme-showcase" role="main">
<a href="./?a=admin/add">+ Ajouter</a>
    <table class="table table-bordered">
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
                    <a href="./?a=admin/edit&id=<?=$unePage->id?>">Modifier</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>