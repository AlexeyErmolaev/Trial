<?php
    namespace Armor\Trial\Entity\Product;

    trait ProductTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\Product\ProductEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var ProductEntityInterface
         */
        protected $data_trial;
        /**
         * @return ProductEntityInterface
         */
        public function getProductEntity ()
        {
            return $this->data_trial;
        }

        /**
         * @param ProductEntityInterface $productEntityInterface
         * @return $this
         */
        public function setProductEntity(ProductEntityInterface $productEntityInterface)
        {
            $this->data_trial = $productEntityInterface;
            return $this;
        }
    }