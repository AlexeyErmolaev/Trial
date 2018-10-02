<?php
namespace Armor\Trial\Entity\GuideRequest;

use Armor\Trial\Entity\DataBasic\DataBasicTrait;

/**
 * @Entity
 * @Table(name="data_filename")
 */

class DataFileNameEntity implements DataFileNameEntityInterface
{

    /**
     * @Id
     * @Column(name="data_id", type="integer", nullable=false)
     * @GeneratedValue()
     * @var int
     */
    protected $data_id;

    /**
     * @filename @Column(type="string", length=255)
     * @var string
     */
    protected $filename;

    use DataBasicTrait;


    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->filename;
    }

    /**
     * @param $fileName
     * @return $this
     */
    public function setFileName($fileName)
    {
        $this->filename = $fileName;
        return $this;
    }
}