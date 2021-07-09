<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface DiscountRepositoryInterface
{

    /**
     * Save Discount
     * @param \Sacsi\ProductDiscount1\Api\Data\DiscountInterface $discount
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Sacsi\ProductDiscount1\Api\Data\DiscountInterface $discount
    );

    /**
     * Retrieve Discount
     * @param string $discountId
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($discountId);

    /**
     * Retrieve Discount matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Sacsi\ProductDiscount1\Api\Data\DiscountSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Discount
     * @param \Sacsi\ProductDiscount1\Api\Data\DiscountInterface $discount
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Sacsi\ProductDiscount1\Api\Data\DiscountInterface $discount
    );

    /**
     * Delete Discount by ID
     * @param string $discountId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($discountId);
}

