<?php

namespace Dynamic\Elements\ORM;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\DataObject;
use SilverStripe\Core\Convert;
use SilverStripe\View\ArrayData;
use SilverStripe\ORM\DataExtension;
use SilverStripe\ElementalBlocks\Form\BlockLinkField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\View\Requirements;


class ElementPageLink extends DataExtension
{

    /**
     * For the frontend, return a parsed set of data for use in templates
     *
     * @return ArrayData|null
     */
    public function CallToActionLink()
    {
        return $this->decodeLinkData($this->owner->getField('PageLink'));
    }

    /**
     * Given a set of JSON data, decode it, attach the relevant Page object and return as ArrayData
     *
     * @param string $linkJson
     * @return ArrayData|null
     */
    protected function decodeLinkData($linkJson)
    {
        if (!$linkJson || $linkJson === 'null') {
            return;
        }

        $data = ArrayData::create(Convert::json2obj($linkJson));

        // Link page, if selected
        if ($data->PageID) {
            $data->setField('Page', DataObject::get_by_id(SiteTree::class, $data->PageID));
        }

        return $data;
    }

}
