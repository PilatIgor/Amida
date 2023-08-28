<?php

namespace Amida\OneClickBuy\Controller\Product;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Amida\OneClickBuy\Model\OneClickBuyFactory;
use Magento\Framework\App\RequestInterface;

class OneClickOrder implements ActionInterface
{
    /**
     * @var RequestInterface
     */
    protected RequestInterface $request;

    /**
     * @var ResultFactory
     */
    protected ResultFactory $resultFactory;

    /**
     * @var OneClickBuyFactory
     */
    protected OneClickBuyFactory $oneClickFactory;

    /**
     * @param Context $context
     * @param ResultFactory $resultFactory
     * @param OneClickBuyFactory $oneClickFactory
     * @param RequestInterface $request
     */
    public function __construct(
        Context $context,
        ResultFactory $resultFactory,
        OneClickBuyFactory $oneClickFactory,
        RequestInterface $request
    )
    {
        $this->request = $request;
        $this->resultFactory = $resultFactory;
        $this->oneClickFactory = $oneClickFactory;
    }

    public function execute()
    {
        $phoneNumber = $this->request->getParam('phone');
        $productSku = $this->request->getParam('sku');

        $customData = $this->oneClickFactory->create();
        $customData->setUserPhone($phoneNumber);
        $customData->setSku($productSku);
        $customData->save();

        $response = [
            'message' => 'Data saved successfully'
        ];

        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($response);

        return $resultJson;
    }
}