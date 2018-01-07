<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementPromos;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordViewer;
use SilverStripe\Security\Permission;
use SilverStripe\Security\Security;

/**
 * Class PromoObject.
 */
class PromoObject extends BaseElementObject
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
    private static $belongs_many_many = array(
        'ElementPromos' => ElementPromos::class,
    );

    /**
     * @var string
     */
    private static $table_name = 'PromoObject';

    /**
     * @return FieldList
     *
     * @throws \Exception
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->removeByName('ElementPromos');

            $config = GridFieldConfig_RecordViewer::create();
            $fields->addFieldToTab(
                'Root.Elements',
                GridField::create(
                    'ElementPromos',
                    'Elements',
                    $this->ElementPromos(),
                    $config
                )
            );

            $fields->dataFieldByName('Image')
                ->setFolderName('Uploads/Elements/Promos');
        });

        return parent::getCMSFields();
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
        if (!$member) {
            $member = Security::getCurrentUser();
        }

        return Permission::checkMember($member, 'EDIT_PROMOS_ELEMENT_PERMISSION', 'any');
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
        if (!$member) {
            $member = Security::getCurrentUser();
        }

        return Permission::checkMember($member, 'EDIT_PROMOS_ELEMENT_PERMISSION', 'any');
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canDelete($member = null, $context = [])
    {
        if (!$member) {
            $member = Security::getCurrentUser();
        }

        return Permission::checkMember($member, 'EDIT_PROMOS_ELEMENT_PERMISSION', 'any');
    }
}
