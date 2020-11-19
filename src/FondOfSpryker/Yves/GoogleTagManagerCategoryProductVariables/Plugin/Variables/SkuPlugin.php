<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductVariables\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

class SkuPlugin extends AbstractPlugin implements GoogleTagManagerExtensionPluginInterface
{
    public const PARAM_PRODUCTS = 'products';
    public const PARAM_PRODUCT_ABSTRACT_SKU = 'abstract_sku';

    public const FIELD_SKU = 'sku';

    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        if ($this->isParamsValid($params) === false) {
            return [];
        }

        $sku = str_replace('ABSTRACT-', '', strtoupper($params[static::PARAM_PRODUCTS][static::PARAM_PRODUCT_ABSTRACT_SKU]));

        return [
            static::FIELD_SKU => $sku
        ];
    }

    /**
     * @param array $params
     *
     * @return bool
     */
    protected function isParamsValid(array $params): bool
    {
        if (!isset($params[static::PARAM_PRODUCTS])) {
            return false;
        }

        if (!isset($params[static::PARAM_PRODUCTS][static::PARAM_PRODUCT_ABSTRACT_SKU])) {
            return false;
        }

        return true;
    }
}
