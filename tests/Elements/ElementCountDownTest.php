<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementCountDown;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\View\Requirements;

/**
 * Class ElementCountDownTest
 * @package Dynamic\Elements\Tests
 */
class ElementCountDownTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetType()
    {
        $object = Injector::inst()->create(ElementCountDown::class);
        $this->assertEquals($object->getType(), 'Count Down');
    }

    /**
     *
     */
    public function testGetCountDownJS()
    {
        $requirements = Requirements::get_custom_scripts();
        $this->assertArrayNotHasKey('countDownCustom', $requirements);

        /** @var ElementCountDown $object */
        $object = Injector::inst()->create(ElementCountDown::class);
        $object->getCountDownJS();

        $requirements = Requirements::get_custom_scripts();
        $this->assertArrayHasKey('countDownCustom', $requirements);
    }
}
