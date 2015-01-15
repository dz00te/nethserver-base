<?php
/* @var $view \Nethgui\Renderer\Xhtml */

echo $view->header('updates_count')->setAttribute('template', $T('Update_header'));

?><table class="SmallTable"><thead>
        <tr style="border-bottom: 1px solid gray"><th><?php echo $T('rpm_name') ?></th>
            <th><?php echo $T('rpm_version')?></th>
            <th><?php echo $T('rpm_release') ?></th>
        </tr></thead><?php

echo $view->objectsCollection('updates')
   ->setAttribute('ifEmpty', function (\Nethgui\Renderer\Xhtml $renderer) {
        return sprintf('<tr><td colspan="3">%s</td></tr>', $renderer->translate('noupdates_message'));
    })
    ->setAttribute('tag', 'tbody')
    ->setAttribute('template', 'NethServer\Template\PackageManager\Packages\Element')
    ->setAttribute('key', 'name');

$view->includeCss("
table.SmallTable {width: auto;  font-size: 12px}
.SmallTable td {padding: 0 1ex 4px 0}
.SmallTable th {text-align: left; padding: 0 1ex 4px 0}
");
?></table><?php

echo $view->buttonList($view::BUTTON_HELP)
    ->insert($view->button('DoUpdate', $view::BUTTON_SUBMIT))
    ->insert($view->button('Back', $view::BUTTON_CANCEL))
;