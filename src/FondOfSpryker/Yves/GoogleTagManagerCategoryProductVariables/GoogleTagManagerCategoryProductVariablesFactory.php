<?php

namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductVariables;

use Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class GoogleTagManagerCategoryProductVariablesFactory extends AbstractFactory
{
    /**
     * @return MoneyPluginInterface
     * @throws \Spryker\Yves\Kernel\Exception\Container\ContainerKeyNotFoundException
     */
    public function getMoneyPlugin(): MoneyPluginInterface
    {
        return $this->getProvidedDependency(GoogleTagManagerCategoryProductVariablesDepedencyProvider::PLUGIN_MONEY);
    }
}
