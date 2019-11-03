<?php
/**
 * This file is part of PHPPowerPoint - A pure PHP library for reading and writing
 * presentations documents.
 *
 * PHPPowerPoint is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPPowerPoint/contributors.
 *
 * @copyright   2009-2014 PHPPowerPoint contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 * @link        https://github.com/PHPOffice/PHPPowerPoint
 */

namespace PhpOffice\PhpPowerpoint\Tests\Shape;

use PhpOffice\PhpPowerpoint\Shape\RichText;
use PhpOffice\PhpPowerpoint\Shape\RichText\TextElement;
use PhpOffice\PhpPowerpoint\Shape\RichText\Paragraph;

/**
 * Test class for RichText element
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\Shape\RichText
 */
class RichTextTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $object = new RichText();
        $this->assertEquals(0, $object->getActiveParagraphIndex());
        $this->assertCount(1, $object->getParagraphs());
    }

    public function testActiveParagraph()
    {
        $object = new RichText();
        $this->assertEquals(0, $object->getActiveParagraphIndex());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\Paragraph', $object->createParagraph());
        $this->assertCount(2, $object->getParagraphs());
        $value = rand(0, 1);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\Paragraph', $object->setActiveParagraph($value));
        $this->assertEquals($value, $object->getActiveParagraphIndex());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\Paragraph', $object->getActiveParagraph());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\Paragraph', $object->getParagraph());
        $value = rand(0, 1);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\Paragraph', $object->getParagraph($value));
    }

    /**
     * @expectedException \Exception
     * expectedExceptionMessage Invalid paragraph count.
     */
    public function testActiveParagraphException()
    {
        $object = new RichText();
        $object->setActiveParagraph(1000);
    }

    /**
     * @expectedException \Exception
     * expectedExceptionMessage Invalid paragraph count.
     */
    public function testGetParagraphException()
    {
        $object = new RichText();
        $object->getParagraph(1000);
    }

    public function testColumns()
    {
        $object = new RichText();

        $value = rand(1, 16);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setColumns($value));
        $this->assertEquals($value, $object->getColumns());
    }

    /**
     * @expectedException \Exception
     * expectedExceptionMessage Number of columns should be 1-16
     */
    public function testColumnsException()
    {
        $object = new RichText();
        $object->setColumns(1000);
    }

    public function testParagraphs()
    {
        $object = new RichText();

        $array = array(
            new Paragraph(),
            new Paragraph(),
            new Paragraph(),
        );

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setParagraphs($array));
        $this->assertCount(3, $object->getParagraphs());
        $this->assertEquals(2, $object->getActiveParagraphIndex());
    }

    /**
     * @expectedException \Exception
     * expectedExceptionMessage Invalid \PhpOffice\PhpPowerpoint\Shape\RichText\Paragraph[] array passed.
     */
    public function testParagraphsException()
    {
        $object = new RichText();
        $object->setParagraphs(1000);
    }

    public function testText()
    {
        $object = new RichText();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->addText());
        $this->assertCount(1, $object->getActiveParagraph()->getRichTextElements());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->addText(new TextElement()));
        $this->assertCount(2, $object->getActiveParagraph()->getRichTextElements());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\TextElement', $object->createText());
        $this->assertCount(3, $object->getActiveParagraph()->getRichTextElements());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\TextElement', $object->createText('ALPHA'));
        $this->assertCount(4, $object->getActiveParagraph()->getRichTextElements());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\BreakElement', $object->createBreak());
        $this->assertCount(5, $object->getActiveParagraph()->getRichTextElements());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\Run', $object->createTextRun());
        $this->assertCount(6, $object->getActiveParagraph()->getRichTextElements());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText\\Run', $object->createTextRun('BETA'));
        $this->assertCount(7, $object->getActiveParagraph()->getRichTextElements());
        $this->assertEquals('ALPHA'."\r\n".'BETA', $object->getPlainText());
        $this->assertEquals('ALPHA'."\r\n".'BETA', (string) $object);
    }

    public function testGetSetAutoFit()
    {
        $object = new RichText();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setAutoFit());
        $this->assertEquals(RichText::AUTOFIT_DEFAULT, $object->getAutoFit());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setAutoFit(RichText::AUTOFIT_NORMAL));
        $this->assertEquals(RichText::AUTOFIT_NORMAL, $object->getAutoFit());
    }

    public function testGetSetHOverflow()
    {
        $object = new RichText();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setHorizontalOverflow());
        $this->assertEquals(RichText::OVERFLOW_OVERFLOW, $object->getHorizontalOverflow());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setHorizontalOverflow(RichText::OVERFLOW_CLIP));
        $this->assertEquals(RichText::OVERFLOW_CLIP, $object->getHorizontalOverflow());
    }

    public function testGetSetInset()
    {
        $object = new RichText();

        // Default
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setInsetBottom());
        $this->assertEquals(4.8, $object->getInsetBottom());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setInsetLeft());
        $this->assertEquals(9.6, $object->getInsetLeft());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setInsetRight());
        $this->assertEquals(9.6, $object->getInsetRight());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setInsetTop());
        $this->assertEquals(4.8, $object->getInsetTop());

        // Value
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setInsetBottom($value));
        $this->assertEquals($value, $object->getInsetBottom());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setInsetLeft($value));
        $this->assertEquals($value, $object->getInsetLeft());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setInsetRight($value));
        $this->assertEquals($value, $object->getInsetRight());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setInsetTop($value));
        $this->assertEquals($value, $object->getInsetTop());
    }

    public function testGetSetUpright()
    {
        $object = new RichText();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setUpright());
        $this->assertFalse($object->isUpright());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setUpright(true));
        $this->assertTrue($object->isUpright());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setUpright(false));
        $this->assertFalse($object->isUpright());
    }

    public function testGetSetVertical()
    {
        $object = new RichText();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setVertical());
        $this->assertFalse($object->isVertical());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setVertical(true));
        $this->assertTrue($object->isVertical());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setVertical(false));
        $this->assertFalse($object->isVertical());
    }

    public function testGetSetVOverflow()
    {
        $object = new RichText();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setVerticalOverflow());
        $this->assertEquals(RichText::OVERFLOW_OVERFLOW, $object->getVerticalOverflow());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setVerticalOverflow(RichText::OVERFLOW_CLIP));
        $this->assertEquals(RichText::OVERFLOW_CLIP, $object->getVerticalOverflow());
    }

    public function testGetSetWrap()
    {
        $object = new RichText();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setWrap());
        $this->assertEquals(RichText::WRAP_SQUARE, $object->getWrap());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\RichText', $object->setWrap(RichText::WRAP_NONE));
        $this->assertEquals(RichText::WRAP_NONE, $object->getWrap());
    }

    public function testHashCode()
    {
        $object = new RichText();

        $hash  = $object->getActiveParagraph()->getHashCode();
        $hash .= RichText::WRAP_SQUARE.RichText::AUTOFIT_DEFAULT.RichText::OVERFLOW_OVERFLOW.RichText::OVERFLOW_OVERFLOW.'0014.89.69.64.8';
        $hash .= md5('00000' . $object->getFill()->getHashCode() . $object->getShadow()->getHashCode() . '' . get_parent_class($object));
        $hash .= get_class($object);
        $this->assertEquals(md5($hash), $object->getHashCode());
    }
}
