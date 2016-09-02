<?php

class DynamicBaseElement extends BaseElement
{
    private static $db = array(
        'Headline' => 'Varchar(255)',
        'Content' => 'HTMLText',
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Headline'),
            HtmlEditorField::create('Content')
        ));

        return $fields;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        if ($title = $this->getField('Title')) {
            return $title;
        }
        return $this->config()->title;
    }

    /**
     * @return string
     */
    public function getCMSTitle()
    {
        if ($title = $this->getField('Title')) {
            return $this->config()->title . ': ' . $title;
        }
        return $this->config()->title;
    }

    // Set permissions, allow all users to access in ModelAdmin

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canCreate($member = null)
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