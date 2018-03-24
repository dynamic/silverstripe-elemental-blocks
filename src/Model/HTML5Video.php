<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementHTML5Video;
use SilverStripe\Assets\File;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FileHandleField;
use SilverStripe\ORM\DataList;

/**
 * Class Video.
 */
class HTML5Video extends BaseElementObject
{
    /**
     * @var array
     */
    private static $has_one = array(
        'MP4Video' => File::class,
        'OggVideo' => File::class,
        'WebMVideo' => File::class,
    );

    /**
     * @var array
     */
    private static $owns = [
        'MP4Video',
        'OggVideo',
        'WebMVideo',
    ];

    /**
     * @var array
     */
    private static $belongs_many_many = [
        'ElementHTML5Videos' => ElementHTML5Video::class,
    ];

    /**
     * @var string
     */
    private static $singular_name = 'HTML5 Video';

    /**
     * @var string
     */
    private static $plural_name = 'HTML5 Vidoes';

    /**
     * @var string
     */
    private static $table_name = 'HTML5Video';

    /**
     * @return FieldList
     * @throws \Exception
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'ElementHTML5Videos',
        ]);

        $fields->dataFieldByName('Title')->setTitle('Video Title');
        $fields->dataFieldByName('Content')->setTitle('Video Description');

        // mp4 upload
        if (class_exists('ChunkedUploadField')) {
            $mp4 = ChunkedUploadField::create('MP4Video');
        } else {
            $mp4 = Injector::inst()->create(FileHandleField::class, 'MP4Video');
        }
        $mp4
            ->setTitle('MP4 Video')
            ->setFolderName('Uploads/Video/MP4Video')
            ->setAllowedExtensions(['m4v', 'mp4'])
            ->setDescription('Required. Format compatible with most browsers.')
        ;

        // webm upload
        if (class_exists('ChunkedUploadField')) {
            $webm = ChunkedUploadField::create('WebMVideo');
        } else {
            $webm = Injector::inst()->create(FileHandleField::class, 'WebMVideo');
        }
        $webm
            ->setTitle('WebM Video')
            ->setFolderName('Uploads/Video/WebMVideo')
            ->setAllowedExtensions(['webm'])
            ->setDescription('Optional. Format compatible with Chrome.')
        ;
        $webm->getValidator()->setAllowedExtensions(array('webm'));

        // ogg upload
        if (class_exists('ChunkedUploadField')) {
            $ogg = ChunkedUploadField::create('OggVideo');
        } else {
            $ogg = Injector::inst()->create(FileHandleField::class, 'OggVideo');
        }
        $ogg
            ->setTitle('Ogg Video')
            ->setFolderName('Uploads/Video/OggVideo')
            ->setAllowedExtensions(['ogv', 'ogg'])
            ->setDescription('Optional. Format compatible with FireFox.')
        ;

        $fields->addFieldsToTab('Root.Video', array(
            $mp4,
            $webm,
            $ogg,
        ));

        return $fields;
    }

    /**
     * @return DataList|bool
     */
    public function getRelatedVideos()
    {
        if ($this->ElementHTML5Videos() && $this->ElementHTML5Videos()->first()) {
            return $this->ElementHTML5Videos()->first()->Videos()->exclude('ID', $this->ID);
        }

        return false;
    }
}
