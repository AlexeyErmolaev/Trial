<?php
    namespace Armor\Trial\Entity\Product;
    use Armor\Trial\Entity\DataBasic\DataBasicTrait;
    use JsonSerializable;

    /**
     * @Entity
     * @Table(name="data_trial")
     */
    class ProductEntity implements ProductEntityInterface, JsonSerializable
    {
        const OS_LINUX = "Linux";
        const OS_WINDOWS = "Windows";

        const MSSQL = "MSSQL";
        const POSTRGE_SQL = "PostgreSQL";
        const AMAZON_REDSHIFT = "Amazon Redshift";
        const AMAZON_AURORA = "Amazon Aurora";
        const DB2 = "DB2";
        const MARIA_DB = "MariaDB";
        const GREEN_PLUM = "Greenplum";
        const TERADATA = "Teradata";
        const MYSQL = "MySQL";
        const NETEZZA = "Netezza";
        const ORACLE = "Oracle";

        use DataBasicTrait;

        /**
         * @Id
         * @Column(name="data_id", type="integer", nullable=false)
         * @GeneratedValue()
         */
        protected $data_id = 0;

        /**
         * @operating_system @Column(type="string", length=255)
         * @var string
         */

        protected $operating_system;
        /**
         * @database_name @Column(type="string", length=50)
         * @var string
         */
        protected $database_name;



        /**
         * @return mixed
         */
        public function getDataId ()
        {
            return $this->data_id;
        }

        /**
         * @param mixed $data_id
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
        public function getOperatingSystem ()
        {
            return $this->operating_system;
        }

        /**
         * @param string $operating_system
         * @return $this
         */
        public function setOperatingSystem ( $operating_system )
        {
            $this->operating_system = $operating_system;
            return $this;
        }

        /**
         * @return string
         */
        public function getDatabaseName ()
        {
            return $this->database_name;
        }

        /**
         * @param string $database_name
         * @return $this
         */
        public function setDatabaseName ( $database_name )
        {
            $this->database_name = $database_name;
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
                "db"=>$this->getDatabaseName(),
                "os"=>$this->getOperatingSystem()
            ];
        }
    }