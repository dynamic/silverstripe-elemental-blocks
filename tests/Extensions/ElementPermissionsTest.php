<?php

namespace Dynamic\Elements\Tests;

use DNADesign\Elemental\Models\ElementContent;
use Dynamic\Elements\ORM\ElementPermissions;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;

class ElementPermissionsTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * @var array
     */
    protected static $required_extensions = [
        ElementContent::class => [
            ElementPermissions::class,
        ],
    ];

    /**
     *
     */
    public function testProvidePermissions()
    {
        $object = ElementContent::create();
        $this->assertTrue(is_array($object->providePermissions()));
    }
}
