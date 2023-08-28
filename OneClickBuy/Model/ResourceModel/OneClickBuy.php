<?php

namespace Amida\OneClickBuy\Model\ResourceModel;

class OneClickBuy extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Dependency Initilization
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init("one_click_orders", "id");
    }
}