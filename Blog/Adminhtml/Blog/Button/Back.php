<?php

namespace Dipu\MyBlog\Blog\Adminhtml\Blog\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Framework\UrlInterface;

class Back implements ButtonProviderInterface
{

    private UrlInterface $urlBuilder;

    public function __construct(
        UrlInterface $url
    )
    {
        $this->urlBuilder = $url;
    }

    public function getButtonData(): array
    {
        $url = $this->urlBuilder->getUrl('*/*/');

        return [
            'label' => __('Back'),
            'class' => 'back',
            'on_click' => sprintf("location.href = '%s';", $url),
        ];
    }
}
