<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 24/05/2017
 * Time: 15:02
 */
use \Bunkermaster\Controller\PageController;

// inclusion manuelle des fichiers
require_once "vendor/autoload.php";
// instanciation du controller
$page = new PageController();
// appel de la méthode en dur (démo)
echo $page->detailsAction();
