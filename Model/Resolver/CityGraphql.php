<?php

namespace Eadesigndev\RomCity\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;

class CityGraphql implements ResolverInterface
{

    private $cityListDataProvider;
    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;


    public function __construct(
        \Eadesigndev\RomCity\Model\Resolver\DataProvider\CityList $cityListDataProvider,
        \Psr\Log\LoggerInterface                                  $logger
    )
    {
        $this->cityListDataProvider = $cityListDataProvider;
        $this->logger = $logger;
    }

    /**
     * @param Field $field
     * @param \Magento\Framework\GraphQl\Query\Resolver\ContextInterface $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array|\Magento\Framework\GraphQl\Query\Resolver\Value|mixed
     */
    public function resolve(
        Field       $field,
                    $context,
        ResolveInfo $info,
        array       $value = null,
        array       $args = null
    )
    {
        $regionId = isset($args['filter']['region_id']['eq']) ? $args['filter']['region_id']['eq'] : '';
        $cityListData = $this->cityListDataProvider->getSupplierData($regionId);
        return $cityListData;
    }
}
