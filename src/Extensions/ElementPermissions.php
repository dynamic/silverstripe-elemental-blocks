<?php

namespace Dynamic\Elements\ORM;

use SilverStripe\ORM\DataExtension;
use SilverStripe\Security\PermissionProvider;

/**
 * Class ElementPermissions.
 */
class ElementPermissions extends DataExtension implements PermissionProvider
{
    /**
     * @return array
     */
    public function providePermissions()
    {
        return [
            'Create_Element' => [
                'name' => _t(
                    'ELEMENT.CREATE_ELEMENT',
                    'Create Elemental Blocks'
                ),
                'category' => _t(
                    'Permissions.PERMISSIONS_ELEMENT_PERMISSION',
                    'Elemental'
                ),
                'help' => _t(
                    'Element.CREATE_PERMISSION_ELEMENT_PERMISSION',
                    'Ability to create new Elemental Blocks.'
                ),
                'sort' => 400,
            ],
            'Edit_Element' => [
                'name' => _t(
                    'ELEMENT.EDIT_ELEMENT',
                    'Edit Elemental Blocks'
                ),
                'category' => _t(
                    'Permissions.PERMISSIONS_ELEMENT_PERMISSION',
                    'Elemental'
                ),
                'help' => _t(
                    'Element.EDIT_PERMISSION_ELEMENT_PERMISSION',
                    'Ability to update Elemental Blocks.'
                ),
                'sort' => 400,
            ],
            'Delete_Element' => [
                'name' => _t(
                    'ELEMENT.PUBLISH_ELEMENT',
                    'Delete Elemental Blocks'
                ),
                'category' => _t(
                    'Permissions.PERMISSIONS_ELEMENT_PERMISSION',
                    'Elemental'
                ),
                'help' => _t(
                    'Element.PUBLISH_PERMISSION_ELEMENT_PERMISSION',
                    'Ability to delete Elemental Blocks.'
                ),
                'sort' => 400,
            ],
            'Publish_Element' => [
                'name' => _t(
                    'ELEMENT.PUBLISH_ELEMENT',
                    'Publish Elemental Blocks'
                ),
                'category' => _t(
                    'Permissions.PERMISSIONS_ELEMENT_PERMISSION',
                    'Elemental'
                ),
                'help' => _t(
                    'Element.PUBLISH_PERMISSION_ELEMENT_PERMISSION',
                    'Ability to publish Elemental Blocks.'
                ),
                'sort' => 400,
            ],
        ];
    }
}
