<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Form Label Tag
 *
 * @param	string	The text to appear onscreen
 * @param	string	The id the label applies to
 * @param	array	Additional attributes
 * @return	string
 */
function form_label($label_text = '', $id = '', $attributes = array()) {

    $label = '<label';

    if ($id !== '') {
        $label .= ' for="' . $id . '"';
    }

    if (is_array($attributes) && count($attributes) > 0) {
        foreach ($attributes as $key => $val) {
            $label .= ' ' . $key . '="' . $val . '"';
        }
    }

    return $label . '>' . $label_text . '</label>';
}

// ------------------------------------------------------------------------


/**
 * Text Input Field
 *
 * @param	mixed
 * @param	string
 * @param	mixed
 * @return	string
 */
function form_input($label = '',$data = '', $value = '', $extra = '') {
    $defaults = array(
        'type' => 'text',
        'name' => is_array($data) ? '' : $data,
        'value' => $value,
        'class' => "form-control"
    );

    return "<div class='form-group'>".
            form_label($label, (isset($data['id'])?$data['id']:"")).
            '<input ' . _parse_form_attributes($data, $defaults) . _attributes_to_string($extra) . " />"
            . "</div>\n";
}

// ------------------------------------------------------------------------

/**
 * Password Field
 *
 * Identical to the input function but adds the "password" type
 *
 * @param	mixed
 * @param	string
 * @param	mixed
 * @return	string
 */
function form_password($label= '',$data = '', $value = '', $extra = '') {
    is_array($data) OR $data = array('name' => $data);
    $data['type'] = 'password';
    return form_input($label,$data, $value, $extra);
}

// ------------------------------------------------------------------------

/**
 * Upload Field
 *
 * Identical to the input function but adds the "file" type
 *
 * @param	mixed
 * @param	string
 * @param	mixed
 * @return	string
 */
function form_upload($label ='',$data = '', $value = '', $extra = '') {
    $defaults = array(
        'type' => 'file', 
        'name' => '',
        'class' => 'form-control'
    );
    is_array($data) OR $data = array('name' => $data);
    $data['type'] = 'file';

    return "<div class='form-group'>".
            form_label($label, (isset($data['id'])?$data['id']:"")).
            '<input ' . _parse_form_attributes($data, $defaults) . _attributes_to_string($extra) . " />"
            . "</div>\n";
}

// ------------------------------------------------------------------------

/**
 * Textarea field
 *
 * @param	mixed	$data
 * @param	string	$value
 * @param	mixed	$extra
 * @return	string
 */
function form_textarea($label = '',$data = '', $value = '', $extra = '') {
    $defaults = array(
        'name' => is_array($data) ? '' : $data,
        'cols' => '40',
        'rows' => '10',
        'class' => 'form-control'
    );

    if (!is_array($data) OR ! isset($data['value'])) {
        $val = $value;
    } else {
        $val = $data['value'];
        unset($data['value']); // textareas don't use the value attribute
    }

    return "<div class='form-group'>".
            form_label($label, (isset($data['id'])?$data['id']:"")).
            '<textarea ' . _parse_form_attributes($data, $defaults) . _attributes_to_string($extra) . '>'
            . html_escape($val)
            . "</textarea>"
            . "</div>\n";
}

// ------------------------------------------------------------------------

/**
 * Multi-select menu
 *
 * @param	string
 * @param	array
 * @param	mixed
 * @param	mixed
 * @return	string
 */
function form_multiselect($label ='',$name = '', $options = array(), $selected = array(), $extra = '') {
    $extra = _attributes_to_string($extra);
    if (stripos($extra, 'multiple') === FALSE) {
        $extra .= ' multiple="multiple"';
    }

    return form_dropdown($label,$name, $options, $selected, $extra);
}

// --------------------------------------------------------------------

/**
 * Drop-down Menu
 *
 * @param	mixed	$data
 * @param	mixed	$options
 * @param	mixed	$selected
 * @param	mixed	$extra
 * @return	string
 */
