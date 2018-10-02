<?php
namespace Armor\Trial\Entity\GuideRequest;

trait DataFileNameTrait
{
    /**
     * @OneToOne(targetEntity="Armor\Trial\Entity\GuideRequest\DataFileNameEntity", cascade={"persist", "remove"})
     * @JoinColumn(name="data_id", referencedColumnName="data_id")
     * @var DataFileNameEntityInterface
     */
    protected $dataFileNameEntity;

    /**
     * @param DataFileNameEntityInterface $dataFileNameEntity
     * @return $this
     */
    public function setFileNameEntity(DataFileNameEntityInterface $dataFileNameEntity)
    {
        $this->dataFileNameEntity = $dataFileNameEntity;
        return $this;
    }
    /**
     * @return DataFileNameEntityInterface
     */
    public function getFileNameEntity()
    {
        return $this->dataFileNameEntity;
    }
}