<?php

namespace Amida\OneClickBuy\Model\OneClickBuy;

use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Amida\OneClickBuy\Model\ResourceModel\OneClickBuy\CollectionFactory;


class DataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
    /**
     * @var \Amida\OneClickBuy\Model\ResourceModel\OneClickBuy\Collection
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $storeCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     * @param PoolInterface|null $pool
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $storeCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        $this->collection = $storeCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var \Amida\OneClickBuy\Model\OneClickBuy $OneClickBuy */
        foreach ($items as $order) {
            $this->loadedData[$order->getId()] = $order->getData();
        }

        $data = $this->dataPersistor->get('one_click_orders');
        if (!empty($data)) {
            $order = $this->collection->getNewEmptyItem();
            $order->setData($data);
            $this->loadedData[$order->getId()] = $order->getData();
            $this->dataPersistor->clear('one_click_orders');
        }

        return $this->loadedData;
    }

}