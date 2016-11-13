<?php

/**
 * one time ftps case.
 *
 * $ curl --ftp-ssl -u vagrant:vagrant -T /tmp/fate_testarossa.txt ftp://192.168.1.1:2224/
 */
require __DIR__ . '/../vendor/autoload.php';

use KazuakiM\Bardiche\BardicheException;
use KazuakiM\Bardiche\FileClients;
use KazuakiM\Bardiche\FileClientsType;

try {
    FileClients::one(FileClientsType::BARDICHE_TYPE_FTPS(), [
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
                'local_file_name'       => 'fate_testarossa.txt',
            ],
            //[
            //    'remote_directory_path' => '/takamachi',
            //    'remote_file_name'      => 'fate_t_harlaown.txt',
            //    'local_directory_path'  => '/tmp',
            //    'local_file_name'       => 'fate_testarossa.txt',
            //],
        ],
        'port'  => 2224,                                   // options default: 21
        'pasv'  => false,                                  // options default: true
        'ascii' => true,                                   // options default: true
    ], FileClients::BARDICHE_UPLOAD);

    FileClients::one(FileClientsType::BARDICHE_TYPE_FTPS(), [
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
            ],
            //[
            //    'remote_directory_path' => '/takamachi',
            //    'remote_file_name'      => 'fate_t_harlaown.txt',
            //    'local_directory_path'  => '/tmp',
            //    'local_file_name'       => 'nanoha.txt',
            //],
        ],
        'port'  => 2224,                                   // options default: 21
        'pasv'  => false,                                  // options default: true
        'ascii' => true,                                   // options default: true
    ], FileClients::BARDICHE_DOWNLOAD);

} catch (BardicheException $e) {
    var_dump(json_decode($e->getMessage(), true));
}
