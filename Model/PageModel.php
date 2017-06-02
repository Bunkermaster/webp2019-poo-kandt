<?php

namespace Bunkermaster\Model;

use Bunkermaster\Helper\Database;
use Bunkermaster\Helper\Model;

/**
 * Class PageModel
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Bunkermaster\Model
 */
class PageModel extends Model
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
        $this->errorManagement($stmt);

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

        return current($this->get(null, $id));
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
        $sql = "UPDATE 
                page 
            SET 
                slug = :slug,
                nav_title = :nav_title,
                H1 = :H1,
                paragraphe = :paragraphe, 
                img = :img,
                alt = :alt
            WHERE 
                id = :id ";

        $stmt = Database::get()->prepare($sql);
        $stmt->bindValue(':slug', $data['slug'] ?? '');
        $stmt->bindValue(':nav_title', $data['nav_title'] ?? '');
        $stmt->bindValue(':H1', $data['H1'] ?? '');
        $stmt->bindValue(':paragraphe', $data['paragraphe'] ?? '');
        $stmt->bindValue(':img', $data['img'] ?? '');
        $stmt->bindValue(':alt', $data['alt'] ?? '');
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();

        $this->errorManagement($stmt);

        return true;
    }

    public function delete($id)
    {

    }

    public function add($data)
    {
        $sql = "INSERT INTO
                  `page`
                (
                    `slug`,
                    `nav_title`,
                    `H1`,
                    `paragraphe`,
                    `img`,
                    `alt`
                ) VALUES(
                    :slug,
                    :nav_title,
                    :H1,
                    :paragraphe,
                    :img,
                    :alt
                )";
        $stmt = Database::get()->prepare($sql);
        $stmt->bindValue(':slug', $data['slug']);
        $stmt->bindValue(':nav_title', $data['nav_title']);
        $stmt->bindValue(':H1', $data['H1']);
        $stmt->bindValue(':paragraphe', $data['paragraphe']);
        $stmt->bindValue(':img', $data['img']);
        $stmt->bindValue(':alt', $data['alt']);
        $stmt->execute();
        $this->errorManagement($stmt);

        return Database::get()->lastInsertId();
    }
}
