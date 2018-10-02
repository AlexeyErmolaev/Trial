<?php
    namespace Armor\Trial\Models;
    use Armor\Trial\Entity\DataBasic\DataBasicEntityInterface;
    use GothicPrince\UserLog\Models\ILog;
    use GothicPrince\UserLog\Models\UserLogGetMethod;
    use Twig_Environment;

    class ContentSendModel
    {
        /**
         * @var Twig_Environment
         */
        protected $twig;

        /**
         * @var ILog[]
         */
        protected $logs;

        /**
         * @var DataBasicEntityInterface
         */
        protected $basic_entity;

        protected $fields;

        /**
         * @return mixed
         */
        public function getFields ()
        {
            return $this->fields;
        }

        /**
         * @param \GothicPrince\UserLog\Models\ILog[] $logs
         * @return $this
         */
        public function setLogs ( $logs )
        {
            $this->logs = $logs;
            return $this;
        }


        /**
         * @param mixed $fields
         * @return $this
         */
        public function setFields ( $fields )
        {
            $this->fields = $fields;
            return $this;
        }

        /**
         * @return Twig_Environment
         */
        public function getTwig ()
        {
            return $this->twig;
        }

        /**
         * @param Twig_Environment $twig
         * @return $this
         */
        public function setTwig ( Twig_Environment $twig )
        {
            $this->twig = $twig;
            return $this;
        }

        /**
         * @return DataBasicEntityInterface
         */
        public function getBasicEntity ()
        {
            return $this->basic_entity;
        }

        /**
         * @param DataBasicEntityInterface $basic_entity
         * @return $this
         */
        public function setBasicEntity ( DataBasicEntityInterface $basic_entity )
        {
            $this->basic_entity = $basic_entity;
            return $this;
        }

        /**
         * @return string
         */
        public function getContent()
        {
            $userDataSent = (array) $this->getFields();
            unset($userDataSent["captcha"]);

            $userData = $this->getTwig()->render("table.twig", array
            (
                'data' => (array) $userDataSent,
                'title'=>"The user has sent the data"
            ));

            $parser = new \WhichBrowser\Parser($this->getBasicEntity()->getUserAgent());

            $userInfo = $this->getTwig()->render("table.twig", array
            (
                'data' => array(
                    "IP"=>long2ip($this->getBasicEntity()->getIp()),
                    "Date"=>$this->getBasicEntity()->getCreatedAt()->format("d-m-Y H:i"),
                    "Browser"=>$parser->browser->getName() . " " . $parser->browser->getVersion(),
                    "OS"=>$parser->os->getName() . " " . $parser->os->getVersion()
                ),
                'title'=>"The user information"
            ));

            $userLogs = $this->getTwig()->render("logs.twig", array
            (
                'logs'=>$this->logs
            ));


            return $userData.$userInfo.$userLogs;
        }
    }