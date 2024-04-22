<?php
    namespace Framework\Models\Users;

    class User {
        public function __construct(
            private string $name,
        ){}

        public function getName(){
            return $this->name;
        }
    }