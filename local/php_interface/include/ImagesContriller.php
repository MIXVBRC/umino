<?php
namespace Images;

Class ImagesController
{
    private $minImageHeight;
    private $minSize;
    private $maxSize;


    public function __construct($arSizeInfo, $minHeight)
    {

    }

    public function getResize($image)
    {

    }

    public function setMinSize($minImageHeight)
    {
        if (!empty($minImageHeight) && !is_array($minImageHeight))
        {
            $this->minImageHeight = $minImageHeight;
        }
    }
}