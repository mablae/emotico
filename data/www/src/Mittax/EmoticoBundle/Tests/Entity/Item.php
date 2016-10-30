<?php
/**
 * Created by PhpStorm.
 * User: pboethig
 * Date: 30.10.16
 * Time: 11:52
 */

namespace Mittax\EmoticoBundle\Tests\Entity;
use Mittax\EmoticoBundle\Entity\Item;
use Mittax\MessageBundle\Entity\Message;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\Tests\Compiler\I;


use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;//Use essential kernel component

class ItemTest extends KernelTestCase
{
    /**
     * @var \Doctrine\Common\Annotations\Reader
     */
    private $reader;

    public $doctrine;

    public $em;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->doctrine = static::$kernel->getContainer()->get('doctrine');

        $this->em = $this->doctrine->getManager();

        $this->reader = new AnnotationReader;

    }

    /**
     * Test the entity
     */
    public function testItem()
    {
        $item = new Item();

        $this->assertInstanceOf(Item::class,$item);

        $item->setId(1);

        $this->assertGreaterThan(0, $item->getId());

        $this->assertEquals(1, $item->getId());

        $dateTimeMock = new \DateTime();

        $item->setCreatedAt(new \DateTime());

        $this->assertEquals($dateTimeMock, $item->getCreatedAt());

        $item->setGroupid(1);

        $this->assertEquals(1, $item->getGroupid());

        $item->setUserid(1);

        $this->assertEquals(1, $item->getUserid());

        $item->setIconpaths('a iconpath array');

        $this->assertEquals('a iconpath array', $item->getIconpaths());
    }

    /**
     * Test if messages are implementing IEntity interface
     */
    public function testInterFaceIsImplemented()
    {
        $reflectionClass = new \ReflectionClass(new Item());

        $hasInterface = $reflectionClass->implementsInterface('Mittax\CoreBundle\Entity\IEntity');

        $this->assertTrue($hasInterface);
    }

    /**
     * Test if there are annotations
     */
    public function testAnnotations()
    {
        $object = new \ReflectionClass(new Item());

        foreach ($object->getProperties() as $property)
        {
            $reflectionProperty = new \ReflectionProperty(get_class(new Item()), $property->getName());

            $propertyAnnotations = $this->reader->getPropertyAnnotations($reflectionProperty);
        }

        $this->assertNotEmpty($propertyAnnotations);
    }
}