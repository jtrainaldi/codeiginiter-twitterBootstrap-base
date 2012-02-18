<?php

/* 
	TWITTER BOOTSTRAP v2.0 - HELPER
	Author: James Rainaldi
	Created: 2012-02-03
	Version: v1.0
	Contributors: .....

 */


	/*
	FORMS
	Description:
	This helper file assists in creating the twitter bootstrap v2.0 elements (control-groups) in 
	  combination with the codeigniter form helper.
	*/

	/**
	 * Creates a checkbox form input (extended).
	 *
	 *     echo Form::checkbox('remember_me', 1, (bool) $remember);
	 *
	 * @param   string   input name
	 * @param   string   input value
	 * @param   boolean  checked status
	 * @param   array    html attributes
	 * @return  string
	 * @uses    Form::input
	 */
	function checkbox($name, $value = NULL, $checked = FALSE, array $attr = NULL, $label = NULL)
	{
		
		$inline = '';
		$attr['name'] = $name;
		$attr['value'] = (isset($value))?$value:'';
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
		$attr['inline'] = (isset($attr['inline']) and $attr['inline']==TRUE)?TRUE:FALSE;
		if($attr['inline']):
			$inline = 'inline';
		endif;

		if ($checked === TRUE)
		{
			// Make the checkbox active
			$attr['checked'] = TRUE;
		}

		return '<label class="checkbox '.$inline.' " >'.form_checkbox($attr).$label.'</label>';
	}

	/**
	 * Creates a radio form input (extended).
	 *
	 *     echo Form::checkbox('remember_me', 1, (bool) $remember);
	 *
	 * @param   string   input name
	 * @param   string   input value
	 * @param   boolean  checked status
	 * @param   array    html attributes
	 * @return  string
	 * @uses    Form::input
	 */
	function radio($name, $value = NULL, $checked = FALSE, array $attr = NULL, $label = NULL)
	{
		
		$inline = '';
		$attr['name'] = $name;
		$attr['value'] = (isset($value))?$value:'';
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
		$attr['inline'] = (isset($attr['inline']) and $attr['inline']==TRUE)?TRUE:FALSE;
		if($attr['inline']):
			$inline = 'inline';
		endif;

		if ($checked === TRUE)
		{
			// Make the checkbox active
			$attr['checked'] = TRUE;
		}

		return '<label class="radio '.$inline.' " >'.form_radio($attr).$label.'</label>';
	}



	/**
	 * Generates an control-group structure.
	 *
	 * @param   string  label name
	 * @param   array   html elements (use Codginiter Form Helper)
	 * @param	array   twitter bootstrap specific attributes and control-group html attrs validation: error, success, warning
	 * @return  string
	 */
	function control_group($label_name = NULL, $element, $attr = NULL)
	{
		//Declare and Initialize variables
		$cg_str='';
		
		//Basic HTML element attributes
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
				
		//Twitter Bootstrap attributes
		$attr['validation'] = (isset($attr['validation']))?$attr['validation']:NULL;
		$attr['help-inline'] = (isset($attr['help-inline']))?$attr['help-inline']:NULL;
		$attr['help-block'] = (isset($attr['help-block']))?$attr['help-block']:NULL;
		
		//Append/Prepend Elements
		if((isset($attr['prepend']))):
			$attr['prepend'] = $attr['prepend'];
		else :
			$attr['prepend'] = NULL;
		endif;
		if((isset($attr['append']))):
			$attr['append'] = $attr['append'];
		else :
			$attr['append'] = NULL;
		endif;

		//Set the prepend/append checkbox status if it is checked by default		
		$attr['add-on-class'] = ((isset($attr['prepend']) and strpos($attr['prepend'],'checked')!==FALSE) or (isset($tb_attributes['append']) and strpos($tb_attributes['append'],'checked')!==FALSE))
									 ?'active'
									 :'';

		//Assign the label 'for' attribute to the first element's ID value for
		// label click functionality.
		if(isset($element)):
			foreach($element as $e):
				$element_id[] = substr(substr($e,strpos($e,'id=')+4),0,strpos(substr($e,strpos($e,'id=')+4),'"'));
			endforeach;
		endif;		
		
		//Begin generating the control-group structure
		$cg_str .= '<div id="'.$attr['id'].'" class="control-group '.$attr['class'].' '.$attr['validation'].' clearfix" style="'.$attr['style'].'" >';
		  $cg_str .= '<label class="control-label" for="'.$element_id[0].'">'.$label_name.'</label>';
		  $cg_str .= '<div class="controls">';
		    
				//Create prepend/append div
				if(isset($attr['prepend']))
					$cg_str .= '<div class="input-prepend ">';
				else if(isset($attr['append'])):
					$cg_str .= '<div class="input-append ">';
				endif;
				
					//Add prepend element
					if(isset($attr['prepend'])):
						$cg_str .= '<span class="add-on '.$attr['add-on-class'].'">'.$attr['prepend'].'</span>';
					endif;
					
					//Add elements
					foreach($element as $e):
							$cg_str .= $e;
					endforeach;

					//Add append element
					if(isset($attr['append'])):
						$cg_str .= '<span class="add-on '.$attr['add-on-class'].'">'.$attr['append'].'</span>';
					endif;

				
					//Add Help-inline text
					if(isset($attr['help-inline'])): 
						$cg_str .= '<span class="help-inline">'.$attr['help-inline'].'</span>';
					endif;
				
				//Close append/prepend div
				if(isset($attr['prepend']) or isset($attr['append'])):
					$cg_str .= '</div>';
				endif;

				//Add Help-block text
				if(isset($attr['help-block'])): 
					$cg_str .= '<p class="help-block">'.$attr['help-block'].'</p>';
				endif;
				
		  $cg_str .= '</div> <!-- END OF .controls -->';
		$cg_str .= '</div> <!-- END OF .control-group -->';
		
		return $cg_str;
	} //END OF control_group function


	/**
	 * Generates an form-action box.
	 *
	 * @param   string  label name
	 * @param   array   html button/submit elements (use Form Helper)
	 * @param		array   twitter bootstrap specific attributes (error, append, prepend, etc.)
	 * @return  string
	 */
	function form_action($button, $attr = NULL)
	{
			
		//Declare and Initialize variables
		$fa_str='';
		$array_count=0;
		
		//Basic HTML element attributes
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
			
		$fa_str = '<div id="'.$attr['id'].'" class="form-actions '.$attr['class'].' " style="'.$attr['style'].'" >';
		
			if(isset($button)):
				foreach($button as $b):
					$fa_str .= ($array_count>0)?'&nbsp;'.$b:$b;
					$array_count++;
				endforeach;
			else :
				$fa_str .= '&nbsp;';
			endif;
		
		$fa_str .= '</div>';
		
		return $fa_str;
	} //END OF form_action function


	/**
	 * Generates an uneditable input element based on the twitter bootstrap HTML structure.
	 *
	 * @param   string  label name
	 * @param   string  uneditable input text value
	 * @return  string
	 */
	function control_group_view($label_name = NULL, $value = NULL, $attr = NULL )
	{
		$cg_str = '';

		//Basic HTML element attributes
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
		//Twitter Bootstrap attributes
		$attr['validation'] = (isset($attr['validation']))?$attr['validation']:NULL;
		$attr['help-inline'] = (isset($attr['help-inline']))?$attr['help-inline']:NULL;
		$attr['help-block'] = (isset($attr['help-block']))?$attr['help-block']:NULL;


		$cg_str .= '<div id="'.$attr['id'].'" class="control-group view '.$attr['class'].' '.$attr['validation'].' " style="'.$attr['style'].'" >';
		  $cg_str .= '<label class="control-label" for="">'.$label_name.'</label>';
		  $cg_str .= '<div class="controls">';
			
				$cg_str .= '<span class="view-input">'.$value.'</span>';

					$cg_str .= (isset($tb_attributes['help-inline']))?'<span class="help-inline">'.$tb_attributes['help-inline'].'</span>':'';
				$cg_str .= (isset($tb_attributes['help-block']))?'<span class="help-block">'.$tb_attributes['help-block'].'</span>':'';
			$cg_str .= '</div>';
		$cg_str .= '</div>';

		return $cg_str;
	}
	
	/**
	 * Generates an uneditable input element based on the twitter bootstrap HTML structure.
	 *
	 * @param   string  label name
	 * @param   string  uneditable input text value
	 * @return  string
	 */
	function control_group_undeditable($label_name = NULL, $value = NULL, $attr = NULL )
	{
		$cg_str = '';

		//Basic HTML element attributes
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
		//Twitter Bootstrap attributes
		$attr['validation'] = (isset($attr['validation']))?$attr['validation']:NULL;
		$attr['help-inline'] = (isset($attr['help-inline']))?$attr['help-inline']:NULL;
		$attr['help-block'] = (isset($attr['help-block']))?$attr['help-block']:NULL;

		$cg_str .= '<div id="'.$attr['id'].'" class="control-group '.$attr['class'].' '.$attr['validation'].' " style="'.$attr['style'].'" >';
		  $cg_str .= '<label class="control-label" for="">'.$label_name.'</label>';
		  $cg_str .= '<div class="controls">';
			
				$cg_str .= '<span class="uneditable-input">'.$value.'</span>';

					$cg_str .= (isset($tb_attributes['help-inline']))?'<span class="help-inline">'.$tb_attributes['help-inline'].'</span>':'';
				$cg_str .= (isset($tb_attributes['help-block']))?'<span class="help-block">'.$tb_attributes['help-block'].'</span>':'';
			$cg_str .= '</div>';
		$cg_str .= '</div>';

		return $cg_str;
	}
	


	/*
	ALERTS
	Description:
	This helper file assists in creating the twitter bootstrap v2.0 alert elements (alert).
	*/

	function alert($body, $attr=NULL){

		//Declare and Initialize variables
		$alert_str='';
		$array_count=0;
		
		//Basic HTML element attributes
		$attr['id'] = (isset($attr['id']))?$attr['id']:'';
		$attr['class'] = (isset($attr['class']))?$attr['class']:'';
		$attr['style'] = (isset($attr['style']))?$attr['style']:'';
		$attr['dismissal'] = (isset($attr['dismissal']) and $attr['dismissal']===TRUE)?TRUE:FALSE;
		$attr['header'] = (isset($attr['header']))?$attr['header']:NULL;

		$alert_str = '<div id="'.$attr['id'].'" class="alert '.$attr['class'].' fade in " style="'.$attr['style'].'" >';
			
			if($attr['dismissal']):
				$alert_str .= '<a class="close" data-dismiss="alert" href="#">×</a>';
			endif;
			
			//Add header
			if(isset($attr['header'])):
				$alert_str .= '<h4 class="alert-heading">'.$attr['header'].'</h4>';
			endif;
			
			//Add body
			$alert_str .= $body;
			
		
		$alert_str .= '</div>';

		return $alert_str;

	}  //END OF alert function


?>