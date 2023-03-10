<?php

namespace ContainerTuzjB06;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_SECw_WService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.SECw_.w' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.SECw_.w'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'clienteRepository' => ['privates', 'App\\Repository\\ClienteRepository', 'getClienteRepositoryService', true],
            'repository' => ['privates', 'App\\Repository\\VentaRepository', 'getVentaRepositoryService', true],
        ], [
            'clienteRepository' => 'App\\Repository\\ClienteRepository',
            'repository' => 'App\\Repository\\VentaRepository',
        ]);
    }
}
