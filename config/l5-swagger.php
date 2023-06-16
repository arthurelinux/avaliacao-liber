<?php

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'API Avaliação',
            ],

            'routes' => [
                /*
                 * Rota para acessar a interface de documentação da API
                 */
                'api' => 'api/documentation',
            ],
            'paths' => [
                /*
                 * Edite para incluir o caminho completo na UI para os assets
                 */
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true),

                /*
                 * Nome do arquivo JSON de documentação gerado
                 */
                'docs_json' => 'api-docs.json',

                /*
                 * Nome do arquivo YAML de documentação gerado
                 */
                'docs_yaml' => 'api-docs.yaml',

                /*
                 * Defina como 'json' ou 'yaml' para determinar qual arquivo de documentação usar na UI
                 */
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'),

                /*
                 * Caminho absoluto para os diretórios que contêm as anotações Swagger
                 */
                'annotations' => [
                    base_path('app'),
                ],

            ],
        ],
    ],
    'defaults' => [
        'routes' => [
            /*
             * Rota para acessar as anotações Swagger analisadas
             */
            'docs' => 'docs',

            /*
             * Rota para o retorno de chamada de autenticação do Oauth2
             */
            'oauth2_callback' => 'api/oauth2-callback',

            /*
             * Middlewares que permitem impedir o acesso não autorizado à documentação da API
             */
            'middleware' => [
                'api' => [],
                'asset' => [],
                'docs' => [],
                'oauth2_callback' => [],
            ],

            /*
             * Opções do grupo de rotas
             */
            'group_options' => [],
        ],

        'paths' => [
            /*
             * Caminho absoluto para o local onde as anotações analisadas serão armazenadas
             */
            'docs' => storage_path('api-docs'),

            /*
             * Caminho absoluto para o diretório onde as views serão exportadas
             */
            'views' => base_path('resources/views/vendor/l5-swagger'),

            /*
             * Edite para definir o caminho base da API
             */
            'base' => env('L5_SWAGGER_BASE_PATH', null),

            /*
             * Edite para definir o caminho onde os assets do Swagger UI devem ser armazenados
             */
            'swagger_ui_assets_path' => env('L5_SWAGGER_UI_ASSETS_PATH', 'vendor/swagger-api/swagger-ui/dist/'),

            /*
             * Caminho absoluto para diretórios que devem ser excluídos da análise
             * @deprecated Use `scanOptions.exclude`
             * `scanOptions.exclude` sobrescreve esta opção
             */
            'excludes' => [],
        ],

        'scanOptions' => [
            'analyser' => null,
            'analysis' => null,
            'processors' => [],
            'pattern' => null,
            'exclude' => [],
            'open_api_spec_version' => env('L5_SWAGGER_OPEN_API_SPEC_VERSION', \L5Swagger\Generator::OPEN_API_DEFAULT_SPEC_VERSION),
        ],

        'securityDefinitions' => [
            'securitySchemes' => [],
            'security' => [],
        ],

        /*
         * Se você quiser que os recursos da especificação Oauth2 sejam incluídos automaticamente na documentação
         */
        'auto_detect' => [
            'oauth2' => env('L5_SWAGGER_AUTO_DETECT_OAUTH', false),
        ],

        'constants' => [
            /*
             * Você pode usar esta opção para fornecer um arquivo personalizado que será incluído em todas as views geradas.
             * Por exemplo, você pode usar isto para incluir o Google Analytics global.
             * O arquivo especificado deve ser um arquivo PHP que retorna uma string.
             */
            'view' => null,
        ],

        /*
         * Configurações para autenticação da API
         */
        'auth' => [
            /*
             * Configurações para autenticação do tipo 'bearer'
             */
            'bearer' => [
                /*
                 * Determina se o middleware de autenticação 'api' está ativado
                 */
                'active' => env('L5_SWAGGER_BEARER_AUTH_ACTIVE', false),

                /*
                 * Nome do cabeçalho para autenticação do tipo 'bearer'
                 */
                'header_name' => 'Authorization',

                /*
                 * Esquema de autenticação do tipo 'bearer'
                 */
                'scheme' => 'Bearer',
            ],
        ],
    ],
];
