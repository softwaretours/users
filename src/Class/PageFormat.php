<?php
/**
 * Created by PhpStorm.
 * User: petarpfc
 * Date: 11/17/2016
 * Time: 9:17 AM
 */

class PageFormat{
    protected $params;

    /**
     * FormatPage constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }


    /**
     * @return stdClass
     */
    public function makeTitle(){
        $obj = new \stdClass();
        $obj->title = $this->params['title'];
        $obj->h1 = $this->params['h1'];
        return $obj;
    }
}