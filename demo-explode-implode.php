<?php
/**
 * Created by PhpStorm.
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 24/05/2017
 * Time: 16:02
 */
$chaine = "I LIKE TO MOVE IT MOVE IT";
$tableauDeMots = explode(" ", $chaine);
var_dump($tableauDeMots);
$chaine = implode(",\n", $tableauDeMots);
var_dump($chaine);
