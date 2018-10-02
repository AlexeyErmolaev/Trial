<?php
    namespace Armor\Trial\Exceptions;

    use Exception;

    class EntityIsNotImplementedInterface extends \Exception
    {
        public function setType ($entity, $type )
        {
            $class = get_class($entity);
            $this->message = "The entity \"{$class}\" must be an instance of {$type}";
            return $this;
        }
    }