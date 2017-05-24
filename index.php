<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 24/05/2017
 * Time: 15:02
 */
use \Bunkermaster\Controller\PageController;

// inclusion manuelle des fichiers
require_once "conf.php";
require_once "Controller/PageController.php";
require_once "Model/PageModel.php";
require_once "Helper/Database.php";
// instanciation du controller
$page = new PageController();
// appel de la méthode en dur (démo)
var_dump($page->homeAction());
