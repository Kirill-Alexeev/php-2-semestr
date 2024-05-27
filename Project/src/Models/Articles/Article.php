<?php
namespace Models\Articles;

use Models\ActiveRecordEntity;
use Services\Db;

class Article extends ActiveRecordEntity{
            protected $name;
            protected $text;
            protected $authorId;
            protected $createdAt;

            public function getName(){
                return $this->name;
            }
            public function getText(){
                return $this->text;
            }
            public function getAuthorId(){
                return $this->authorId;
            }
            public function setName(string $name){
                $this->name = $name;
            }
            public function setText(string $text){
                $this->text = $text;
            }
            public function setAuthorId(string $authorId){
                $this->authorId = $authorId;
            }
            public static function getById(int $id): ?self
            {
                $db = Db::getInstance();
                $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`='.$id;
                $entyties = $db->query($sql, [], static::class);
                return $entyties ? $entyties[0] : null;
            }

            public static function getFieldById(string $field, int $id): ?self
            {
                $db = Db::getInstance();
                $sql = 'SELECT `'.$field.'` FROM `'.static::getTableName().'` WHERE `id`='.$id;
                $entyties = $db->query($sql, [], static::class);
                return $entyties ? $entyties[0] : null;
            }

            protected static function getTableName(){
                return 'articles';
            }
    }