<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Api\Data;

interface DiscountInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const SKU = 'sku';
    const CUSTOMER_ID = 'customer_id';
    const DISCOUNT_ID = 'discount_id';
    const DISCOUNT = 'discount';

    /**
     * Get discount_id
     * @return string|null
     */
    public function getDiscountId();

    /**
     * Set discount_id
     * @param string $discountId
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     */
    public function setDiscountId($discountId);

    /**
     * Get sku
     * @return string|null
     */
    public function getSku();

    /**
     * Set sku
     * @param string $sku
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     */
    public function setSku($sku);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Sacsi\ProductDiscount1\Api\Data\DiscountExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Sacsi\ProductDiscount1\Api\Data\DiscountExtensionInterface $extensionAttributes
    );

    /**
     * Get customer_id
     * @return string|null
     */
    public function getCustomerId();

    /**
     * Set customer_id
     * @param string $customerId
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     */
    public function setCustomerId($customerId);

    /**
     * Get discount
     * @return string|null
     */
    public function getDiscount();

    /**
     * Set discount
     * @param string $discount
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     */
    public function setDiscount($discount);
}

