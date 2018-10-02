<?php
namespace Armor\Trial\Entity\Author;
trait DataAuthorTrait {
  /**
   * @OneToOne(targetEntity="Armor\Trial\Entity\Author\DataAuthorEntity", cascade={"persist"})
   * @JoinColumn(name="data_id", referencedColumnName="data_id")
   * @var DataAuthorEntityInterface
   */
  protected $authorEntity;

  /**
   * @return DataAuthorEntityInterface
   */
  public function getAuthorEntity ()
  {
    return $this->authorEntity;
  }

  /**
   * @param DataAuthorEntityInterface $entity
   * @return $this
   */
  public function setAuthorEntity(DataAuthorEntityInterface $entity)
  {
    $this->authorEntity = $entity;
    return $this;
  }
}