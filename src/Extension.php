<?php

namespace Silverstripe\ToDo;

use SilverStripe\ORM\DataExtension;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TextareaField;

class Extension extends DataExtension
{
    private static $db = array(
        'ToDo' => 'Text'
    );

    function updateCMSFields(FieldList $fields) {
        if (!$fields->hasField('ToDo')) {
            $fields->addFieldToTab('Root', new Tab(_t('SiteTree.TABTODO', 'To-do') . ($this->owner->ToDo ? '**' : ''),
                new LiteralField('ToDoHelp', _t('SiteTree.TODOHELP', '<p>You can use this to keep track of work that needs to be done to the content of your site.  To see all your pages with to do information, open the \'Site Reports\' window on the left and select \'To Do\'</p>')),
                new TextareaField('ToDo', '', 10)
            ));
        }
    }

    function updateFieldLabels(&$labels) {
        $labels['ToDo'] = _t('SiteTree.ToDo', 'Todo Notes');
    }
}
