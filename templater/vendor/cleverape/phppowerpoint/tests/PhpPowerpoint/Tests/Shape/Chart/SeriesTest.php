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

namespace PhpOffice\PhpPowerpoint\Tests\Shape\Chart;

use PhpOffice\PhpPowerpoint\Shape\Chart\Series;
use PhpOffice\PhpPowerpoint\Style\Fill;
use PhpOffice\PhpPowerpoint\Style\Font;

/**
 * Test class for Series element
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\Shape\Chart\Series
 */
class SeriesTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $object = new Series();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->getFill());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->getFont());
        $this->assertEquals('Calibri', $object->getFont()->getName());
        $this->assertEquals(9, $object->getFont()->getSize());
        $this->assertEquals('Series Title', $object->getTitle());
        $this->assertInternalType('array', $object->getValues());
        $this->assertEmpty($object->getValues());
    }

    public function testDataPointFills()
    {
        $object = new Series();

        $this->assertInternalType('array', $object->getDataPointFills());
        $this->assertEmpty($object->getDataPointFills());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Fill', $object->getDataPointFill(0));
    }

    public function testFont()
    {
        $object = new Series();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setFont());
        $this->assertNull($object->getFont());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setFont(new Font()));
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Style\\Font', $object->getFont());
    }

    public function testHashIndex()
    {
        $object = new Series();
        $value = rand(1, 100);

        $this->assertEmpty($object->getHashIndex());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setHashIndex($value));
        $this->assertEquals($value, $object->getHashIndex());
    }

    public function testHashCode()
    {
        $object = new Series();

        $this->assertEquals(md5($object->getFill()->getHashCode().$object->getFont()->getHashCode().var_export($object->getValues(), true) . var_export($object, true).get_class($object)), $object->getHashCode());
    }

    public function testLabelPosition()
    {
        $object = new Series();

        $this->assertEmpty($object->getHashIndex());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setLabelPosition(Series::LABEL_INSIDEBASE));
        $this->assertEquals(Series::LABEL_INSIDEBASE, $object->getLabelPosition());
    }

    public function testShowCategoryName()
    {
        $object = new Series();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowCategoryName(true));
        $this->assertTrue($object->hasShowCategoryName());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowCategoryName(false));
        $this->assertFalse($object->hasShowCategoryName());
    }

    public function testShowLeaderLines()
    {
        $object = new Series();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowLeaderLines(true));
        $this->assertTrue($object->hasShowLeaderLines());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowLeaderLines(false));
        $this->assertFalse($object->hasShowLeaderLines());
    }

    public function testShowPercentage()
    {
        $object = new Series();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowPercentage(true));
        $this->assertTrue($object->hasShowPercentage());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowPercentage(false));
        $this->assertFalse($object->hasShowPercentage());
    }

    public function testShowSeriesName()
    {
        $object = new Series();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowSeriesName(true));
        $this->assertTrue($object->hasShowSeriesName());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowSeriesName(false));
        $this->assertFalse($object->hasShowSeriesName());
    }

    public function testShowValue()
    {
        $object = new Series();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowValue(true));
        $this->assertTrue($object->hasShowValue());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setShowValue(false));
        $this->assertFalse($object->hasShowValue());
    }

    public function testTitle()
    {
        $object = new Series();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setTitle());
        $this->assertEquals('Series Title', $object->getTitle());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setTitle('AAAA'));
        $this->assertEquals('AAAA', $object->getTitle());
    }

    public function testValue()
    {
        $object = new Series();

        $array = array(
            '0' => 'a',
            '1' => 'b',
            '2' => 'c',
            '3' => 'd',
        );

        $this->assertInternalType('array', $object->getValues());
        $this->assertEmpty($object->getValues());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setValues());
        $this->assertEmpty($object->getValues());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->setValues($array));
        $this->assertCount(count($array), $object->getValues());
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Chart\\Series', $object->addValue(4, 'e'));
        $this->assertCount(count($array) + 1, $object->getValues());
    }
}
