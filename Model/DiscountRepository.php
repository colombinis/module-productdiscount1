<?php
declare(strict_types=1);

namespace Sacsi\ProductDiscount1\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;
use Sacsi\ProductDiscount1\Api\Data\DiscountInterfaceFactory;
use Sacsi\ProductDiscount1\Api\Data\DiscountSearchResultsInterfaceFactory;
use Sacsi\ProductDiscount1\Api\DiscountRepositoryInterface;
use Sacsi\ProductDiscount1\Model\ResourceModel\Discount as ResourceDiscount;
use Sacsi\ProductDiscount1\Model\ResourceModel\Discount\CollectionFactory as DiscountCollectionFactory;

class DiscountRepository implements DiscountRepositoryInterface
{

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    private $storeManager;

    protected $dataDiscountFactory;

    protected $dataObjectHelper;

    protected $discountCollectionFactory;

    protected $discountFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;


    /**
     * @param ResourceDiscount $resource
     * @param DiscountFactory $discountFactory
     * @param DiscountInterfaceFactory $dataDiscountFactory
     * @param DiscountCollectionFactory $discountCollectionFactory
     * @param DiscountSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceDiscount $resource,
        DiscountFactory $discountFactory,
        DiscountInterfaceFactory $dataDiscountFactory,
        DiscountCollectionFactory $discountCollectionFactory,
        DiscountSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->discountFactory = $discountFactory;
        $this->discountCollectionFactory = $discountCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataDiscountFactory = $dataDiscountFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Sacsi\ProductDiscount1\Api\Data\DiscountInterface $discount
    ) {
        /* if (empty($discount->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $discount->setStoreId($storeId);
        } */
        
        $discountData = $this->extensibleDataObjectConverter->toNestedArray(
            $discount,
            [],
            \Sacsi\ProductDiscount1\Api\Data\DiscountInterface::class
        );
        
        $discountModel = $this->discountFactory->create()->setData($discountData);
        
        try {
            $this->resource->save($discountModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the discount: %1',
                $exception->getMessage()
            ));
        }
        return $discountModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($discountId)
    {
        $discount = $this->discountFactory->create();
        $this->resource->load($discount, $discountId);
        if (!$discount->getId()) {
            throw new NoSuchEntityException(__('Discount with id "%1" does not exist.', $discountId));
        }
        return $discount->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->discountCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Sacsi\ProductDiscount1\Api\Data\DiscountInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Sacsi\ProductDiscount1\Api\Data\DiscountInterface $discount
    ) {
        try {
            $discountModel = $this->discountFactory->create();
            $this->resource->load($discountModel, $discount->getDiscountId());
            $this->resource->delete($discountModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Discount: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($discountId)
    {
        return $this->delete($this->get($discountId));
    }
}

