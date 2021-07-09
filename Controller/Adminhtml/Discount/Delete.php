<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Controller\Adminhtml\Discount;

class Delete extends \Sacsi\ProductDiscount1\Controller\Adminhtml\Discount
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('discount_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Sacsi\ProductDiscount1\Model\Discount::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Discount.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['discount_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Discount to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

