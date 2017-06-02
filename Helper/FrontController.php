<?php

namespace Bunkermaster\Helper;

use Bunkermaster\Controller\PageController;

/**
 * Class FrontController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Helper
 */
class FrontController
{

    /**
     * FrontController constructor.
     */
    public function __construct()
    {
        // gestion de l'action appelée, GEST en prio, puis POST puis chaine vide
        $a = $_GET['a'] ?? $_POST['a'] ?? '';
        try {
            switch($a){
                case "details":
                    // /?a=details&slug=le-slug-le-plus-sbeau
                    $controller = new PageController();
                    $output = $controller->detailsAction();
                    break;

                case "admin":
                case "admin/":
                    $controller = new PageController();
                    $output = $controller->adminHomeAction();
                    break;

                case "admin/add":
                    $controller = new PageController();
                    $output = $controller->adminAddAction();
                    break;

                case "admin/edit":
                    $controller = new PageController();
                    $output = $controller->adminEditAction();
                    break;

                default:
                    // / ou /index.php ou tout le reste
                    $controller = new PageController();
                    $output = $controller->homeAction();
                    break;
            }
        } catch (\PDOException $e) {
            die('Erreur PDO '. $e->getMessage());
//        } catch ( ) {
//
        }
        echo $output;
    }
}