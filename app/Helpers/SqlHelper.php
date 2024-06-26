<?php

/**
 * @property string order
 * @property int type_order
 */
function build_sql(stdClass $options):string
{   
    $params = '';
    
    if (isset($options->order) && !empty($options->order)) {
        $params .= " ORDER BY " . $options->order . "";
    }

    if (isset($options->type_order) && is_int($options->type_order)) {
        if ($options->type_order == DESC) {
            $params .= " DESC";
        }

        if ($options->type_order == ASC) {
            $params .= " ASC";
        }
    }

    return $params;
}
