<?php

namespace Dipu\MyBlog\Setup\Patch\Data;

use Dipu\MyBlog\Model\ResourceModel\Blog;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class InitialsBlogs implements DataPatchInterface
{

    protected $moduleDataSetup;

    protected $connection;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        ResourceConnection       $connection
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->connection = $connection;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $connection = $this->connection->getConnection();
        $data = [
            [
                'title' => "First Blog Post",
                'content' => "This is a simple blog post from dipu myblog module",
                'is_published' => 1
            ],
            [
                'title' => "Second Blog Post",
                'content' => "Second blog post content",
                'is_published' => 1
            ],
            [
                'title' => "Third Blog Post",
                'content' => "Third blog post content",
                'is_published' => 1
            ],
        ];
        $connection->insertMultiple(Blog::MAIN_TABLE, $data);

        return $this;
    }
}
