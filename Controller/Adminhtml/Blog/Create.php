<?php

namespace Dipu\MyBlog\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Create extends Action
{
    const ADMIN_RESOURCE = 'Dipu_MyBlog::myblog_save';

    protected $pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    )
    {
        parent::__construct($context);

        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu("Dipu_MyBlog:myblog");
        $page->getConfig()->getTitle()->prepend(__("Create New Blog Post"));

        return $page;

    }
}
