<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementPhotoGallery;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;

/**
 * Class GalleryImage
 * @package Dynamic\Elements\Model
 */
class GalleryImage extends BaseElementObject
{

    /**
     * @var string
     */
    private static $singular_name = 'Gallery Image';

    /**
     * @var string
     */
    private static $plural_name = 'Gallery Images';

    /**
     * @var array
     */
    private static $db = array(
        'SortOrder' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_one = array(
        'PhotoGallery' => ElementPhotoGallery::class,
        'Image' => Image::class,
    );

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Image.CMSThumbnail' => 'Image',
        'Title' => 'Title',
    );

    /**
     * @var array
     */
    private static $searchable_fields = array(
        'Title',
        'Content',
    );

    /**
     * @var string
     */
    private static $table_name = 'GalleryImage';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName(array(
            'SortOrder',
            'PhotoGalleryID',
        ));
        $image = $fields->dataFieldByName('Image')->setFolderName('Uploads/Blocks/PhotoGallery/');
        $fields->insertBefore($image, 'Content');

        return $fields;
    }

    /**
     * @param null $member
     * @param array $context
     *
     * @return bool
     */
    public function canCreate($member = null, $context = array())
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canView($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canEdit($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canDelete($member = null)
    {
        return true;
    }
}
