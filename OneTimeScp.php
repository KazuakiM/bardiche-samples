<?php

/**
 * one time scp case.
 *
 * $ scp -P 2222 /tmp/fate_testarossa.txt vagrant@127.0.0.1:/tmp/fate_t_harlaown.txt
 * $ scp -P 2222 vagrant@127.0.0.1:/tmp/fate_t_harlaown.txt /tmp/fate_sama.txt
 */
require __DIR__ . '/vendor/autoload.php';

use KazuakiM\Bardiche\BardicheException;
use KazuakiM\Bardiche\FileClients;
use KazuakiM\Bardiche\FileClientsType;

try {
    FileClients::one(FileClientsType::BARDICHE_TYPE_SCP(), [
        'negotiation' => false,
        'timeout'     => 90,
        'host'        => '127.0.0.1',
        'username'    => 'vagrant',
        'password'    => 'vagrant',
        'file_info'   => [
            [
                'remote_directory_path' => '/tmp',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_testarossa.txt',
            ],
            [
                'remote_directory_path' => '/tmp/takamachi',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_testarossa.txt',
            ],
        ],
        'port'        => 2222,
        'method'      => [],
        'callbacks'   => [],
        'pubkeyfile'  => '',
        'privkeyfile' => '',
        'permission'  => 0644,
        'sftp'        => false,
    ], FileClients::BARDICHE_UPLOAD);

    FileClients::one(FileClientsType::BARDICHE_TYPE_SCP(), [
        'negotiation' => false,
        'timeout'     => 90,
        'host'        => '127.0.0.1',
        'username'    => 'vagrant',
        'password'    => 'vagrant',
        'file_info'   => [
            [
                'remote_directory_path' => '/tmp/',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_sama.txt',
            ],
            [
                'remote_directory_path' => '/tmp/takamachi',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'nanoha.txt',
            ],
        ],
        'port'        => 2222,
        'method'      => [],
        'callbacks'   => [],
        'pubkeyfile'  => '',
        'privkeyfile' => '',
        'permission'  => 0644,
        'sftp'        => false,
    ], FileClients::BARDICHE_DOWNLOAD);

} catch (BardicheException $e) {
    var_dump(json_decode($e->getMessage(), true));
}
