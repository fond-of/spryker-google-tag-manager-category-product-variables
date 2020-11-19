<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductVariables\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

class IdProductAbstractPlugin extends AbstractPlugin implements GoogleTagManagerExtensionPluginInterface
{
    public const PARAM_PRODUCTS = 'products';
    public const PARAM_PRODUCT_ID_ABSTRACT = 'id_product_abstract';

    public const FIELD_PRODUCT_ID_ABSTRACT = 'idProductAbstract';

    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        if ($this->isParamsValid($params) === true) {
            return [];
        }

        return [
            static::FIELD_PRODUCT_ID_ABSTRACT => $params[static::PARAM_PRODUCTS][static::PARAM_PRODUCT_ID_ABSTRACT]
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

        if (!isset($params[static::PARAM_PRODUCTS][static::PARAM_PRODUCT_ID_ABSTRACT])) {
            return false;
        }

        return true;
    }
}
