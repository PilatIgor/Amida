<?php

namespace Amida\OneClickBuy\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Amida\OneClickBuy\Api\Data;
use Amida\OneClickBuy\Api\OneClickBuyRepositoryInterface;
use Amida\OneClickBuy\Model\ResourceModel\OneClickBuy\CollectionFactory as OneClickBuyCollectionFactory;

class OneClickBuyRepository implements OneClickBuyRepositoryInterface
{
    /**
     * @var ResourceModel\OneClickBuy
     */
    private $resource;

    /**
     * @var OneClickBuyCollectionFactory
     */
    private $storeCollectionFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var Data\OneClickBuyInterfaceFactory
     */
    private $dataStoreFactory;

    /**
     * @param ResourceModel\OneClickBuy $resource
     * @param Data\OneClickBuyInterfaceFactory $dataStoreFactory
     * @param OneClickBuyCollectionFactory $storeCollectionFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        \Amida\OneClickBuy\Model\ResourceModel\OneClickBuy $resource,
        \Amida\OneClickBuy\Api\Data\OneClickBuyInterfaceFactory $dataStoreFactory,
        OneClickBuyCollectionFactory $storeCollectionFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->collectionProcessor = $collectionProcessor;
        $this->dataStoreFactory = $dataStoreFactory;
        $this->storeCollectionFactory = $storeCollectionFactory;
    }

    /**
     * @param Data\OneClickBuyInterface $order
     * @return Data\OneClickBuyInterface
     * @throws CouldNotSaveException
     */
    public function save(\Amida\OneClickBuy\Api\Data\OneClickBuyInterface $order)
    {
        try {
            $this->resource->save($order);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $order;
    }

    /**
     * @param int $orderId
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getById($orderId)
    {
        $store = $this->dataStoreFactory->create();
        $this->resource->load($store, $orderId);
        if (!$store->getId()) {
            throw new NoSuchEntityException(__('The order with the "%1" ID doesn\'t exist.', $orderId));
        }
        return $store;
    }

    /**
     * @param Data\OneClickBuyInterface $orderId
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(\Amida\OneClickBuy\Api\Data\OneClickBuyInterface $orderId)
    {
        try {
            $this->resource->delete($orderId);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * @param int $orderId
     * @return bool
     */
    public function deleteById($orderId)
    {
        return $this->delete($this->getById($orderId));
    }
}
