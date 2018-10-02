<?php
    namespace Armor\Trial\Entity\Comments;

    interface SetDataCommentsEntityInterface
    {
        /**
         * @param DataCommentsEntityInterface $commentsEntityInterface
         * @return $this
         */
        public function setCommentEntity(DataCommentsEntityInterface $commentsEntityInterface);
    }