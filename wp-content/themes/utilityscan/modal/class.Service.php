<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/21/2018
 * Time: 10:59 AM
 */
class Service extends ScanBase
{
    public function getBanner()
    {
        return $this->getPostMeta('banner');
    }
    public function getIcon()
    {
        return $this->getPostMeta('icon');
    }
    public function getSnippet()
    {
        $snippet = wpautop($this->getPostMeta('snippet'));
        return $snippet;
    }
}