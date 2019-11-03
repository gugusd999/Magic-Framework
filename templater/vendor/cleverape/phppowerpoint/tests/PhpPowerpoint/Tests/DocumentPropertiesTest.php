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

namespace PhpOffice\PhpPowerpoint\Tests;

use PhpOffice\PhpPowerpoint\DocumentProperties;

/**
 * Test class for DocumentProperties
 *
 * @coversDefaultClass PhpOffice\PhpPowerpoint\DocumentProperties
 */
class DocumentPropertiesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test get set value
     */
    public function testGetSet()
    {
        $object = new DocumentProperties();
        $properties = array(
            'creator' => '',
            'lastModifiedBy' => '',
            'created' => '',
            'modified' => '',
            'title' => '',
            'description' => '',
            'subject' => '',
            'keywords' => '',
            'category' => '',
            'company' => '',
        );

        foreach ($properties as $key => $val) {
            $get = "get{$key}";
            $set = "set{$key}";
            $object->$set($val);
            $this->assertEquals($val, $object->$get());
        }
    }

    /**
     * Test get set with null value
     */
    public function testGetSetNull()
    {
        $object = new DocumentProperties();
        $properties = array(
            'created' => '',
            'modified' => '',
        );
        $time = time();

        foreach (array_keys($properties) as $key) {
            $get = "get{$key}";
            $set = "set{$key}";
            $object->$set();
            $this->assertEquals($time, $object->$get());
        }
    }
}
