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

use PhpOffice\PhpPowerpoint\Shape\Table;

/**
 * Test class for Table element
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\Shape\Table
 */
class TableTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $object = new Table();
        $this->assertEmpty($object->getRows());
        $this->assertFalse($object->isResizeProportional());
    }

    public function testRows()
    {
        $object = new Table();

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Table\\Row', $object->createRow());
        $this->assertCount(1, $object->getRows());

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\Shape\\Table\\Row', $object->getRow(0));
        $this->assertNull($object->getRow(1, true));
    }

    /**
     * @expectedException \Exception
     * expectedExceptionMessage Row number out of bounds.
     */
    public function testGetRowException()
    {
        $object = new Table();
        $object->getRow();
    }

    public function testHashCode()
    {
        $object = new Table();
        $this->assertEquals(md5(get_class($object)), $object->getHashCode());

        $row = $object->createRow();
        $this->assertEquals(md5($row->getHashCode().get_class($object)), $object->getHashCode());
    }
}
