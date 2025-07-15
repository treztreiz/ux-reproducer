<?php

namespace App\Tests;

use App\Entity\MyEntity;
use App\Factory\MyEntityFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Clock\Test\ClockSensitiveTrait;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class MyEntityTest extends KernelTestCase
{
    use ResetDatabase;
    use Factories;
    use ClockSensitiveTrait;

    public function testMockClockIsUsedAsClockInterfaceWithEntityManager(): void
    {
        $clock = static::mockTime();

        $entity = new MyEntity();

        $em = static::getContainer()->get(EntityManagerInterface::class);
        assert($em instanceof EntityManagerInterface);

        $em->persist($entity);
        $em->flush();

        self::assertEquals($clock->now(), $entity->getCreatedAt());
    }

    public function testMockClockIsUsedAsClockInterfaceWithFoundry(): void
    {
        $clock = static::mockTime();

        $entity = MyEntityFactory::createOne();

        self::assertEquals($clock->now(), $entity->getCreatedAt());
    }
}
