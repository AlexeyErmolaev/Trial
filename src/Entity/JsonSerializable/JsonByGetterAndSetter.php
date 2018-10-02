<?php
    namespace Armor\Trial\Entity\JsonSerializable;

    trait JsonByGetterAndSetter
    {
        function jsonSerialize ()
        {
            $json = [
                "basic"=>$this->getDataBasicEntity(),
                "user"=>$this->getDataUserEntity(),
                "info"=>$this->getUserInfoEntity(),
                "log"=>$this->getLogActionEntity(),

            ];
            try
            {
                if (method_exists($this, "getThemeEntity"))
                    $json["theme"] = $this->getThemeEntity();
            }catch(\Exception $e) {}

            try
            {
                if (method_exists($this, "getProductEntity"))
                    $json["product"] = $this->getProductEntity();
            }catch(\Exception $e) {}
            try
            {
                if (method_exists($this, "getServerTypeEntity"))
                    $json["server"] = $this->getServerTypeEntity();
            }catch(\Exception $e) {}
            try
            {
                if (method_exists($this, "getCommentEntity"))
                    $json["comments"] = $this->getCommentEntity();
            }catch(\Exception $e) {}
            try
            {
                if (method_exists($this, "getJobTitleEntity"))
                    $json["job"] = $this->getJobTitleEntity();
            }catch(\Exception $e) {}

            return $json;
        }
    }