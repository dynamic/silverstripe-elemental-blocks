<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementFeatures;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\ORM\ValidationResult;

/**
 * Class PageSectionObject
 *
 * @property string $Name
 * @property string $Title
 * @property DBHTMLText $Content
 * @property int $SortOrder
 * @property int $ImageID
 * @property int $ElementFeaturesID
 */
class FeatureObject extends DataObject
{
    /**
     * @return string
     */
    private static $singular_name = 'Feature';

    /**
     * @return string
     */
    private static $plural_name = 'Features';

    /**
     * @var array
     */
    private static $db = array(
        'Name' => 'Varchar(255)',
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'SortOrder' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => Image::class,
        'ElementFeatures' => ElementFeatures::class,
        //'BlockLink' => 'Link', // todo readd once Linkable is SS4 compatable
    );

    /**
     * @var string
     */
    private static $table_name = 'FeatureObject';

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
        'Title' => 'Title',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {

            /* // todo readd once Linkable is SS4 compatable
            $fields->addFieldToTab(
                'Root.Main',
                LinkField::create('BlockLinkID', 'Link'),
                'Content'
            );
            */
        });

        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'ElementFeaturesID',
            'SortOrder',
        ));

        $fields->dataFieldByName('Name')->setDescription('For internal reference only');

        $image = $fields->dataFieldByName('Image');
        $image->setFolderName('Uploads/PageSections');
        $fields->insertBefore($image, 'Content');

        return $fields;
    }

    /**
     * @return ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Name) {
            $result->addError('Name is requied before you can save');
        }

        return $result;
    }

    /**
     * Set permissions, allow all users to access by default.
     * Override in descendant classes, or use PermissionProvider.
     */

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canCreate($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canView($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canEdit($member = null, $context = [])
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canDelete($member = null, $context = [])
    {
        return true;
    }
}