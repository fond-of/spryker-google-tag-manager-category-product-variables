<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductVariables\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \FondOfSpryker\Yves\GoogleTagManagerCategoryProductVariables\GoogleTagManagerCategoryProductVariablesFactory getFactory()
 */
class PricePlugin extends AbstractPlugin implements GoogleTagManagerExtensionPluginInterface
{
    public const PARAM_PRODUCTS = 'products';
    public const PARAM_PRODUCT_PRICE = 'price';

    public const FIELD_PRICE = 'price';

    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        if (!isset($params[static::PARAM_PRODUCT_PRICE])) {
            return [];
        }

        $priceInt = $params[static::PARAM_PRODUCT_PRICE];

        return [
            static::FIELD_PRICE => $this->getFactory()->getMoneyPlugin()->convertIntegerToDecimal($priceInt)
        ];
    }
}
