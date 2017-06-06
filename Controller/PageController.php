<?php

namespace Bunkermaster\Controller;

use Bunkermaster\Helper\Controller;
use Bunkermaster\Model\PageModel;

/**
 * Class PageController
 * @package Bunkermaster\Controller
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 */
class PageController extends Controller
{
    /**
     * @var PageModel
     */
    private $model;

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
        // gestion de la generation de l'affichage
        return $this->render(
            "page/default-page.php",
            $this->model->getByDefault()
        );
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
        if (false === $data = $this->model->getBySlug($_GET['s'])) {
            return ErrorController::notFoundAction();
        }
        return $this->render(
            "page/default-page.php",
            $data
        );
    }

    /**
     * blergh
     * @return string
     */
    public function adminHomeAction()
    {
        return $this->render(
            "page/admin/home.php",
            $this->model->getList()
        );
    }

    /**
     *
     * @return string
     */
    public function adminAddAction()
    {
        $validation = [
            'slug',
            'nav_title',
            'H1',
            'paragraphe',
            'img',
            'alt',
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'
            && $this->validationChamps($_POST, $validation)
        ) {
            $id = $this->model->add($_POST);
            header('Location: ./?a=admin');
            exit;
        } else {
            $data = [
                'id' => '',
                'slug' => '',
                'nav_title' => '',
                'H1' => '',
                'paragraphe' => '',
                'img' => '',
                'alt' => '',
            ];
            return $this->render('page/admin/addForm.php', $data);
        }
    }

    /**
     *
     * @return string
     */
    public function adminDetailsAction()
    {
        if (false === $data = $this->model->getById($_GET['id'] ?? 0)) {
            throw new \ErrorException('O_o');
        }

        return $this->render('page/admin/details.php', $data);
    }

    /**
     *
     * @return string
     */
    public function adminEditAction()
    {
        $validation = [
            'id',
            'slug',
            'nav_title',
            'H1',
            'paragraphe',
            'img',
            'alt',
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'
            && $this->validationChamps($_POST, $validation)
        ) {
            $this->model->update($_POST);
            header('Location: ./?a=admin');
            exit;
        } elseif (isset($_GET['id'])
            && false !== $data =$this->model->getById($_GET['id'])
        ) {

            return $this->render(
                'page/admin/addForm.php', (array) $data
            );
        } else {
            header('Location: ./?a=admin');
            exit;
        }
    }

    /**
     *
     * @return string
     */
    public function adminDeleteAction()
    {

    }
}
