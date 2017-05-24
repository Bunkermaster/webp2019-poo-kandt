<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body role="document">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">WtfWeb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.html">Teletubbies</a></li>
                <li><a href="kittens.html">Kittens</a></li>
                <li><a href="ironmaiden.html">Iron Maiden</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">
    <div class="jumbotron">
        <h1><?=$data->H1?></h1>
        <p><?=$data->paragraphe?></p>
    </div>
    <img class="img-thumbnail" alt="<?=$data->alt?>" src="img/<?=$data->img?>" data-holder-rendered="true">
</div>
</body>
</html>
