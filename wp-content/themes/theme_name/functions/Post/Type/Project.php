<?php

namespace Theme\ThemeName\Post\Type;

/**
 * Project post type
 */
class Project
{
    private $collection;

    function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function get_index_deposit_value(){
        $collection = $this->collection;

        return $collection[8];
    }
    public function get_index_insurance_value(){
        $collection = $this->collection;

        return $collection[9];
    }
    public function get_index_pay_status_value(){
        $collection = $this->collection;

        return $collection[16];
    }
    public function get_index_percents_value(){
        $collection = $this->collection;

        return $collection[15];
    }
    public function get_index_rcb_value(){
        $collection = $this->collection;

        return $collection[14];
    }
    public function get_index_payment_type_value(){
        $collection = $this->collection;

        return $collection[10];
    }
    public function get_index_payment_systems_value(){
        $collection = $this->collection;

        return $collection[18];
    }
    public function get_index_min_value(){
        $collection = $this->collection;

        return $collection[11];
    }
    public function get_index_max_value(){
        $collection = $this->collection;

        return $collection[12];
    }
    public function get_index_rating_value(){
        $collection = $this->collection;

        return $collection[17];
    }
    public function get_index_days_work_value(){
        $collection = $this->collection;

        return $collection[0];
    }
    public function get_index_days_on_monitoring_value(){
        $collection = $this->collection;

        return $collection[7];
    }
    public function get_index_pay_last_date_value(){
        $collection = $this->collection;

        return $collection[13];
    }
    public function get_index_link_value(){
        $collection = $this->collection;

        return $collection[22];
    }
}
