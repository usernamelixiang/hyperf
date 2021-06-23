<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'enable' => (bool) env('CONFIG_CENTER_ENABLE', true),
    'driver' => env('CONFIG_CENTER_DRIVER', 'apollo'),
    'use_standalone_process' => (bool) env('CONFIG_CENTER_USE_STANDALONE_PROCESS', true),
    'drivers' => [
        'apollo' => [
            'driver' => Hyperf\ConfigApollo\ApolloDriver::class,
            'server' => 'http://127.0.0.1:9080',
            'appid' => 'test',
            'cluster' => 'default',
            'namespaces' => [
                'application',
            ],
            'interval' => 5,
            'strict_mode' => false,
            'client_ip' => current(swoole_get_local_ip()),
            'pullTimeout' => 10,
            'interval_timeout' => 1,
        ],
        'nacos' => [
            'driver' => '',
        ],
        'aliyun_acm' => [
            'driver' => Hyperf\ConfigAliyunAcm\AliyunAcmDriver::class,
            'interval' => 5,
            'endpoint' => env('ALIYUN_ACM_ENDPOINT', 'acm.aliyun.com'),
            'namespace' => env('ALIYUN_ACM_NAMESPACE', ''),
            'data_id' => env('ALIYUN_ACM_DATA_ID', ''),
            'group' => env('ALIYUN_ACM_GROUP', 'DEFAULT_GROUP'),
            'access_key' => env('ALIYUN_ACM_AK', ''),
            'secret_key' => env('ALIYUN_ACM_SK', ''),
            'ecs_ram_role' => env('ALIYUN_ACM_RAM_ROLE', ''),
        ],
        'etcd' => [
            'driver' => Hyperf\ConfigEtcd\EtcdDriver::class,
            'packer' => Hyperf\Utils\Packer\JsonPacker::class,
            'namespaces' => [
                '/application',
            ],
            'mapping' => [
                // etcd key => config key
                '/application/test' => 'test',
            ],
            'interval' => 5,
        ],
        'zookeeper' => [
            'driver' => '',
        ],
    ],
];