<?php
    namespace Armor\Trial\Entity\Theme;

    trait DataThemeTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\Theme\DataThemeEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var DataThemeEntityInterface
         */
        protected $theme;

        /**
         * @return DataThemeEntityInterface
         */
        public function getThemeEntity ()
        {
            return $this->theme;
        }

        /**
         * @param DataThemeEntityInterface $dataThemeEntityInterface
         * @return $this
         */
        public function setThemeEntity(DataThemeEntityInterface $dataThemeEntityInterface)
        {
            $this->theme = $dataThemeEntityInterface;
            return $this;
        }
    }