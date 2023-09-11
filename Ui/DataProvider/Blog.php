<?php

namespace Dipu\MyBlog\Ui\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Dipu\MyBlog\Model\ResourceModel\Blog\CollectionFactory;

class Blog extends AbstractDataProvider
{
    protected $collection;

    private array $loadedData;


    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collectionFactory->create();

        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (!isset($this->loadedData)) {
            $this->loadedData = [];

            foreach ($this->collection->getItems() as $item) {
                $this->loadedData[$item->getData('id')] = $item->getData();
            }
        }

        return $this->loadedData;
    }
}
