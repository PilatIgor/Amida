<?php

namespace Amida\OneClickBuy\Api\Data;

interface OneClickBuyInterface
{
    const ID = "id";
    const SKU = "sku";
    const USER_NUMBER = "user_phone";
    const CREATION_TIME     = "created_at";

    /**
     * Get id
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Get product SKU
     *
     * @return string|null
     */
    public function getSku(): ?string;

    /**
     * Get user phone
     *
     * @return string|null
     */
    public function getUserPhone(): ?string;

    /**
     * Get created at time
     *
     * @return string|null
     */
    public function getCreatedAt(): ?string;

    /**
     * Set Id
     *
     * @param int $id
     * @return \Amida\OneClickBuy\Api\Data\OneClickBuyInterface
     */
    public function setId(int $id): OneClickBuyInterface;

    /**
     * Set sku
     *
     * @param string $sku
     * @return \Amida\OneClickBuy\Api\Data\OneClickBuyInterface
     */
    public function setSku(string $sku);

    /**
     * Set user phone number
     *
     * @param string $userPhone
     * @return \Amida\OneClickBuy\Api\Data\OneClickBuyInterface
     */
    public function setUserPhone(string $userPhone);

    /**
     * Set created at time
     *
     * @param string $createdAt
     * @return \Amida\OneClickBuy\Api\Data\OneClickBuyInterface
     */
    public function setCreatedAt(string $createdAt);
}
