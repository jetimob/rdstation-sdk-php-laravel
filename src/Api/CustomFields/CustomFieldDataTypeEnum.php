<?php

namespace Jetimob\RDStation\Api\CustomFields;

enum CustomFieldDataTypeEnum: string
{
    case String = 'STRING';
    case Integer = 'INTEGER';
    case Boolean = 'BOOLEAN';
    case StringArray = 'STRING[]';
}
