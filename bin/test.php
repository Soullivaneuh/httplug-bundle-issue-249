<?php

declare(strict_types=1);

use Docker\API\Model\ContainerConfig;
use Docker\API\Model\HostConfig;
use Docker\Docker;
use Symfony\Component\Debug\Debug;

set_time_limit(0);

require_once __DIR__.'/../vendor/autoload.php';

Debug::enable();
$kernel = new \App\Kernel('dev', true);
$kernel->boot();

/** @var Docker $docker */
$docker = $kernel->getContainer()->get(Docker::class);
//$docker = new Docker(\Docker\DockerClient::createFromEnv());

$containerManager = $docker->getContainerManager();
$containerCreateResult = $containerManager->create(
    (new ContainerConfig())
        ->setImage('debian')
        ->setVolumes([__DIR__ => (object) []])
        ->setHostConfig(
            (new HostConfig())
                ->setBinds([__DIR__.':'.__DIR__])
        )
        ->setWorkingDir(__DIR__)
        ->setCmd(['ls', '-l'])
);
$containerId = $containerCreateResult->getId();

dump($containerManager->find($containerId));
