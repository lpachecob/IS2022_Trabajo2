<?php

namespace ContainerEBjxVqr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_AXArdkmService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.aXArdkm' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.aXArdkm'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'persona' => ['privates', 'App\\Repository\\PersonaRepository', 'getPersonaRepositoryService', true],
            'repository' => ['privates', 'App\\Repository\\ClienteRepository', 'getClienteRepositoryService', true],
        ], [
            'persona' => 'App\\Repository\\PersonaRepository',
            'repository' => 'App\\Repository\\ClienteRepository',
        ]);
    }
}