<?php
class V0_Stat_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($object = NULL)
    {
        return "[" . json_encode(Stats::get($object)) . "]";
    }
}
