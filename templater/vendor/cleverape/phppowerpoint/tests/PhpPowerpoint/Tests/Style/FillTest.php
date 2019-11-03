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
use PhpOffice\PhpPowerpoint\Style\Fill;

/**
 * Test class for PhpPowerpoint
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\PhpPowerpoint
 */
class FillTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create new instance
     */
    public function testConstruct()
    {
        $object = new Fill();
        $this->assertEquals(Fill::FILL_NONE, $object->getFillType());
        $this->assertEquals(0, $object->getRotation());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Color', $object->getStartColor());
        $this->assertEquals(Color::COLOR_WHITE, $object->getStartColor()->getARGB());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Color', $object->getEndColor());
        $this->assertEquals(Color::COLOR_BLACK, $object->getEndColor()->getARGB());
    }

    /**
     * Test get/set end color
     */
    public function testSetGetEndColor()
    {
        $object = new Fill();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->setEndColor());
        $this->assertNull($object->getEndColor());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->setEndColor(new Color(COLOR::COLOR_BLUE)));
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Color', $object->getEndColor());
        $this->assertEquals(COLOR::COLOR_BLUE, $object->getEndColor()->getARGB());
    }

    /**
     * Test get/set fill type
     */
    public function testSetGetFillType()
    {
        $object = new Fill();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->setFillType());
        $this->assertEquals(Fill::FILL_NONE, $object->getFillType());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->setFillType(Fill::FILL_GRADIENT_LINEAR));
        $this->assertEquals(Fill::FILL_GRADIENT_LINEAR, $object->getFillType());
    }

    /**
     * Test get/set rotation
     */
    public function testSetGetRotation()
    {
        $object = new Fill();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->setRotation());
        $this->assertEquals(0, $object->getRotation());
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->setRotation($value));
        $this->assertEquals($value, $object->getRotation());
    }

    /**
     * Test get/set start color
     */
    public function testSetGetStartColor()
    {
        $object = new Fill();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->setStartColor());
        $this->assertNull($object->getStartColor());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->setStartColor(new Color(COLOR::COLOR_BLUE)));
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Color', $object->getStartColor());
        $this->assertEquals(COLOR::COLOR_BLUE, $object->getStartColor()->getARGB());
    }

    /**
     * Test get/set hash index
     */
    public function testSetGetHashIndex()
    {
        $object = new Fill();
        $value = rand(1, 100);
        $object->setHashIndex($value);
        $this->assertEquals($value, $object->getHashIndex());
    }
}
