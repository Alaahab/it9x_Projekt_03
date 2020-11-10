<?php

namespace Application\Table;
use Core\Table\Table;

class PostTable extends Table
{

    protected $table = 'article';

    /**
     *get the last posts
     *
     * @return array
     */

    public function last() {

        return $this->query(" SELECT article.id, article.title, article.content, article.date, sportcategory.title as catergory
        From article
        LEFT JOIN sportcategory ON category_id = sportcategory.id
        
        ORDER BY article.date DESC");

    }
    /**
     *get the last posts to category
     * @param $category_id int
     *
     * @return array
     */

    public function lastByCategory($category_id) {

        return $this->query(" SELECT article.id, article.title, article.content, article.date, sportcategory.title as catergory
        From article
        LEFT JOIN sportcategory ON category_id = sportcategory.id
        
        WHERE category_id = ?
        ORDER BY article.date DESC", [$category_id]);

    }
    /**
     *get an  post by linking the associated category
     *
     * @return \App\Entity\PostEntity
     */

    public function find($id) {

        return $this->query(" SELECT article.id, article.title, article.content, article.date, sportcategory.title as catergory
        From article
        LEFT JOIN sportcategory ON category_id = sportcategory.id
        
        WHERE article.category_id = ?
        ", [$id], true);

    }



}