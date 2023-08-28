<?php

namespace Amida\OneClickBuy\Api;

interface OneClickBuyRepositoryInterface
{
    /**
     * Save order.
     *
     * @param \Amida\OneClickBuy\Api\Data\OneClickBuyInterface $order
     * @return \Amida\OneClickBuy\Api\Data\OneClickBuyInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Amida\OneClickBuy\Api\Data\OneClickBuyInterface $order);

    /**
     * Retrieve order.
     *
     * @param int $orderId
     * @return \Amida\OneClickBuy\Api\Data\OneClickBuyInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById(int $orderId);

    /**
     * Delete order.
     *
     * @param \Amida\OneClickBuy\Api\Data\OneClickBuyInterface $order
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Amida\OneClickBuy\Api\Data\OneClickBuyInterface $order);

    /**
     * Delete order by ID.
     *
     * @param int $orderId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $orderId);
}
