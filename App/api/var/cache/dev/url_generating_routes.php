<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'app_api_persona_getpersonas' => [[], ['_controller' => 'App\\Controller\\Api\\PersonaController::getPersonas'], [], [['text', '/api/personas']], [], [], []],
    'app_api_persona_getpersona' => [['id'], ['_controller' => 'App\\Controller\\Api\\PersonaController::getPersona'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/persona']], [], [], []],
    'app_api_persona_createpersona' => [[], ['_controller' => 'App\\Controller\\Api\\PersonaController::createPersona'], [], [['text', '/api/persona/']], [], [], []],
    'app_api_persona_updatepersona' => [['id'], ['_controller' => 'App\\Controller\\Api\\PersonaController::updatePersona'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/persona']], [], [], []],
    'app_api_persona_removepersona' => [['id'], ['_controller' => 'App\\Controller\\Api\\PersonaController::RemovePersona'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/persona']], [], [], []],
    'app_cliente' => [[], ['_controller' => 'App\\Controller\\ClienteController::index'], [], [['text', '/api/cliente']], [], [], []],
    'create_persona' => [[], ['_controller' => 'App\\Controller\\PersonaController::createProduct'], [], [['text', '/api/persona/create']], [], [], []],
    'mostrar_personas' => [[], ['_controller' => 'App\\Controller\\PersonaController::findPersonas'], [], [['text', '/api/persona']], [], [], []],
    'mostrar_persona' => [['id'], ['_controller' => 'App\\Controller\\PersonaController::findPersona'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/api/persona']], [], [], []],
];
