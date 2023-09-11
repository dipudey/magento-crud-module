<?php

namespace Dipu\MyBlog\Controller\Adminhtml\Blog;

use Dipu\MyBlog\Model\BlogFactory;
use Dipu\MyBlog\Model\ResourceModel\Blog as BlogResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Delete extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Dipu_MyBlog::myblog_delete';

    protected $blogFactory;

    protected $blogResource;

    public function __construct(
        Context      $context,
        BlogFactory  $blogFactory,
        BlogResource $blogResource,
    )
    {
        $this->blogFactory = $blogFactory;
        $this->blogResource = $blogResource;

        parent::__construct($context);
    }

    public function execute()
    {

        try {
            $id = $this->getRequest()->getParam('id');

            $blog = $this->blogFactory->create();
            $this->blogResource->load($blog, $id);
            if (!$blog->getId()) {
                $this->messageManager->addErrorMessage(__('The record does not exist.'));
            }

            $this->blogResource->delete($blog);
            $this->messageManager->addSuccessMessage(__('The record has been deleted.'));

        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
        }


        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $redirect->setPath("*/*");

    }
}
