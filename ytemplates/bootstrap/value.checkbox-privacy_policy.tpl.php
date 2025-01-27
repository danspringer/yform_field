<?php

/** @var rex_yform_value_checkbox $this */

$notices = [];
if ('' != $this->getElement('notice')) {
    $notices[] = rex_i18n::translate($this->getElement('notice'), false);
}
if (isset($this->params['warning_messages'][$this->getId()]) && !$this->params['hide_field_warning_messages']) {
    $notices[] = '<span class="text-warning">' . rex_i18n::translate($this->params['warning_messages'][$this->getId()], false) . '</span>'; //    var_dump();
}

$notice = '';
if (count($notices) > 0) {
    $notice = '<p class="help-block">' . implode('<br />', $notices) . '</p>';
}

$class_group = trim('checkbox ' . $this->getHTMLClass() . ' ' . $this->getWarningClass());

$attributes = [
    'type' => 'checkbox',
    'id' => $this->getFieldId(),
    'name' => $this->getFieldName(),
    'value' => 1,
];
if (1 == $value) {
    $attributes['checked'] = 'checked';
}

$attributes = $this->getAttributeElements($attributes, ['required', 'disabled', 'autofocus']);

?>
<div class="<?= $class_group ?>" id="<?php echo $this->getHTMLId() ?>">
    <label>
        <input <?= implode(' ', $attributes) ?> />
        <i class="form-helper"></i>
        <?php echo $this->getElement('text') ?> <a target="_blank" href="<?php rex_getUrl($this->getElement('article_id')); ?>"><?php echo $this->getElement('linktext') ?></a>
    </label>
    <?php echo $notice; ?>
</div>
