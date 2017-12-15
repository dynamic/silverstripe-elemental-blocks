<?php

namespace Dynamic\Elements\Elements;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextareaField;

/**
 * Class ElementEmailSignup.
 */
class ElementEmailSignup extends ElementEmbeddedCode
{
    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @var string
     */
    private static $singular_name = 'Email Signup Element';

    /**
     * @var string
     */
    private static $plural_name = 'Email Signup Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementEmailSignup';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->replaceField(
            'Code',
            TextareaField::create('Code')
                ->setTitle('Embed Code')
                ->setRightTitle('Embed code for signup form')
        );

        return $fields;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'Email Signup');
    }
}
