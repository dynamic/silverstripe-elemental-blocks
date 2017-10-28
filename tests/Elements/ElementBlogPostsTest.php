<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementBlogPosts;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class ElementBlogPostsTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetElementSummary()
    {
        $object = $this->objFromFixture(ElementBlogPosts::class, 'one');
        $this->assertEquals($object->ElementSummary(), $object->dbObject("Content")->Summary(20));
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = $this->objFromFixture(ElementBlogPosts::class, 'one');
        $this->assertEquals($object->getType(), 'Blog Posts');
    }

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(ElementBlogPosts::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('BlogID'));
    }
}
