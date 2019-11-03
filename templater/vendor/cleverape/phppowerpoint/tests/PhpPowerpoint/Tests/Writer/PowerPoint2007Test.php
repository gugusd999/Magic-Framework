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

namespace PhpOffice\PhpPowerpoint\Tests\Writer;

use PhpOffice\PhpPowerpoint\PhpPowerpoint;
use PhpOffice\PhpPowerpoint\Writer\PowerPoint2007;

/**
 * Test class for PowerPoint2007
 *
 * @coversDefaultClass PowerPoint2007
 */
class PowerPoint2007Test extends \PHPUnit_Framework_TestCase
{
    /**
     * Test create new instance
     */
    public function testConstruct()
    {
        $objectPrefix = 'PhpOffice\\PhpPowerpoint\\Writer\\PowerPoint2007\\';
        $parts = array(
            'contenttypes' => 'ContentTypes',
            'docprops'     => 'DocProps',
            'rels'         => 'Rels',
            'theme'        => 'Theme',
            'presentation' => 'Presentation',
            'slide'        => 'Slide',
            'drawing'      => 'Drawing',
            'chart'        => 'Chart',
        );

        $phpPowerPoint = new PhpPowerpoint();
        $object = new PowerPoint2007($phpPowerPoint);

        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\PhpPowerpoint', $object->getPhpPowerpoint());
        $this->assertEquals('./', $object->getDiskCachingDirectory());
        $this->assertInstanceOf("{$objectPrefix}LayoutPack\\PackDefault", $object->getLayoutPack());
        foreach ($parts as $partName => $objectName) {
            $this->assertInstanceOf($objectPrefix . $objectName, $object->getWriterPart($partName));
        }
        $this->assertInstanceOf('PhpOffice\\PhpPowerpoint\\HashTable', $object->getDrawingHashTable());
    }

    /**
     * Test save
     */
    public function testSave()
    {
        $filename = tempnam(sys_get_temp_dir(), 'PHPPowerPoint');
        $imageFile = PHPPOWERPOINT_TESTS_BASE_DIR . '/resources/images/PHPPowerPointLogo.png';

        $phpPowerPoint = new PhpPowerpoint();
        $slide = $phpPowerPoint->getActiveSlide();
        $slide->createRichTextShape();
        $slide->createLineShape(10, 10, 10, 10);
        $slide->createChartShape()->getPlotArea()->setType(new \PhpOffice\PhpPowerpoint\Shape\Chart\Type\Bar3D());
        $slide->createDrawingShape()->setName('Drawing')->setPath($imageFile);
        $slide->createTableShape()->createRow();

        $object = new PowerPoint2007($phpPowerPoint);
        $object->save($filename);

        $this->assertTrue(file_exists($filename));

        unlink($filename);
    }

    /**
     * Test get writer part null
     */
    public function testGetWriterPartNull()
    {
        $object = new PowerPoint2007(new PhpPowerpoint());

        $this->assertNull($object->getWriterPart('foo'));
    }

    /**
     * Test get PHPPowerPoint exception
     *
     * @expectedException Exception
     * @expectedExceptionMessage No PHPPowerPoint assigned.
     */
    public function testGetPHPPowerPointException()
    {
        $object = new PowerPoint2007();
        $object->getPhpPowerpoint();
    }

    /**
     * Test set/get Office 2003 compatibility
     */
    public function testSetHasOffice2003Compatibility()
    {
        $object = new PowerPoint2007(new PhpPowerpoint());
        $this->assertFalse($object->hasOffice2003Compatibility());

        $object->setOffice2003Compatibility(true);
        $this->assertTrue($object->hasOffice2003Compatibility());
    }

    /**
     * Test set/get disk caching
     */
    public function testSetGetUseDiskCaching()
    {
        $object = new PowerPoint2007(new PhpPowerpoint());
        $this->assertFalse($object->hasDiskCaching());

        $object->setUseDiskCaching(true, sys_get_temp_dir());
        $this->assertTrue($object->hasDiskCaching());
        $this->assertEquals(sys_get_temp_dir(), $object->getDiskCachingDirectory());
    }

    /**
     * Test set/get disk caching exception
     *
     * @expectedException Exception
     */
    public function testSetUseDiskCachingException()
    {
        $object = new PowerPoint2007(new PhpPowerpoint());
        $object->setUseDiskCaching(true, 'foo');
    }
}
