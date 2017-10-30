<?php

namespace Dynamic\Elements\Model;

use SilverStripe\Assets\Image;
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
        'PageLink' => 'Link',
        'Content' => 'HTMLText',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => Image::class,
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
     * Adds Publish button
     *
     * @var bool
     */
    private static $versioned_gridfield_extensions = true;

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->removeByName('PageLinkID');
            $link = $fields->fieldByName('Root.Main.PageLink')
                ->setDescription('Optional. Link to a Page')
            ;
            $fields->insertBefore('Content', $link);

            $fields->removeByName(array(
                'ElementFeaturesID',
                'Sort',
            ));

            $fields->dataFieldByName('Name')->setDescription('Required. For internal reference only');

            $fields->dataFieldByName('Title')->setDescription("Optional. Display a Title with this feature.");

            $image = $fields->dataFieldByName('Image')
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

        // Ensure TinyMCE's javascript is loaded before the blocks overrides
        Requirements::javascript(TinyMCEConfig::get('cms')->getScriptURL());
        Requirements::javascript('silverstripe/elemental-blocks:client/dist/js/bundle.js');
        Requirements::css('silverstripe/elemental-blocks:client/dist/styles/bundle.css');

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
