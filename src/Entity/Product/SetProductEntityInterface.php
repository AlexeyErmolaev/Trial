<?php
    namespace Armor\Trial\Entity\Product;


    interface SetProductEntityInterface
    {
        /**
         * @param ProductEntityInterface $productEntityInterface
         * @return $this
         */
        public function setProductEntity(ProductEntityInterface $productEntityInterface);
    }