<?php

namespace Dynamic\Elements\Tests\TestOnly;

use DNADesign\Elemental\Models\ElementContent;
use Dynamic\Elements\ORM\ElementalPermissions;
use SilverStripe\Dev\TestOnly;
use SilverStripe\ORM\DataObject;

class TestElementContent extends DataObject implements TestOnly
{
    private static $extensions = [
        ElementalPermissions::class,
    ];
}
