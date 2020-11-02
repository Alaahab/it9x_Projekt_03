<?php

namespace Application\Table;

use Application\App;

class Article extends Table
{
    protected static $table = 'article';

    public static function find($id) {

        return self::query("SELECT article.id, article.title, article.content, sportcategory.title as category  
                FROM article 
                LEFT JOIN sportcategory on category_id = sportcategory.id
                WHERE article.id = ? 
                
                ", [$id], true);
    }

    public static function getLast() {
        return self::query("
                SELECT article.id, article.title, article.content, sportcategory.title as category  
                FROM article 
                LEFT JOIN sportcategory on category_id = sportcategory.id
                ORDER By article.date DESC 
                
                ");
    }

    public static function lastByCategory($category_id) {
        return self::query("
                SELECT article.id, article.title, article.content, sportcategory.title as category  
                FROM article 
                LEFT JOIN sportcategory on category_id = sportcategory.id
                 WHERE category_id = ?
                  ORDER By article.date DESC 
                 ", [$category_id]);
    }


    public function getURL() {
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtract() {
        $html = '<p>' . substr($this->content, 0, 250) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '"> see more </a></p>';

        return $html;
    }

}