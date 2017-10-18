<?php

namespace Dynamic\Elements\Elements;

class SectionElement extends DynamicBaseElement
{
    /**
     * @var string
     */
    private static $title = "Page Section";

    /**
     * @var string
     */
    private static $cmsTitle = 'Page Section';

    /**
     * @var string
     */
    private static $description = "Headline, HTML Content, optional Image";

    /**
     * @var array
     */
    private static $has_one = array(
        'Image' => 'Image',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $ImageField = ImageUploadField::create('Image', 'Image')
            ->setFolderName('Uploads/Elements/Sections');

        $fields->insertBefore($ImageField, 'Content');

        return $fields;
    }
}
