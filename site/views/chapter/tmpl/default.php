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
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_CHAPTERTITLE'); ?></th>
			<td><?php echo $this->item->chaptertitle; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_CHAPTERDESCRIPTION'); ?></th>
			<td><?php echo $this->item->chapterdescription; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_CHAPTERIMAGE'); ?></th>
			<td><?php echo $this->item->chapterimage; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_CHAPTERTAGS'); ?></th>
			<td><?php echo $this->item->chaptertags; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_PARENTCOMIC'); ?></th>
			<td><?php echo $this->item->parentcomic; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_CHAPTER_PARENTCHAPTER'); ?></th>
			<td><?php echo $this->item->parentchapter; ?></td>
</tr>

        </table>
    </div>
    
    <?php
else:
    echo JText::_('COM_COMICKER_ITEM_NOT_LOADED');
endif;
?>
