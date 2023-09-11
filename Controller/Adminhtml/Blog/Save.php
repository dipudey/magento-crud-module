<?php

namespace Dipu\MyBlog\Controller\Adminhtml\Blog;

use Dipu\MyBlog\Model\BlogFactory;
use Dipu\MyBlog\Model\ResourceModel\Blog as BlogResource;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\NotFoundException;

class Save extends Action implements HttpPostActionInterface
{
    const ADMIN_RESOURCE = 'Dipu_MyBlog::myblog_save';

    protected $blogFactory;

    protected $blogResource;


    public function __construct(
        Context      $context,
        BlogFactory  $blogFactory,
        BlogResource $blogResource
    )
    {
        parent::__construct($context);

        $this->blogFactory = $blogFactory;
        $this->blogResource = $blogResource;
    }

    public function execute()
    {
        $post = $this->getRequest()->getPost();

        $blog = $this->blogFactory->create();
        $redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);

        if (intval($post->id)) {
            try {
                $this->blogResource->load($blog, $post->id);
                if (!$blog->getData('id')) {
                    throw new NotFoundException(__("Post not found"));
                }
            } catch (\Exception $exception) {
                $this->messageManager->addErrorMessage($exception->getMessage());
                return $redirect->setPath('*/*/');
            }
        } else {
            unset($post->id);
        }


        $blog->setData(array_merge($blog->getData(), $post->toArray()));
        try {
            $this->blogResource->save($blog);

            $this->messageManager->addSuccessMessage(__('The record has been saved.'));
        } catch (\Exception $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            return $redirect->setPath('*/*/');
        }

        return $redirect->setPath("*/*/index");

    }
}
