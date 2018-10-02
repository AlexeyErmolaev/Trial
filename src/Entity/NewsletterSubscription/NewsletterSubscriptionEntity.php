<?php
namespace Armor\Trial\Entity\NewsletterSubscription;
use Armor\Trial\Entity\DataBasic\DataBasicTrait;
use JsonSerializable;

/**
 * @Entity
 * @Table(name="newslettersubscription")
 */
class NewsletterSubscriptionEntity implements NewsletterSubscriptionEntityInterface, JsonSerializable
{
    use DataBasicTrait;
    /**
     * @Id
     * @Column(name="data_id", type="integer", nullable=false)
     * @GeneratedValue()
     */
    protected $data_id;

    /**
     * @Column(name="subscribed", type="integer")
     * @var int
     */
    protected $subscribed;

    /**
     * @return int
     */
    public function getDataId ()
    {
        return $this->data_id;
    }

    /**
     * @param int $data_id
     * @return $this
     */
    public function setDataId ( $data_id )
    {
        $this->data_id = $data_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscribed ()
    {
        return $this->subscribed;
    }

    /**
     * @param string $job_title
     * @return $this
     */
    public function setSubscribed ( $subscribed )
    {
        $this->subscribed = $subscribed;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize ()
    {
        return [
            "subscribed"=>(bool) $this->getSubscribed()
        ];
    }
}