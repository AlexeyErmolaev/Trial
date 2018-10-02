<?php
namespace Armor\Trial\Entity\NewsletterSubscription;
use Armor\Trial\Entity\DataBasic\GetDataBasicEntityInterface;
use Armor\Trial\Entity\DataBasic\SetDataBasicEntityInterface;

interface NewsletterSubscriptionEntityInterface extends GetDataBasicEntityInterface, SetDataBasicEntityInterface
{
    /**
     * @return int
     */
    public function getDataId ();

    /**
     * @param int $data_id
     * @return $this
     */
    public function setDataId ( $data_id );

    /**
     * @return string
     */
    public function getSubscribed ();

    /**
     * @param string $subscribed
     * @return $this3
     */
    public function setSubscribed ( $subscribed );
}