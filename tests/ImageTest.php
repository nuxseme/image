<?php


namespace image\tests;


use image\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class ImageTest
 * @package image\tests
 */
class ImageTest extends TestCase
{
    /**
     * @return Image
     */
    public function testNewImage()
    {
        $origin = __DIR__.'/../resource/cat.png';
        $image = new Image($origin);
        $this->assertInstanceOf(Image::class ,$image);
        return $image;
    }

    /**
     * @param Image $image
     * @depends testNewImage
     */
    public function testFormatSize(Image $image)
    {
        $this->assertEquals('214.95 KB',$image->formatSize());
    }

    /**
     * @param Image $image
     * @depends testNewImage
     */
    public function testGetLastModifyTime(Image $image)
    {
        $this->assertEquals(filemtime($image->getFile()), $image->getLastModifyTime());
    }
}