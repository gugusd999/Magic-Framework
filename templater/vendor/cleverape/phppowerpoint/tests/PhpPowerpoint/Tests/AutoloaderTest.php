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
 * @copyright   2010-2014 PHPPowerPoint contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 * @link        https://github.com/PHPOffice/PHPPowerPoint
 */

namespace PhpOffice\PhpPowerpoint\Tests;

use PhpOffice\PhpPowerpoint\Autoloader;

/**
 * Test class for Autoloader
 */
class AutoloaderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Register
     */
    public function testRegister()
    {
        Autoloader::register();
        $this->assertContains(
            array('PhpOffice\\PhpPowerpoint\\Autoloader', 'autoload'),
            spl_autoload_functions()
        );
    }

    /**
     * Autoload
     */
    public function testAutoload()
    {
        $declared = get_declared_classes();
        $declaredCount = count($declared);
        Autoloader::autoload('Foo');
        $this->assertEquals(
            $declaredCount,
            count(get_declared_classes()),
            'PhpOffice\\PhpPowerpoint\\Autoloader::autoload() is trying to load ' .
            'classes outside of the PhpOffice\\PhpPowerpoint namespace'
        );
    }
}
