<?php

namespace Jetimob\RDStation\Api\CustomFields;

enum CustomFieldPresentationTypeEnum: string
{
    case TextInput = 'TEXT_INPUT';
    case EmailInput = 'EMAIL_INPUT';
    case ComboBox = 'COMBO_BOX';
    case UrlInput = 'URL_INPUT';
    case TextArea = 'TEXT_AREA';
    case RadioButton = 'RADIO_BUTTON';
    case PhoneInput = 'PHONE_INPUT';
    case NumberInput = 'NUMBER_INPUT';
    case Checkbox = 'CHECK_BOX';
    case MultipleChoice = 'MULTIPLE_CHOICE';
}
