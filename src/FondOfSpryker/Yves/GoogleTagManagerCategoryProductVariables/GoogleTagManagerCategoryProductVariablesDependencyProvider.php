<?php


namespace FondOfSpryker\Yves\GoogleTagManagerCategoryProductVariables;


use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;
use Spryker\Zed\Money\Communication\Plugin\MoneyPlugin;

class GoogleTagManagerCategoryProductVariablesDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PLUGIN_MONEY = 'PLUGIN_MONEY';

    /**
     * @param Container $container
     * @return Container
     */
    public function provideDependencies(Container $container): Container
    {
        $container = $this->addMoneyPlugin($container);

        return $container;
    }

    /**
     * @param Container $container
     * @return Container
     * @throws \Spryker\Service\Container\Exception\FrozenServiceException
     */
    protected function addMoneyPlugin(Container $container): Container
    {
        $container->set(static::PLUGIN_MONEY, static function () {
            return new MoneyPlugin();
        });

        return $container;
    }
}
