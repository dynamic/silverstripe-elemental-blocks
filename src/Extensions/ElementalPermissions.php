<?php

namespace Dynamic\Elements\ORM;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Security\Permission;

/**
 * Class ElementalAreaPermissions.
 */
class ElementalPermissions extends DataExtension
{
    /**
     * @param null $member
     * @return bool|int|void
     */
    public function canCreate($member = null)
    {
        return Permission::check('Create_Element', 'any', $member);
    }

    /**
     * @param null $member
     * @return bool|int|void
     */
    public function canEdit($member = null)
    {
        return Permission::check('Edit_Element', 'any', $member);
    }

    /**
     * @param null $member
     * @return bool|int|void
     */
    public function canDelete($member = null)
    {
        return Permission::check('Delete_Element', 'any', $member);
    }

    /**
     * @param null $member
     * @return bool|int
     */
    public function canPublish($member = null)
    {
        return Permission::check('Publish_Element', 'any', $member);
    }
}
