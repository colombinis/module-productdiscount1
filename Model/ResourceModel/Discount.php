<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Model\ResourceModel;

class Discount extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('sacsi_productdiscount1_discount', 'discount_id');
    }
}

