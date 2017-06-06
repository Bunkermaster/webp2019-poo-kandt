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
    <a href="./?a=admin/edit&id=<?=$data->id?>">Modifier</a>
    <?php if ($data->default_page != 1) :?>
    <a href="./?a=admin/delete&id=<?=$data->id?>">Supprimer</a>
    <?php else:?>
    Supprimer
    <?php endif;?>
    <ul>
        <li>
            <h2>id</h2>
            <p><?=htmlentities($data->id)?></p>
        </li>
        <li>
            <h2>Slug</h2>
            <p><?=htmlentities($data->slug)?></p>
        </li>
        <li>
            <h2>paragraphe</h2>
            <p><?=nl2br(htmlentities($data->paragraphe))?></p>
        </li>
        <li>
            <h2>H1</h2>
            <p><?=htmlentities($data->H1)?></p>
        </li>
        <li>
            <h2>Nav_title</h2>
            <p><?=htmlentities($data->nav_title)?></p>
        </li>
        <li>
            <h2>img</h2>
            <p><?=htmlentities($data->img)?></p>
        </li>
        <li>
            <h2>alt</h2>
            <p><?=htmlentities($data->alt)?></p>
        </li>
    </ul>
</div>
</body>
</html>