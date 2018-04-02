<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/20/2018
 * Time: 9:53 PM
 */
class PageSetting extends ScanBase
{
    public function getFooterCTA()
    {
        return $this->getPostMeta('footer-cta');
    }
}