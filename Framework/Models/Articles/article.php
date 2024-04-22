<?php
    namespace Framework\Models\Articles;
    use Framework\Models\Users\User;

    class Article{
        public function __construct(
            private $title,
            private $text,
            private User $autor_id
        ){}
        
        public function getAuthor() : User
        {
            return $this->autor_id;
        }
    }