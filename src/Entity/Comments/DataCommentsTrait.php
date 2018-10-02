<?php
    namespace Armor\Trial\Entity\Comments;

    trait DataCommentsTrait
    {
        /**
         * @OneToOne(targetEntity="Armor\Trial\Entity\Comments\DataCommentsEntity", cascade={"persist", "remove"})
         * @JoinColumn(name="data_id", referencedColumnName="data_id")
         * @var DataCommentsEntityInterface
         */
        protected $data_comments;

        /**
         * @return DataCommentsEntityInterface
         */
        public function getCommentEntity ()
        {
            return $this->data_comments;
        }

        /**
         * @param DataCommentsEntityInterface $commentsEntityInterface
         * @return $this
         */
        public function setCommentEntity(DataCommentsEntityInterface $commentsEntityInterface)
        {
            $this->data_comments = $commentsEntityInterface;
            return $this;
        }
    }