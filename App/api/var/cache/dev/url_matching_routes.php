<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/clientes' => [[['_route' => 'app_api_cliente_getclientes', '_controller' => 'App\\Controller\\Api\\ClienteController::getClientes'], null, ['GET' => 0], null, false, false, null]],
        '/api/cliente' => [[['_route' => 'app_api_cliente_createcliente', '_controller' => 'App\\Controller\\Api\\ClienteController::createCliente'], null, ['POST' => 0], null, true, false, null]],
        '/api/detalles' => [[['_route' => 'app_api_detalle_getdetalles', '_controller' => 'App\\Controller\\Api\\DetalleController::getDetalles'], null, ['GET' => 0], null, false, false, null]],
        '/api/detalle' => [[['_route' => 'app_api_detalle_createdetalle', '_controller' => 'App\\Controller\\Api\\DetalleController::createDetalle'], null, ['POST' => 0], null, true, false, null]],
        '/api/personas' => [[['_route' => 'app_api_persona_getpersonas', '_controller' => 'App\\Controller\\Api\\PersonaController::getPersonas'], null, ['GET' => 0], null, false, false, null]],
        '/api/persona' => [[['_route' => 'app_api_persona_createpersona', '_controller' => 'App\\Controller\\Api\\PersonaController::createPersona'], null, ['POST' => 0], null, true, false, null]],
        '/api/productos' => [[['_route' => 'app_api_producto_getproductos', '_controller' => 'App\\Controller\\Api\\ProductoController::getProductos'], null, ['GET' => 0], null, false, false, null]],
        '/api/producto' => [[['_route' => 'app_api_producto_createproducto', '_controller' => 'App\\Controller\\Api\\ProductoController::createProducto'], null, ['POST' => 0], null, true, false, null]],
        '/api/ventas' => [[['_route' => 'app_api_venta_getventas', '_controller' => 'App\\Controller\\Api\\VentaController::getVentas'], null, ['GET' => 0], null, false, false, null]],
        '/api/venta' => [[['_route' => 'app_api_venta_createventa', '_controller' => 'App\\Controller\\Api\\VentaController::createVenta'], null, ['POST' => 0], null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/(?'
                    .'|cliente/([^/]++)(?'
                        .'|(*:69)'
                    .')'
                    .'|detalle/([^/]++)(?'
                        .'|(*:96)'
                    .')'
                    .'|p(?'
                        .'|ersona/([^/]++)(?'
                            .'|(*:126)'
                        .')'
                        .'|roducto/([^/]++)(?'
                            .'|(*:154)'
                        .')'
                    .')'
                    .'|venta/([^/]++)(?'
                        .'|(*:181)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        69 => [
            [['_route' => 'app_api_cliente_getcliente', '_controller' => 'App\\Controller\\Api\\ClienteController::getCliente'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_api_cliente_updatecliente', '_controller' => 'App\\Controller\\Api\\ClienteController::updateCliente'], ['id'], ['POST' => 0], null, false, true, null],
            [['_route' => 'app_api_cliente_removecliente', '_controller' => 'App\\Controller\\Api\\ClienteController::RemoveCliente'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        96 => [
            [['_route' => 'app_api_detalle_getdetalle', '_controller' => 'App\\Controller\\Api\\DetalleController::getDetalle'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_api_detalle_updatedetalle', '_controller' => 'App\\Controller\\Api\\DetalleController::updateDetalle'], ['id'], ['POST' => 0], null, false, true, null],
            [['_route' => 'app_api_detalle_removedetalle', '_controller' => 'App\\Controller\\Api\\DetalleController::RemoveDetalle'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        126 => [
            [['_route' => 'app_api_persona_getpersona', '_controller' => 'App\\Controller\\Api\\PersonaController::getPersona'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_api_persona_updatepersona', '_controller' => 'App\\Controller\\Api\\PersonaController::updatePersona'], ['id'], ['POST' => 0], null, false, true, null],
            [['_route' => 'app_api_persona_removepersona', '_controller' => 'App\\Controller\\Api\\PersonaController::RemovePersona'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        154 => [
            [['_route' => 'app_api_producto_getproducto', '_controller' => 'App\\Controller\\Api\\ProductoController::getProducto'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_api_producto_updateproducto', '_controller' => 'App\\Controller\\Api\\ProductoController::updateProducto'], ['id'], ['POST' => 0], null, false, true, null],
            [['_route' => 'app_api_producto_removeproducto', '_controller' => 'App\\Controller\\Api\\ProductoController::RemoveProducto'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        181 => [
            [['_route' => 'app_api_venta_getventa', '_controller' => 'App\\Controller\\Api\\VentaController::getVenta'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_api_venta_updateventa', '_controller' => 'App\\Controller\\Api\\VentaController::updateVenta'], ['id'], ['POST' => 0], null, false, true, null],
            [['_route' => 'app_api_venta_removeventa', '_controller' => 'App\\Controller\\Api\\VentaController::RemoveVenta'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
