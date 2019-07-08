<?php namespace Premmerce\Filter\Admin\Tabs\Base;

abstract class BaseSettings implements TabInterface
{
    /**
     * @var string
     */
    protected $page;

    /**
     * @var string
     */
    protected $group;

    /**
     * @var string
     */
    protected $optionName;

    /**
     * @var array
     */
    protected $options;

    protected function registerSettings($settings, $page, $optionName)
    {
        $callbacks = array(
            'checkbox' => array($this, 'checkboxCallback'),
            'text'     => array($this, 'inputCallback'),
            'textarea' => array($this, 'textareaCallback'),
            'editor'   => array($this, 'textEditorCallback'),
        );

        foreach ($settings as $sectionId => $section) {
            $callback = isset($section['callback']) ? $section['callback'] : null;
            add_settings_section($sectionId, $section['label'], $callback, $page);

            foreach ($section['fields'] as $fieldId => $field) {
                $title                = isset($field['title']) ? $field['title'] : '';
                $field['label_for']   = $fieldId;
                $field['option_name'] = $optionName;
                $field['placeholder'] = isset($field['placeholder']) ? $field['placeholder'] : '';
                $field['id']          = isset($field['id']) ? $field['id'] : '';
                add_settings_field($fieldId, $title, $callbacks[$field['type']], $page, $sectionId, $field);
            }
        }
    }

    /**
     * @param array $args
     */
    public function checkBoxCallback($args)
    {
        $checkbox = '<label><input type="checkbox" name="%s[%s]" %s id="%s">%s</label>';
        $checked  = $this->getOption($args['label_for']);

        if ($checked == '1') {
            $checked = 'on';
        }

        printf(
            $checkbox,
            $args['option_name'],
            esc_attr($args['label_for']),
            checked('on', $checked, false),
            $args['id'],
            $args['label']
        );

        do_action('premmerce_filter_settings_after_checkbox_callback', $args);
    }

    /**
     * @param array $args
     */
    public function inputCallback($args)
    {
        $checkbox = '<input class="filter-settings-input" type="text" name="%s[%s]" value="%s" placeholder="%s" id="%s">';

        printf(
            $checkbox,
            $this->optionName,
            esc_attr($args['label_for']),
            $this->getOption($args['label_for']),
            $args['placeholder'],
            $args['id']
        );
        do_action('premmerce_filter_settings_after_input_callback', $args);
    }

    /**
     * @param array $args
     */
    public function textareaCallback($args)
    {
        $input = '<textarea class="filter-settings-input" name="%s[%s]" placeholder="%s" cols="30" rows="10" id="%s">%s</textarea>';

        printf(
            $input,
            $this->optionName,
            esc_attr($args['label_for']),
            $args['placeholder'],
            $args['id'],
            $this->getOption($args['label_for'])
        );

        do_action('premmerce_filter_settings_after_textarea_callback', $args);
    }

    public function textEditorCallback($args)
    {
        wp_editor(
            $this->getOption($args['label_for']),
            $args['id'],
            array('textarea_name' => $this->optionName . '[' . esc_attr($args['label_for']) . ']')
        );
        do_action('premmerce_filter_settings_after_text_editor_callback', $args);
    }

    public function render()
    {
        print('<form action="' . admin_url('options.php') . '" method="post">');

        settings_errors();

        settings_fields($this->group);

        do_settings_sections($this->page);

        submit_button();
        print('</form>');
    }

    /**
     * @param string $key
     * @param mixed|null $default
     *
     * @return mixed|null
     */
    public function getOption($key, $default = null)
    {
        if (is_null($this->options)) {
            $this->options = get_option($this->optionName);
        }

        return isset($this->options[$key]) ? $this->options[$key] : $default;
    }
}
