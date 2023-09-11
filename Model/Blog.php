<?php

namespace Dipu\MyBlog\Model;

use Magento\Framework\Model\AbstractModel;

class Blog extends AbstractModel
{

    protected function _construct()
    {
        $this->_init(ResourceModel\Blog::class);
    }
}
