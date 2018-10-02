<?php
    namespace Armor\Trial\Entity\Theme;
    use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
    use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

    interface DataThemeEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
    {
        /**
         * @return mixed
         */
        public function getTheme ();

        /**
         * @param $theme
         * @return $this
         */
        public function setTheme ( $theme );
    }