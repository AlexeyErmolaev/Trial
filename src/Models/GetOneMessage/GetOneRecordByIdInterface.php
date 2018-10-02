<?php
    namespace Armor\Trial\Models\GetOneMessage;

    use Armor\Trial\Entity\Download\DownloadEntity;
    use Armor\Trial\Entity\Download\GettingKeyEntity;
    use Armor\Trial\Entity\FeedBack\DataFeedBackEntity;
    use Armor\Trial\Entity\Purchase\PurchaseEntity;
    use Armor\Trial\Entity\Support\SupportEntity;

    interface GetOneRecordByIdInterface
    {
        /**
         * @param $id
         * @return DownloadEntity|GettingKeyEntity|DataFeedBackEntity|SupportEntity|PurchaseEntity
         */
        public function getRecordById($id);
    }