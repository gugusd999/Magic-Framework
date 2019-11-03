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

use PhpOffice\PhpPowerpoint\Style\Alignment;

/**
 * Test class for PhpPowerpoint
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\PhpPowerpoint
 */
class AlignmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create new instance
     */
    public function testConstruct()
    {
        $object = new Alignment();
        $this->assertEquals(Alignment::HORIZONTAL_LEFT, $object->getHorizontal());
        $this->assertEquals(Alignment::VERTICAL_BASE, $object->getVertical());
        $this->assertEquals(0, $object->getLevel());
        $this->assertEquals(0, $object->getIndent());
        $this->assertEquals(0, $object->getMarginLeft());
        $this->assertEquals(0, $object->getMarginRight());
    }

    /**
     * Test get/set horizontal
     */
    public function testSetGetHorizontal()
    {
        $object = new Alignment();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setHorizontal(''));
        $this->assertEquals(Alignment::HORIZONTAL_LEFT, $object->getHorizontal());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setHorizontal(Alignment::HORIZONTAL_GENERAL));
        $this->assertEquals(Alignment::HORIZONTAL_GENERAL, $object->getHorizontal());
    }

    /**
     * Test get/set vertical
     */
    public function testSetGetVertical()
    {
        $object = new Alignment();
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setVertical(''));
        $this->assertEquals(Alignment::VERTICAL_BASE, $object->getVertical());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setVertical(Alignment::VERTICAL_AUTO));
        $this->assertEquals(Alignment::VERTICAL_AUTO, $object->getVertical());
    }

    /**
     * Test get/set min level exception
     */
    public function testSetGetLevelExceptionMin()
    {
        $object = new Alignment();
        $this->setExpectedException('\Exception', 'Invalid value: shoul be range 0 - 8.');
        $object->setLevel(-1);
    }

    /**
     * Test get/set max level exception
     */
    public function testSetGetLevelExceptionMax()
    {
        $object = new Alignment();
        $this->setExpectedException('\Exception', 'Invalid value: shoul be range 0 - 8.');
        $object->setLevel(9);
    }

    /**
     * Test get/set level
     */
    public function testSetGetLevel()
    {
        $object = new Alignment();
        $value = rand(1, 8);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setLevel($value));
        $this->assertEquals($value, $object->getLevel());
    }

    /**
     * Test get/set indent
     */
    public function testSetGetIndent()
    {
        $object = new Alignment();
        // != Alignment::HORIZONTAL_GENERAL
        $object->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setIndent($value));
        $this->assertEquals(0, $object->getIndent());
        $value = rand(-100, 0);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setIndent($value));
        $this->assertEquals($value, $object->getIndent());

        $object->setHorizontal(Alignment::HORIZONTAL_GENERAL);
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setIndent($value));
        $this->assertEquals($value, $object->getIndent());
        $value = rand(-100, 0);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setIndent($value));
        $this->assertEquals($value, $object->getIndent());
    }

    /**
     * Test get/set margin left
     */
    public function testSetGetMarginLeft()
    {
        $object = new Alignment();
        // != Alignment::HORIZONTAL_GENERAL
        $object->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setMarginLeft($value));
        $this->assertEquals(0, $object->getMarginLeft());
        $value = rand(-100, 0);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setMarginLeft($value));
        $this->assertEquals($value, $object->getMarginLeft());

        $object->setHorizontal(Alignment::HORIZONTAL_GENERAL);
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setMarginLeft($value));
        $this->assertEquals($value, $object->getMarginLeft());
        $value = rand(-100, 0);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setMarginLeft($value));
        $this->assertEquals($value, $object->getMarginLeft());
    }

    /**
     * Test get/set margin right
     */
    public function testSetGetMarginRight()
    {
        $object = new Alignment();
        // != Alignment::HORIZONTAL_GENERAL
        $object->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setMarginRight($value));
        $this->assertEquals(0, $object->getMarginRight());
        $value = rand(-100, 0);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setMarginRight($value));
        $this->assertEquals($value, $object->getMarginRight());

        $object->setHorizontal(Alignment::HORIZONTAL_GENERAL);
        $value = rand(1, 100);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setMarginRight($value));
        $this->assertEquals($value, $object->getMarginRight());
        $value = rand(-100, 0);
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Alignment', $object->setMarginRight($value));
        $this->assertEquals($value, $object->getMarginRight());
    }

    /**
     * Test get/set hash index
     */
    public function testSetGetHashIndex()
    {
        $value = md5(rand(1, 100));

        $object = new Alignment();
        $object->setHashIndex($value);
        $this->assertEquals($value, $object->getHashIndex());
    }
}
