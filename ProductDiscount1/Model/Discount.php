<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Model;

use Magento\Framework\Api\DataObjectHelper;
use Sacsi\ProductDiscount1\Api\Data\DiscountInterface;
use Sacsi\ProductDiscount1\Api\Data\DiscountInterfaceFactory;

class Discount extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $discountDataFactory;

    protected $_eventPrefix = 'sacsi_productdiscount1_discount';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param DiscountInterfaceFactory $discountDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Sacsi\ProductDiscount1\Model\ResourceModel\Discount $resource
     * @param \Sacsi\ProductDiscount1\Model\ResourceModel\Discount\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        DiscountInterfaceFactory $discountDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Sacsi\ProductDiscount1\Model\ResourceModel\Discount $resource,
        \Sacsi\ProductDiscount1\Model\ResourceModel\Discount\Collection $resourceCollection,
        array $data = []
    ) {
        $this->discountDataFactory = $discountDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve discount model with discount data
     * @return DiscountInterface
     */
    public function getDataModel()
    {
        $discountData = $this->getData();
        
        $discountDataObject = $this->discountDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $discountDataObject,
            $discountData,
            DiscountInterface::class
        );
        
        return $discountDataObject;
    }
}

