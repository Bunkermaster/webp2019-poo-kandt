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
     */
    public function detailsAction()
    {

    }

    /**
     *
     */
    public function adminHomeAction()
    {

    }

    /**
     *
     */
    public function adminAddAction()
    {

    }

    /**
     *
     */
    public function adminDetailsAction()
    {

    }

    /**
     *
     */
    public function adminEditAction()
    {

    }

    /**
     *
     */
    public function adminDeleteAction()
    {

    }
}
