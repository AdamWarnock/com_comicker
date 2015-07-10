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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_comicker/assets/css/comicker.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function() {
        
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'comic.cancel') {
            Joomla.submitform(task, document.getElementById('comic-form'));
        }
        else {
            
            if (task != 'comic.cancel' && document.formvalidator.isValid(document.id('comic-form'))) {
                
                Joomla.submitform(task, document.getElementById('comic-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_comicker&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="comic-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_COMICKER_TITLE_COMIC', true)); ?>
        <div class="row-fluid">
            <div class="span10 form-horizontal">
                <fieldset class="adminform">

                    				<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php } 
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comictitle'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comictitle'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicdescription'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicdescription'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicimage'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicimage'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comictags'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comictags'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicfirstnormal'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicfirstnormal'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicfirsthover'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicfirsthover'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicfirstactive'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicfirstactive'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comiclastnormal'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comiclastnormal'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comiclasthover'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comiclasthover'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comiclastactive'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comiclastactive'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicpreviousnormal'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicpreviousnormal'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicprevioushover'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicprevioushover'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicpreviousactive'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicpreviousactive'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicnextnormal'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicnextnormal'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicnexthover'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicnexthover'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comicnextactive'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comicnextactive'); ?></div>
			</div>


                </fieldset>
            </div>
        </div>
        <?php echo JHtml::_('bootstrap.endTab'); ?>
        
        

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>

        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>