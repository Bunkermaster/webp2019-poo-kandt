<?php

namespace Bunkermaster\Controller;

use Bunkermaster\Model\PageModel;

/**
 * Class PageController
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Controller
 */
class PageController
{
    /**
     * PageController constructor.
     */
    public function __construct()
    {
        // on instancie le model pour acces global dans le controller
        $this->model = new PageModel();
    }

    /**
     * Affiche la page par defaut
     * @return string
     */
    public function homeAction()
    {
        // recuperation des donnees
        $data = $this->model->getByDefault();
        // gestion de la generation de l'affichage
        ob_start();
        require APP_DIR_VIEW."page/default-page.php";
        return ob_get_clean();
    }

    /**
     * affiche la page dont le slug est fourni
     * @return string
     */
    public function detailsAction()
    {
        if (!isset($_GET['s']) || trim($_GET['s']) === "") {
            return ErrorController::badRequestAction();
        }
        $slug = $_GET['s'];
        $data = $this->model->getBySlug($slug);
        dump($data);
        if ($data === false){
            return ErrorController::notFoundAction();
        }
        ob_start();
        require APP_DIR_VIEW."page/default-page.php";
        return ob_get_clean();
    }

    /**
     *
     * @return string
     */
    public function adminHomeAction()
    {

    }

    /**
     *
     * @return string
     */
    public function adminAddAction()
    {

    }

    /**
     *
     * @return string
     */
    public function adminDetailsAction()
    {

    }

    /**
     *
     * @return string
     */
    public function adminEditAction()
    {

    }

    /**
     *
     * @return string
     */
    public function adminDeleteAction()
    {

    }
}
