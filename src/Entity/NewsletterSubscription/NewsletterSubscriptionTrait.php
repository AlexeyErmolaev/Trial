<?php
namespace Armor\Trial\Entity\NewsletterSubscription;
trait NewsletterSubscriptionTrait
{
    /**
     * @OneToOne(targetEntity="Armor\Trial\Entity\JobTitle\NewsletterSubscriptionEntity", cascade={"persist", "remove"})
     * @JoinColumn(name="data_id", referencedColumnName="data_id")
     * @var NewsletterSubscriptionEntity
     */
    protected $subscribed;

    /**
     * @return NewsletterSubscriptionEntityInterface
     */
    public function getNewsletterSubscriptionEntity ()
    {
        return $this->subscribed;
    }

    /**
     * @param NewsletterSubscriptionEntityInterface $newsletterSubscriptionEntityInterface
     * @return $this
     */
    public function setNewsletterSubscriptionEntity(NewsletterSubscriptionEntityInterface $newsletterSubscriptionEntityInterface)
    {
        $this->subscribed = $newsletterSubscriptionEntityInterface;
        return $this;
    }
}