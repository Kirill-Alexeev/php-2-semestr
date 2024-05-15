<?php

    namespace Models;
    use Services\Db;


    abstract class ActiveRecordEntity{
        protected $id;

        private function formatUppercaseToCamelcase(string $key): string
        {
            return lcfirst(str_replace('_', '', ucwords($key, '_')));
        }
        private function formatToDb(string $key){
            return strtolower(preg_replace('/([A-Z])/', '_$1', $key));
        }

        public function __set($key, $value){
            $property = $this->formatUppercaseToCamelcase($key);
            $this->$property = $value;
        }

        public function getId(){
            return $this->id;
        }
        public function getPropertyToDb(): array
        {
            $reflector = new \ReflectionObject($this);
            $properties = $reflector->getProperties();
            $nameAndValue = [];
            foreach($properties as $property){
                $propertyName = $property->getName();
                $propertyNameToDb = $this->formatToDb($property->getName());
                $nameAndValue[$propertyNameToDb] = $this->$propertyName;
            }
            return $nameAndValue;
        }
        public static function findAll(): ?array
        {
            $db = new Db;
            $sql = 'SELECT * FROM `'.static::getTableName().'`';
            return $db->query($sql, [], static::class);
        }
        public static function getById(int $id): ?self
        {
            $db = new Db;
            $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`='.$id;
            $entyties = $db->query($sql, [], static::class);
            return $entyties ? $entyties[0] : null;
        }  
        public static function getFieldById(string $field, int $id): ?self
        {
            $db = new Db;
            $sql = 'SELECT `'.$field.'` FROM `'.static::getTableName().'` WHERE `id`='.$id;
            $entyties = $db->query($sql, [], static::class);
            return $entyties ? $entyties[0] : null;
        }
        public function save(){
            if ($this->getId()) $this->update();
            else $this->insert();
        }
        public function insert(){
            $db = new Db;
            $propertiesAndValues = $this->getPropertyToDb();
            $params = [];
            $paramToValue = [];
            foreach($propertiesAndValues as $property=>$value){
                $param = '`:'.$property.'`';
                $params[] = $param;
                $paramToValue[$param] = $value;
            }

            $sql = 'INSERT INTO `'.static::getTableName().'`
                    ('.implode(',', $params).') VALUES ('.implode(',', $paramToValue).')';
            var_dump($sql);
        }
        public function update(){
            var_dump($this->getPropertyToDb());
        }

        abstract protected static function getTableName();
    }