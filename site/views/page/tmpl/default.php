<?php
/**
 * @version     0.0.2
 * @package     com_comicker
 * @copyright   Copyright (C) 2015. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Adam Warnock <salsa.the.geek@gmail.com> - http://radboxstudio.com
 */
// no direct access
defined('_JEXEC') or die;


?>
<?php if ($this->item) : ?>

    <div class="item_fields">
        <table class="table">
            <tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_PAGETITLE'); ?></th>
			<td><?php echo $this->item->pagetitle; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_PAGEIMAGE'); ?></th>
			<td><?php echo $this->item->pageimage; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_PAGEDESCRIPTION'); ?></th>
			<td><?php echo $this->item->pagedescription; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_PAGENOTES'); ?></th>
			<td><?php echo $this->item->pagenotes; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_PARENTCHAPTER'); ?></th>
			<td><?php echo $this->item->parentchapter; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_PAGETRANSCRIPT'); ?></th>
			<td><?php echo $this->item->pagetranscript; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_PAGE_PAGEMOUSEOVERTEXT'); ?></th>
			<td><?php echo $this->item->pagemouseovertext; ?></td>
</tr>

        </table>
    </div>
    
    <?php
else:
    echo JText::_('COM_COMICKER_ITEM_NOT_LOADED');
endif;
?>
