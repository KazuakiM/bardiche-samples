<?php

/**
 * one time sftp case.
 *
 * $ sftp -P 2222 vagrant@127.0.0.1:/tmp/
 * sftp> put /tmp/fate_testarossa.txt fate_t_harlaown.txt
 * sftp> get fate_t_harlaown.txt /tmp/fate_sama.txt
 */
require __DIR__ . '/vendor/autoload.php';

use KazuakiM\Bardiche\BardicheException;
use KazuakiM\Bardiche\FileClients;
use KazuakiM\Bardiche\FileClientsType;

try {
    FileClients::one(FileClientsType::BARDICHE_TYPE_SFTP(), [
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
        'sftp'        => false,
    ], FileClients::BARDICHE_UPLOAD);

    FileClients::one(FileClientsType::BARDICHE_TYPE_SFTP(), [
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
        'sftp'        => false,
    ], FileClients::BARDICHE_DOWNLOAD);

} catch (BardicheException $e) {
    var_dump(json_decode($e->getMessage(), true));
}
