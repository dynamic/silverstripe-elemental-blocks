<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Core\Manifest\ModuleResourceLoader;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\FieldType\DBDatetime;
use SilverStripe\View\Requirements;

/**
 * Class ElementCountDown
 * @package Dynamic\Elements\Elements
 */
class ElementCountDown extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'sectionnav-icon';

    /**
     * @var string
     */
    private static $singular_name = 'Count Down Element';

    /**
     * @var string
     */
    private static $plural_name = 'Count Down Elements';

    /**
     * @var array
     */
    private static $db = [
        'End' => 'DBDatetime',
        'ShowMonths' => 'Boolean',
        'ShowSeconds' => 'Boolean',
        'Elapse' => 'Boolean',
    ];

    /**
     * @var string
     */
    private static $table_name = 'ElementCountDown';

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'Count Down');
    }

    /**
     * Adds a custom requirement.
     */
    public function getCountDownJS() {
        // switches out which day count to get off the event
        $dayVar = 'totalDays';
        if ($this->ShowMonths && $this->ShowDays) {
            $dayVar = 'daysToMonth';
        }

        Requirements::customScript(
<<<JS
    jQuery('#countdown-$this->ID').countdown('$this->End', {
        elapse: $this->Elapse
    }).on('update.countdown', function(event) {
        $(this).find('.months').html(event.offset.months);
        $(this).find('.days').html(event.offset.$dayVar);
        $(this).find('.hours').html(event.offset.hours);
        $(this).find('.minutes').html(event.offset.minutes);
        $(this).find('.seconds').html(event.offset.seconds);
    });
JS
, 'countDownCustom');
    }
}
