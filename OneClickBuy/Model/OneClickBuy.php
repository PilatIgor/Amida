<?php

namespace Amida\OneClickBuy\Model;

use Amida\OneClickBuy\Api\Data\OneClickBuyInterface;
use Magento\Framework\Model\AbstractModel;

class OneClickBuy extends AbstractModel implements OneClickBuyInterface
{
    public function _construct()
    {
        $this->_init(\Amida\OneClickBuy\Model\ResourceModel\OneClickBuy::class);
    }

    /**
     * @inheriDoc
     */
    public function getId(): ?int
    {
        return parent::getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function getSku(): ?string
    {
        return parent::getData(self::SKU);
    }

    /**
     * @inheritDoc
     */
    public function getUserPhone(): ?string
    {
        return parent::getData(self::USER_NUMBER);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): ?string
    {
        return parent::getData(self::CREATION_TIME);
    }

    /**
     * @inheriDoc
     */
    public function setId($orderId): OneClickBuyInterface
    {
        return $this->setData(self::ID, $orderId);
    }

    /**
     * @inheritDoc
     */
    public function setSku(string $sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * @inheritDoc
     */
    public function setUserPhone(string $userPhone)
    {
        return $this->setData(self::USER_NUMBER, $userPhone);
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt(string $createdAt)
    {
        return $this->setData(self::CREATION_TIME, $createdAt);
    }
}