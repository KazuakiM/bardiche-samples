<?php

/**
 * one time ftp case.
 *
 * $ ftp -A ftp://vagrant:vagrant@192.168.1.1:2224/
 * ftp> put /tmp/fate_testarossa.txt fate_t_harlaown.txt
 * ftp> get fate_t_harlaown.txt /tmp/fate_sama.txt
 */
require __DIR__ . '/../vendor/autoload.php';

use KazuakiM\Bardiche\BardicheException;
use KazuakiM\Bardiche\FileClients;
use KazuakiM\Bardiche\FileClientsType;

try {
    FileClients::one(FileClientsType::BARDICHE_TYPE_FTP(), [
        'negotiation' => true,                             // options default: fallse
        'timeout'     => 90,                               // options default: 90
        'host'        => '192.168.1.1',
        'username'    => 'vagrant',
        'password'    => 'vagrant',
        'file_info'   => [
            [
                'remote_directory_path' => '/',
                'remote_file_name'      => 'ubuntu2.iso',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'ubuntu.iso',
                'ascii'                 => FTP_BINARY,
            ],
            [
                'remote_directory_path' => '/',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_testarossa.txt',
                'ascii'                 => FTP_ASCII,
            ],
            [
                'remote_directory_path' => '/takamachi',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_testarossa.txt',
                'ascii'                 => FTP_ASCII,
            ],
        ],
        'port'     => 2224,                                // options default: 21
        'pasv'     => false,                               // options default: true
        'parallel' => 2,                                   // options default: 0
    ], FileClients::BARDICHE_UPLOAD);

    FileClients::one(FileClientsType::BARDICHE_TYPE_FTP(), [
        'negotiation' => true,                             // options default: fallse
        'timeout'     => 90,                               // options default: 90
        'host'        => '192.168.1.1',
        'username'    => 'vagrant',
        'password'    => 'vagrant',
        'file_info'   => [
            [
                'remote_directory_path' => '/',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'fate_sama.txt',
                'ascii'                 => FTP_ASCII,
            ],
            [
                'remote_directory_path' => '/takamachi',
                'remote_file_name'      => 'fate_t_harlaown.txt',
                'local_directory_path'  => '/tmp',
                'local_file_name'       => 'nanoha.txt',
                'ascii'                 => FTP_ASCII,
            ],
        ],
        'port'     => 2224,                                // options default: 21
        'pasv'     => false,                               // options default: true
        'parallel' => 2,                                   // options default: 0
    ], FileClients::BARDICHE_DOWNLOAD);

} catch (BardicheException $e) {
    var_dump(json_decode($e->getMessage(), true));
}
