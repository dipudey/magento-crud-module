<?php

namespace Dipu\MyBlog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Blog extends AbstractDb
{
    const MAIN_TABLE = 'dipu_blogs';

    const ID_FIELD_NAME = 'id';

    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
