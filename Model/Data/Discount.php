<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Model\Data;

use Sacsi\ProductDiscount1\Api\Data\DiscountInterface;

class Discount extends \Magento\Framework\Api\AbstractExtensibleObject implements DiscountInterface
{

    /**
     * Get discount_id
     * @return string|null
     */
    public function getDiscountId()
    {
        return $this->_get(self::DISCOUNT_ID);
    }

    /**
     * Set discount_id
     * @param string $discountId
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     */
    public function setDiscountId($discountId)
    {
        return $this->setData(self::DISCOUNT_ID, $discountId);
    }

    /**
     * Get sku
     * @return string|null
     */
    public function getSku()
    {
        return $this->_get(self::SKU);
    }

    /**
     * Set sku
     * @param string $sku
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     */
    public function setSku($sku)
    {
        return $this->setData(self::SKU, $sku);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Sacsi\ProductDiscount1\Api\Data\DiscountExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Sacsi\ProductDiscount1\Api\Data\DiscountExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->_get(self::CUSTOMER_ID);
    }

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * Get discount
     * @return string|null
     */
    public function getDiscount()
    {
        return $this->_get(self::DISCOUNT);
    }

    /**
     * Set discount
     * @param string $discount
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     */
    public function setDiscount($discount)
    {
        return $this->setData(self::DISCOUNT, $discount);
    }
}

