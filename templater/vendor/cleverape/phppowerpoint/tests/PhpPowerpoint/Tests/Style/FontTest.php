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

namespace PhpOffice\PhpPowerpoint\Tests\Style;

use PhpOffice\PhpPowerpoint\Style\Color;
use PhpOffice\PhpPowerpoint\Style\Font;

/**
 * Test class for PhpPowerpoint
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\PhpPowerpoint
 */
class FontTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create new instance
     */
    public function testConstruct()
    {
        $object = new Font();
        $this->assertEquals('Calibri', $object->getName());
        $this->assertEquals(10, $object->getSize());
        $this->assertFalse($object->isBold());
        $this->assertFalse($object->isItalic());
        $this->assertFalse($object->isSuperScript());
        $this->assertFalse($object->isSubScript());
        $this->assertFalse($object->isStrikethrough());
        $this->assertEquals(Font::UNDERLINE_NONE, $object->getUnderline());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Color', $object->getColor());
        $this->assertEquals(Color::COLOR_BLACK, $object->getColor()->getARGB());
    }

    /**
     * Test get/set color
     */
    public function testSetGetColor()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setColor());
        $this->assertNull($object->getColor());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setColor(new Color(Color::COLOR_BLUE)));
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Color', $object->getColor());
        $this->assertEquals(Color::COLOR_BLUE, $object->getColor()->getARGB());
    }

    /**
     * Test get/set name
     */
    public function testSetGetName()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setName());
        $this->assertEquals('Calibri', $object->getName());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setName(''));
        $this->assertEquals('Calibri', $object->getName());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setName('Arial'));
        $this->assertEquals('Arial', $object->getName());
    }

    /**
     * Test get/set size
     */
    public function testSetGetSize()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSize());
        $this->assertEquals(10, $object->getSize());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSize(''));
        $this->assertEquals(10, $object->getSize());
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSize($value));
        $this->assertEquals($value, $object->getSize());
    }

    /**
     * Test get/set underline
     */
    public function testSetGetUnderline()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setUnderline());
        $this->assertEquals(FONT::UNDERLINE_NONE, $object->getUnderline());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setUnderline(''));
        $this->assertEquals(FONT::UNDERLINE_NONE, $object->getUnderline());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setUnderline(FONT::UNDERLINE_DASH));
        $this->assertEquals(FONT::UNDERLINE_DASH, $object->getUnderline());
    }

    /**
     * Test get/set bold
     */
    public function testSetIsBold()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setBold());
        $this->assertFalse($object->isBold());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setBold(''));
        $this->assertFalse($object->isBold());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setBold(false));
        $this->assertFalse($object->isBold());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setBold(true));
        $this->assertTrue($object->isBold());
    }

    /**
     * Test get/set italic
     */
    public function testSetIsItalic()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setItalic());
        $this->assertFalse($object->isItalic());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setItalic(''));
        $this->assertFalse($object->isItalic());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setItalic(false));
        $this->assertFalse($object->isItalic());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setItalic(true));
        $this->assertTrue($object->isItalic());
    }

    /**
     * Test get/set strikethrough
     */
    public function testSetIsStriketrough()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setStriketrough());
        $this->assertFalse($object->isStrikethrough());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setStriketrough(''));
        $this->assertFalse($object->isStrikethrough());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setStriketrough(false));
        $this->assertFalse($object->isStrikethrough());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setStriketrough(true));
        $this->assertTrue($object->isStrikethrough());
    }

    /**
     * Test get/set subscript
     */
    public function testSetIsSubScript()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSubScript());
        $this->assertFalse($object->isSubScript());
        $this->assertTrue($object->isSuperScript());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSubScript(''));
        $this->assertFalse($object->isSubScript());
        $this->assertTrue($object->isSuperScript());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSubScript(false));
        $this->assertFalse($object->isSubScript());
        $this->assertTrue($object->isSuperScript());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSubScript(true));
        $this->assertTrue($object->isSubScript());
        $this->assertFalse($object->isSuperScript());
    }

    /**
     * Test get/set superscript
     */
    public function testSetIsSuperScript()
    {
        $object = new Font();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSuperScript());
        $this->assertFalse($object->isSuperScript());
        $this->assertTrue($object->isSubScript());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSuperScript(''));
        $this->assertFalse($object->isSuperScript());
        $this->assertTrue($object->isSubScript());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSuperScript(false));
        $this->assertFalse($object->isSuperScript());
        $this->assertTrue($object->isSubScript());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->setSuperScript(true));
        $this->assertTrue($object->isSuperScript());
        $this->assertFalse($object->isSubScript());
    }

    /**
     * Test get/set hash index
     */
    public function testSetGetHashIndex()
    {
        $object = new Font();
        $value = rand(1, 100);
        $object->setHashIndex($value);
        $this->assertEquals($value, $object->getHashIndex());
    }
}
