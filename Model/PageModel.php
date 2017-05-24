<?php

namespace Bunkermaster\Model;

use Bunkermaster\Helper\Database;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Model
 */
class PageModel
{
    private function get($slug = null, $id = null, $default = null)
    {
        $sql = "SELECT
  `id`,
  `slug`,
  `nav_title`,
  `H1`,
  `paragraphe`,
  `img`,
  `alt`,
  `default_page`
FROM
  `page`
";
        // si j'ai un param, je dois ajouter des conditions
        // donc j'ajoute le WHERE
        if (!is_null($slug) || !is_null($id) || !is_null($default)) {
            $sql .= "WHERE\n  ";
            // je cree la pile des conditions
            $conditions = [];
            // je rajoute une condition si slug n'est pas null
            if (!is_null($slug)) {
                $conditions[] = "`slug` = :slug";
            }
            // je rajoute une condition si id n'est pas null
            if (!is_null($id)) {
                $conditions[] = "`id` = :id";
            }
            // je rajoute une condition si default n'est pas null
            if (!is_null($default)) {
                $conditions[] = "`default` = 1";
            }
            // je reconstruis le WHERE a partir des coditions
            // en utilisant le implode
            $sql .= implode("\n  AND ", $conditions);
        }
        // je prepare ma requete (dynamique)
        $stmt = Database::get()->prepare($sql);
        // si j'ai un slug, je le bind
        if (!is_null($slug)) {
            $stmt->bindValue(':slug', $slug);
        }
        // si j'ai une id, je la bind
        if (!is_null($id)) {
            $stmt->bindValue(':id', $id);
        }
        // j'execute
        $stmt->execute();

        // je fetchall en objet
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getList()
    {

        return $this->get();
    }

    public function getBySlug($slug)
    {

        return $this->get($slug);
    }

    public function getById($id)
    {

        return $this->get(null, $id);
    }

    public function getByDefault()
    {

        // renvoie le premier element du retour (il n'y en a qu'un)
        return current($this->get(null, null, true));
    }

    public function update($data)
    {

    }

    public function delete($id)
    {

    }

    public function add($data)
    {

    }
}
