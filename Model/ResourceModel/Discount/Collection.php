<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Model\ResourceModel\Discount;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * @var string
     */
    protected $_idFieldName = 'discount_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Sacsi\ProductDiscount1\Model\Discount::class,
            \Sacsi\ProductDiscount1\Model\ResourceModel\Discount::class
        );
    }
}

