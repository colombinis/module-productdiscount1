<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Api\Data;

interface DiscountSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Discount list.
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface[]
     */
    public function getItems();

    /**
     * Set sku list.
     * @param \Sacsi\ProductDiscount1\Api\Data\DiscountInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

