<?php

declare(strict_types=1);

namespace App\Httplug\ClientFactory;

use Http\HttplugBundle\ClientFactory\ClientFactory;

/**
 * Special factory that call another factory not implementing ClientFactory.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
final class CallableClientFactory implements ClientFactory
{
    /**
     * @var callable
     */
    private $factory;

    /**
     * @param callable $factory
     */
    public function __construct(callable $factory)
    {
        $this->factory = $factory;
    }

    /**
     * {@inheritdoc}
     */
    public function createClient(array $config = [])
    {
        return \call_user_func($this->factory, $config);
    }
}
