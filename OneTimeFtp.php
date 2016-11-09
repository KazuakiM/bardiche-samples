<?php

/**
 * one time ftp case.
 *
 * $ ftp -A ftp://vagrant:vagrant@192.168.1.1:2224/
 * ftp> put /tmp/fate_testarossa.txt fate_t_harlaown.txt
 * ftp> get fate_t_harlaown.txt /tmp/fate_sama.txt
 */
require __DIR__ . '/vendor/autoload.php';

use KazuakiM\Bardiche\BardicheException;
use KazuakiM\Bardiche\FileClients;
use KazuakiM\Bardiche\FileClientsType;

try {
    FileClients::one(FileClientsType::BARDICHE_TYPE_FTP(), [
        'negotiation' => false,
        'timeout'     => 90,
        'host'        => '192.168.1.1',
        'username'    => 'vagrant',
        'password'    => 'vagrant',
        'file_info'   => [
            [
                'remote_directory_path' => '/',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_testarossa.txt',
            ],
            [
                'remote_directory_path' => '/takamachi',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_testarossa.txt',
            ],
        ],
        'port'  => 2224,
        'pasv'  => false,
        'ascii' => true,
        'ssl'   => false,
    ], FileClients::BARDICHE_UPLOAD);

    FileClients::one(FileClientsType::BARDICHE_TYPE_FTP(), [
        'negotiation' => false,
        'timeout'     => 90,
        'host'        => '192.168.1.1',
        'username'    => 'vagrant',
        'password'    => 'vagrant',
        'file_info'   => [
            [
                'remote_directory_path' => '/',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_sama.txt',
            ],
            [
                'remote_directory_path' => '/takamachi',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'nanoha.txt',
            ],
        ],
        'port'  => 2224,
        'pasv'  => false,
        'ascii' => true,
        'ssl'   => false,
    ], FileClients::BARDICHE_DOWNLOAD);

} catch (BardicheException $e) {
    var_dump(json_decode($e->getMessage(), true));
}
