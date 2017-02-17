<?php

namespace Silverstripe\ToDo;

use SilverStripe\Reports\Report as Base_Report;

/**
 * @package cms
 * @subpackage content
 */
class Report extends Base_Report
{
    function title() {
        return _t('SideReport.TODO','Pages with To Do items');
    }

    function group() {
        return _t('SideReport.ContentGroupTitle', 'Content reports');
    }

    function sort() {
        return 0;
    }

    function sourceRecords($params = null) {
        return DataObject::get('SiteTree', '"SiteTree"."ToDo" IS NOT NULL AND "SiteTree"."ToDo" <> \'\'', '"SiteTree"."LastEdited" DESC');
    }

    function columns() {
        return array(
            'Title' => array(
                'title' => 'Title', // todo: use NestedTitle(2)
                'link' => true,
            ),
            'ToDo' => array(
                'title' => 'ToDo',
                'newline' => true,
            ),
        );
    }
}
