<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Blog\Model\Blog;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\NumericField;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBHTMLText;

/**
 * Class RecentBlogPostsBlock
 */
class ElementBlogPosts extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @var string
     */
    private static $singular_name = 'Blog Posts Element';

    /**
     * @var string
     */
    private static $plural_name = 'Blog Posts Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementBlogPosts';

    /**
     * @var array
     */
    private static $db = array(
        'Limit' => 'Int',
        'Content' => 'HTMLText',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Blog' => Blog::class,
    );

    /**
     * @var array
     */
    private static $defaults = array(
        'Limit' => 3,
    );

    /**
     * @return DBHTMLText
     */
    public function ElementSummary()
    {
        return DBField::create_field('HTMLText', $this->Content)->Summary(20);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Blog Posts');
    }

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
            NumericField::create('Limit'),
        ));

        if (class_exists('Blog')) {
            $fields->addFieldToTab(
                'Root.Main',
                DropdownField::create('BlogID', 'Blog', Blog::get()->map())
                    ->setEmptyString('')
            );
        }

        return $fields;
    }
}