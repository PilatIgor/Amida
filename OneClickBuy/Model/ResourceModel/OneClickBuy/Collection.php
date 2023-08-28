<?php

namespace Amida\OneClickBuy\Model\ResourceModel\OneClickBuy;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct() //phpcs:ignore Magento2.CodeAnalysis.EmptyBlock
    {
        parent::_init(
            \Amida\OneClickBuy\Model\OneClickBuy::class,
            \Amida\OneClickBuy\Model\ResourceModel\OneClickBuy::class
        );
    }

}