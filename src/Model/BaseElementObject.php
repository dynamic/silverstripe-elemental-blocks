<?php

namespace Dynamic\Elements\Model;

use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ValidationResult;
use SilverStripe\Versioned\Versioned;
use SilverStripe\View\Requirements;

class BaseElementObject extends DataObject
{
    /**
     * @var array
     */
    private static $db = array(
        'Name' => 'Varchar(255)',
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => Image::class,
        'ElementLink' => Link::class,
    );

    /**
     * @var array
     */
    private static $owns = array(
        'Image',
    );

    /**
     * @var string
     */
    private static $default_sort = 'Name ASC';

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Image.CMSThumbnail' => 'Image',
        'Name' => 'Name',
        'Title' => 'Title',
    );

    /**
     * @var array
     */
    private static $searchable_fields = array(
        'Name' => 'Name',
        'Title' => 'Headline',
        'Content' => 'Description',
    );

    /**
     * @var array
     */
    private static $extensions = [
        Versioned::class,
    ];

    /**
     * Adds Publish button.
     *
     * @var bool
     */
    private static $versioned_gridfield_extensions = true;

    /**
     * @var string
     */
    private static $table_name = 'BaseElementObject';

    /**
     * @return FieldList
     *
     * @throws \Exception
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->replaceField(
                'ElementLinkID',
                LinkField::create('ElementLinkID')
                    ->setTitle('Link')
                    ->setDescription('Optional. Add a call to action link.')
            );
            $fields->insertBefore($fields->dataFieldByName('ElementLinkID'), 'Content');

            $fields->removeByName(array(
                'ElementFeaturesID',
                'Sort',
            ));

            $fields->dataFieldByName('Name')->setDescription('Required. For internal reference only');

            $fields->dataFieldByName('Title')->setDescription('Optional. Display a Title with this feature.');

            $image = $fields->dataFieldByName('Image')
                ->setAllowedFileCategories(['image'])
                ->setDescription('Optional. Display an image with this feature.')
                ->setFolderName('Uploads/Elements/Objects')
            ;
            $fields->insertBefore($image, 'Content');

            $fields->dataFieldByName('Content')
                ->setTitle('Description')
                ->setDescription('Optional. Set a description for this feature.')
                ->setRows(8)
            ;
        });

        return parent::getCMSFields();
    }

    /**
     * @return ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Name) {
            $result->addError('Name is required before you can save');
        }

        return $result;
    }
}
