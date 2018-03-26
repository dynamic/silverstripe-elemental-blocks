<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementFeatures;
use SilverStripe\Forms\FieldList;

/**
 * Class PageSectionObject.
 *
 * @property int $Sort
 * @property int $ElementFeaturesID
 */
class FeatureObject extends BaseElementObject
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
        'Sort' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'ElementFeatures' => ElementFeatures::class,
    );

    /**
     * @var string
     */
    private static $table_name = 'FeatureObject';

    /**
     * @var string
     */
    private static $default_sort = 'Sort';

    /**
     * @return FieldList
     *
     * @throws \Exception
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->removeByName(array(
                'ElementFeaturesID',
                'Sort',
            ));

            $fields->dataFieldByName('Image')
                ->setFolderName('Uploads/Elements/Features');
        });

        return parent::getCMSFields();
    }

    /**
     * @return null
     */
    public function getPage()
    {
        $page = null;

        if ($this->ElementFeatures()) {
            if ($this->ElementFeatures()->hasMethod('getPage')) {
                $page = $this->ElementFeatures()->getPage();
            }
        }

        return $page;
    }
}