function form_dropdown($label ='',$data = '', $options = array(), $selected = array(), $extra = '') {
    $defaults = array();

    if (is_array($data)) {
        if (isset($data['selected'])) {
            $selected = $data['selected'];
            unset($data['selected']); // select tags don't have a selected attribute
        }

        if (isset($data['options'])) {
            $options = $data['options'];
            unset($data['options']); // select tags don't use an options attribute
        }
    } else {
        $defaults = array('name' => $data);
    }

    is_array($selected) OR $selected = array($selected);
    is_array($options) OR $options = array($options);

    // If no selected state was submitted we will attempt to set it automatically
    if (empty($selected)) {
        if (is_array($data)) {
            if (isset($data['name'], $_POST[$data['name']])) {
                $selected = array($_POST[$data['name']]);
            }
        } elseif (isset($_POST[$data])) {
            $selected = array($_POST[$data]);
        }
    }

    $extra = _attributes_to_string($extra);

    $multiple = (count($selected) > 1 && stripos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

    $form = "<div class='form-group'>".
            form_label($label, (isset($data['id'])?$data['id']:"")).
            "<select class='form-control' " . rtrim(_parse_form_attributes($data, $defaults)) . $extra . $multiple . ">\n";

    foreach ($options as $key => $val) {
        $key = (string) $key;

        if (is_array($val)) {
            if (empty($val)) {
                continue;
            }

            $form .= '<optgroup label="' . $key . "\">\n";

            foreach ($val as $optgroup_key => $optgroup_val) {
                $sel = in_array($optgroup_key, $selected) ? ' selected="selected"' : '';
                $form .= '<option value="' . html_escape($optgroup_key) . '"' . $sel . '>'
                        . (string) $optgroup_val . "</option>\n";
            }

            $form .= "</optgroup>\n";
        } else {
            $form .= '<option value="' . html_escape($key) . '"'
                    . (in_array($key, $selected) ? ' selected="selected"' : '') . '>'
                    . (string) $val . "</option>\n";
        }
    }

    return $form . "</select>"
            . "</div>\n";
}

// ------------------------------------------------------------------------

/**
 * Checkbox Field
 *
 * @param	mixed
 * @param	string
 * @param	bool
 * @param	mixed
 * @return	string
 */
function form_checkbox($label='',$data = '', $value = '', $checked = FALSE, $extra = '') {
    $defaults = array(
        'type' => 'checkbox', 
        'name' => (!is_array($data) ? $data : ''), 
        'value' => $value,
        'class' => 'form-control');

    if (is_array($data) && array_key_exists('checked', $data)) {
        $checked = $data['checked'];

        if ($checked == FALSE) {
            unset($data['checked']);
        } else {
            $data['checked'] = 'checked';
        }
    }

    if ($checked == TRUE) {
        $defaults['checked'] = 'checked';
    } else {
        unset($defaults['checked']);
    }
    
    return "<div class='form-group'>".
            form_label($label, (isset($data['id'])?$data['id']:"")).
            '<input ' . _parse_form_attributes($data, $defaults) . _attributes_to_string($extra) . " />"
            . "</div>\n";
}

// ------------------------------------------------------------------------

/**
 * Radio Button
 *
 * @param	mixed
 * @param	string
 * @param	bool
 * @param	mixed
 * @return	string
 */
function form_radio($label='',$data = '', $value = '', $checked = FALSE, $extra = '') {
    is_array($data) OR $data = array('name' => $data);
    $data['type'] = 'radio';

    return form_checkbox($label,$data, $value, $checked, $extra);
}

// ------------------------------------------------------------------------

/**
 * Submit Button
 *
 * @param	mixed
 * @param	string
 * @param	mixed
 * @return	string
 */
function form_submit($data = '', $value = '', $extra = '') {
    $defaults = array(
        'type' => 'submit',
        'name' => is_array($data) ? '' : $data,
        'value' => $value,
        'class' => 'btn'
    );

    return "<input " . _parse_form_attributes($data, $defaults) . _attributes_to_string($extra) . " />\n";
}

// ------------------------------------------------------------------------

/**
 * Form Button
 *
 * @param	mixed
 * @param	string
 * @param	mixed
 * @return	string
 */
function form_button($data = '', $content = '', $extra = '') {
    $defaults = array(
        'name' => is_array($data) ? '' : $data,
        'type' => 'button'
    );

    if (is_array($data) && isset($data['content'])) {
        $content = $data['content'];
        unset($data['content']); // content is not an attribute
    }

    return "<button class='btn'" . _parse_form_attributes($data, $defaults) . _attributes_to_string($extra) . '>'
            . $content
            . "</button>\n";
}

// ------------------------------------------------------------------------

/**
 * Fieldset Tag
 *
 * Used to produce <fieldset><legend>text</legend>.  To close fieldset
 * use form_fieldset_close()
 *
 * @param	string	The legend text
 * @param	array	Additional attributes
 * @return	string
 */
function form_fieldset($legend_text = '', $attributes = array()) {
    $fieldset = '<fieldset' . _attributes_to_string($attributes) . ">\n";
    if ($legend_text !== '') {
        return $fieldset . '<legend>' . $legend_text . "</legend>\n";
    }

    return $fieldset;
}

// ------------------------------------------------------------------------
