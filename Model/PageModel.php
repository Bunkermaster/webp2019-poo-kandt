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
    /**
     * @param null|string $slug
     * @param null|int $id
     * @param null|bool $default
     * @return array
     */
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
            $conditions[] = "`default_page` = 1";
        }
        // je reconstruis le WHERE a partir des coditions
        // en utilisant le implode
        if (count($conditions) > 0) {
            $sql .= "WHERE\n  ".implode("\n  AND ", $conditions);
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

    /**
     * @return array
     */
    public function getList()
    {

        return $this->get();
    }

    /**
     * @param $slug
     * @return object|bool
     */
    public function getBySlug($slug)
    {

        return current($this->get($slug));
    }

    /**
     * @param int $id
     * @return object|bool
     */
    public function getById($id)
    {

        return $this->get(null, $id);
    }

    /**
     * @return object|bool
     */
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
