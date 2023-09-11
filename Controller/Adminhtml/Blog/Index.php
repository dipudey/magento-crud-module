<?php

namespace Dipu\MyBlog\Controller\Adminhtml\Blog;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Dipu_MyBlog::myblog';

    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);

        $this->pageFactory = $pageFactory;
    }

    /**
     * @return Page
     */
    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->setActiveMenu("Dipu_MyBlog:myblog");
        $page->getConfig()->getTitle()->prepend(__("Dipu Blog Posts"));

        return $page;
    }
}
