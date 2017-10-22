<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementPromos;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordViewer;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\ValidationResult;
use SilverStripe\Security\Permission;
use SilverStripe\Security\Security;

/**
 * Class PromoObject
 * @package Dynamic\PageBuildr\ORM
 */
class PromoObject extends DataObject
{
    /**
     * @return string
     */
    private static $singular_name = 'Promo';

    /**
     * @return string
     */
    private static $plural_name = 'Promos';

    /**
     * @var array
     */
    private static $db = array(
        'Title' => 'Varchar(255)',
        'Headline' => 'Varchar(255)',
        'Content' => 'HTMLText',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => Image::class,
    );

    /**
     * @var array
     */
    private static $belongs_many_many = array(
        'ElementPromos' => ElementPromos::class
    );

    /**
     * @var string
     */
    private static $default_sort = 'Title ASC';

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Image.CMSThumbnail' => 'Image',
        'Title' => 'Title',
        'Headline' => 'Headline',
    );

    /**
     * @var array
     */
    private static $searchable_fields = array(
        'Title' => 'Title',
        'Headline' => 'Headline',
        'Content' => 'Description',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('ElementPromos');

        $fields->dataFieldByName('Title')->setDescription('Required. For internal reference only');

        $fields->dataFieldByName('Headline')->setDescription("Optional. Display a headline with this promo.");

        $fields->dataFieldByName('Content')
            ->setTitle('Description')
            ->setDescription('Optional. Set a description for this promo.')
        ;

        $image = $fields->dataFieldByName('Image');
        $image
            ->setFolderName('Uploads/Promos')
            ->setDescription('Optional. Display an image with this promo.')
        ;
        $fields->insertBefore($image, 'Content');

        $config = GridFieldConfig_RecordViewer::create();
        $fields->addFieldToTab('Root.Elements', GridField::create('ElementPromos', 'Elements', $this->ElementPromos(), $config));


        return $fields;
    }

    /**
     * @return ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Title) {
            $result->addError('Title is requied before you can save');
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
        if ( ! $member) {
            $member = Security::getCurrentUser();
        }

        return Permission::checkMember($member, "EDIT_PROMOS_ELEMENT_PERMISSION", 'any');
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
        if ( ! $member) {
            $member = Security::getCurrentUser();
        }

        return Permission::checkMember($member, "EDIT_PROMOS_ELEMENT_PERMISSION", 'any');
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canDelete($member = null, $context = [])
    {
        if ( ! $member) {
            $member = Security::getCurrentUser();
        }

        return Permission::checkMember($member, "EDIT_PROMOS_ELEMENT_PERMISSION", 'any');
    }
}