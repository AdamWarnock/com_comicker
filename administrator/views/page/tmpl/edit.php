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
        
	js('input:hidden.parentchapter').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('parentchapterhidden')){
			js('#jform_parentchapter option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_parentchapter").trigger("liszt:updated");
    });

    Joomla.submitbutton = function(task)
    {
        if (task == 'page.cancel') {
            Joomla.submitform(task, document.getElementById('page-form'));
        }
        else {
            
            if (task != 'page.cancel' && document.formvalidator.isValid(document.id('page-form'))) {
                
                Joomla.submitform(task, document.getElementById('page-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_comicker&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="page-form" class="form-validate">

    <div class="form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_COMICKER_TITLE_PAGE', true)); ?>
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
				<div class="control-label"><?php echo $this->form->getLabel('pagetitle'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('pagetitle'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('pageimage'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('pageimage'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('pagedescription'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('pagedescription'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('pagenotes'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('pagenotes'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('parentchapter'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('parentchapter'); ?></div>
			</div>

			<?php
				foreach((array)$this->item->parentchapter as $value): 
					if(!is_array($value)):
						echo '<input type="hidden" class="parentchapter" name="jform[parentchapterhidden]['.$value.']" value="'.$value.'" />';
					endif;
				endforeach;
			?>			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('pagetranscript'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('pagetranscript'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('pagemouseovertext'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('pagemouseovertext'); ?></div>
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