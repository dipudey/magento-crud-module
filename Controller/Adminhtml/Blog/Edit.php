<?php

namespace Dipu\MyBlog\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Edit extends Action
{

    const ADMIN_RESOURCE = 'Dipu_MyBlog::myblog_save';

    protected $pageFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory
    )
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu('Dipu_MyBlog::myblog');
        $page->getConfig()->getTitle()->prepend(__('Edit Blog'));

        return $page;
    }
}
