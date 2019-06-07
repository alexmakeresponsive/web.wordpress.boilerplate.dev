<?php

namespace Theme\ThemeName;

class Collection
{
    private $data = array();

    public function get_Const($const_name) {
        $l1 = isset( $const_name[0] ) ? $const_name[0] : null;
        $l2 = isset( $const_name[1] ) ? $const_name[1] : null;
        $l3 = isset( $const_name[2] ) ? $const_name[2] : null;
        $l4 = isset( $const_name[3] ) ? $const_name[3] : null;
        $l5 = isset( $const_name[4] ) ? $const_name[4] : null;
        $l6 = isset( $const_name[5] ) ? $const_name[5] : null;

        switch (count($const_name)) {
            case 2:
                return $this->data[$l1][$l2];
            case 3:
                return $this->data[$l1][$l2][$l3];
            case 4:
                return $this->data[$l1][$l2][$l3][$l4];
            case 5:
                return $this->data[$l1][$l2][$l3][$l4][$l5];
            case 6:
                return $this->data[$l1][$l2][$l3][$l4][$l5][$l6];
        }
    }

    function __construct($data_import)
    {
        $this->data = array_merge($this->data, $data_import);
    }

    public function get_Project_collection()
    {
        $data = $this->data;
        return $data['fields']['via_plugins']['plugin_name']['post']['pr'];
    }

    public function get_Options_collection($group)
    {
        $data = $this->data;
        return $data['options'][$group];
    }
}
