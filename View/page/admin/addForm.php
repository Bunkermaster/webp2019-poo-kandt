<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body role="document">
<div class="container theme-showcase" role="main">
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
        <input type="hidden" name="id" value="<?=$data['id']?>">
        <p>
            <label for="H1">H1</label><br>
            <input type="text" name="H1" id="H1" value="<?=$data['H1']?>">
        </p>
        <p>
            <label for="slug">slug</label><br>
            <input type="text" name="slug" id="slug" value="<?=$data['slug']?>" required>
        </p>
        <p>
            <label for="nav_title">nav_title</label><br>
            <input type="text" name="nav_title" id="nav_title" value="<?=$data['nav_title']?>">
        </p>
        <p>
            <label for="img">img</label><br>
            <input type="text" name="img" id="img" value="<?=$data['img']?>">
        </p>
        <p>
            <label for="alt">alt</label><br>
            <input type="text" name="alt" id="alt" value="<?=$data['alt']?>">
        </p>
        <p>
            <label for="paragraphe">paragraphe</label><br>
            <textarea name="paragraphe" id="paragraphe" cols="80" rows="15"><?=$data['paragraphe']?></textarea>
        </p>
        <p>
            <input type="submit" value="<?=isset($data['id']) ? 'Modifier' :" Ajouter" ?>">
        </p>
    </form>
</div>
</body>
</html>
