<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/20/2018
 * Time: 8:49 PM
 */
class Setting extends ScanBase
{
    public function getPhone()
    {
        return $this->getPostMeta('phone');
    }
    public function getBookingLink()
    {
        return $this->getPostMeta('booking-link');
    }
    public function getQuoteLink()
    {
        return $this->getPostMeta('quote-link');
    }
    public function getAccountLink()
    {
        return $this->getPostMeta('account-link');
    }
    public function getAddress()
    {
        return $this->getPostMeta('address');
    }
}