<?php

namespace Amida\OneClickBuy\Block\Product;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Block\Product\View as ProductView;

class OneClickButton extends Template
{
    /**
     * @var ProductView
     */
    protected ProductView $product;

    public function __construct(
        Template\Context $context,
        ProductView $product,
        array $data = []
    )
    {
        $this->product = $product;
        parent::__construct($context, $data);
    }

    /**
     * Get current product SKU
     *
     * @return false|string
     */
    public function getProductSku()
    {
        $product = $this->product->getProduct();
        if ($product) {
            return $product->getSku();
        }
        return false;
    }
}