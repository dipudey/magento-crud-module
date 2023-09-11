<?php

namespace Dipu\MyBlog\Model\ResourceModel\Blog;

use Dipu\MyBlog\Model\Blog;
use Dipu\MyBlog\Model\ResourceModel\Blog as BlogResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Blog::class, BlogResource::class);
    }
}
