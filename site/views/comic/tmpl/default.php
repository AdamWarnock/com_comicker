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
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICTITLE'); ?></th>
			<td><?php echo $this->item->comictitle; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICDESCRIPTION'); ?></th>
			<td><?php echo $this->item->comicdescription; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICIMAGE'); ?></th>
			<td><?php echo $this->item->comicimage; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICTAGS'); ?></th>
			<td><?php echo $this->item->comictags; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICFIRSTNORMAL'); ?></th>
			<td><?php echo $this->item->comicfirstnormal; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICFIRSTHOVER'); ?></th>
			<td><?php echo $this->item->comicfirsthover; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICFIRSTACTIVE'); ?></th>
			<td><?php echo $this->item->comicfirstactive; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICLASTNORMAL'); ?></th>
			<td><?php echo $this->item->comiclastnormal; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICLASTHOVER'); ?></th>
			<td><?php echo $this->item->comiclasthover; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICLASTACTIVE'); ?></th>
			<td><?php echo $this->item->comiclastactive; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICPREVIOUSNORMAL'); ?></th>
			<td><?php echo $this->item->comicpreviousnormal; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICPREVIOUSHOVER'); ?></th>
			<td><?php echo $this->item->comicprevioushover; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICPREVIOUSACTIVE'); ?></th>
			<td><?php echo $this->item->comicpreviousactive; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICNEXTNORMAL'); ?></th>
			<td><?php echo $this->item->comicnextnormal; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICNEXTHOVER'); ?></th>
			<td><?php echo $this->item->comicnexthover; ?></td>
</tr>
<tr>
			<th><?php echo JText::_('COM_COMICKER_FORM_LBL_COMIC_COMICNEXTACTIVE'); ?></th>
			<td><?php echo $this->item->comicnextactive; ?></td>
</tr>

        </table>
    </div>
    
    <?php
else:
    echo JText::_('COM_COMICKER_ITEM_NOT_LOADED');
endif;
?>
