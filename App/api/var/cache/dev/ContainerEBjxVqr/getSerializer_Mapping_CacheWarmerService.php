<?php

namespace ContainerEBjxVqr;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSerializer_Mapping_CacheWarmerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'serializer.mapping.cache_warmer' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\CacheWarmer\SerializerCacheWarmer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'http-kernel'.\DIRECTORY_SEPARATOR.'CacheWarmer'.\DIRECTORY_SEPARATOR.'CacheWarmerInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'CacheWarmer'.\DIRECTORY_SEPARATOR.'AbstractPhpFileCacheWarmer.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'CacheWarmer'.\DIRECTORY_SEPARATOR.'SerializerCacheWarmer.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Mapping'.\DIRECTORY_SEPARATOR.'Loader'.\DIRECTORY_SEPARATOR.'LoaderInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Mapping'.\DIRECTORY_SEPARATOR.'Loader'.\DIRECTORY_SEPARATOR.'AnnotationLoader.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Mapping'.\DIRECTORY_SEPARATOR.'Loader'.\DIRECTORY_SEPARATOR.'FileLoader.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Mapping'.\DIRECTORY_SEPARATOR.'Loader'.\DIRECTORY_SEPARATOR.'YamlFileLoader.php';

        return $container->privates['serializer.mapping.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\SerializerCacheWarmer([0 => new \Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader(($container->privates['annotations.cached_reader'] ?? $container->getAnnotations_CachedReaderService())), 1 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'cliente.yaml')), 2 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'detalle.yaml')), 3 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'persona.yaml')), 4 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'producto.yaml')), 5 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'venta.yaml')), 6 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'cliente.yaml')), 7 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'detalle.yaml')), 8 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'persona.yaml')), 9 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'producto.yaml')), 10 => new \Symfony\Component\Serializer\Mapping\Loader\YamlFileLoader((\dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'config'.\DIRECTORY_SEPARATOR.'serializer'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'venta.yaml'))], ($container->targetDir.''.'/serialization.php'));
    }
}
