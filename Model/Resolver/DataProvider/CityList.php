<?php

namespace Eadesigndev\RomCity\Model\Resolver\DataProvider;

use Magento\Directory\Model\CountryFactory;
use \Magento\Directory\Model\RegionFactory;

class CityList
{
    protected $collectionFactory;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     * @var Country
     */
    public $countryFactory;

    public function __construct(
        \Eadesigndev\RomCity\Model\ResourceModel\Collection\CollectionFactory $cityCollectionFactory,
        \Psr\Log\LoggerInterface                                              $logger
    )
    {
        $this->cityCollectionFactory = $cityCollectionFactory;
        $this->logger = $logger;
    }

    public function getSupplierData($regionId)
    {
        try {
            $collection = $this->cityCollectionFactory->create();
            if (!empty($regionId)){
                $collection->addFieldToFilter('region_id', $regionId);
            }
            $count = $collection->getSize();
            $cityList = [];
            foreach ($collection as $data) {
                $id = $data->getId();
                $cityList[$id]['id'] = $data->getId();
                $cityList[$id]['region_id'] = $data->getRegionId();
                $cityList[$id]['city'] = $data->getCity();
            }
        } catch (NoSuchEntityException $e) {
            throw new GraphQlNoSuchEntityException(__($e->getMessage()), $e);
        }
        return [
            'total_count' => $count, 'cityList' => $cityList];
    }
}
