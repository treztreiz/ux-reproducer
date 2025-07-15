<?php

namespace App\Factory;

use App\Entity\MyEntity;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<MyEntity>
 */
final class MyEntityFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return MyEntity::class;
    }

    protected function defaults(): array|callable
    {
        return [];
    }
}
