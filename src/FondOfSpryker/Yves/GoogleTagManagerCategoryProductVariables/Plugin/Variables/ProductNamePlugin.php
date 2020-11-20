<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductVariables\Plugin\Variables;

use FondOfSpryker\Yves\GoogleTagManagerCore\Dependency\GoogleTagManagerExtensionPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

class ProductNamePlugin extends AbstractPlugin implements GoogleTagManagerExtensionPluginInterface
{
    public const PARAM_PRODUCTS = 'products';
    public const PARAM_PRODUCT_ATTRIBUTES = 'attributes';
    public const PARAM_PRODUCT_ATTRIBUTE_ABSTRACT_NAME = 'abstract_name';
    public const PARAM_PRODUCT_ATTRIBUTE_NAME_UNTRANSLATED = 'name_untranslated';

    public const FIELD_PRODUCT_NAME = 'name';

    /**
     * @param string $page
     * @param array $params
     *
     * @return array
     */
    public function addVariable(string $page, array $params): array
    {
        if (!isset($params[static::PARAM_PRODUCT_ATTRIBUTES])) {
            return [];
        }

        $attributes = $params[static::PARAM_PRODUCT_ATTRIBUTES];

        $name = isset($attributes[static::PARAM_PRODUCT_ATTRIBUTE_NAME_UNTRANSLATED])
            ?: $attributes[static::PARAM_PRODUCT_ATTRIBUTE_ABSTRACT_NAME];

        return [
            static::FIELD_PRODUCT_NAME => $name
        ];
    }
}
