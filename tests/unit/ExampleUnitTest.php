<?php
/**
 * Dynamic Variables plugin for Craft CMS 3.x
 *
 * Allows you to parse any text as a Twig template, with access to variables, from globals, entries, etc.
 *
 * @link      https://vimia.co.uk
 * @copyright Copyright (c) 2020 Nathan Reed
 */

namespace zizther\dynamicvariablestests\unit;

use Codeception\Test\Unit;
use UnitTester;
use Craft;
use zizther\dynamicvariables\DynamicVariables;

/**
 * ExampleUnitTest
 *
 *
 * @author    Nathan Reed
 * @package   DynamicVariables
 * @since     1.0.0
 */
class ExampleUnitTest extends Unit
{
    // Properties
    // =========================================================================

    /**
     * @var UnitTester
     */
    protected $tester;

    // Public methods
    // =========================================================================

    // Tests
    // =========================================================================

    /**
     *
     */
    public function testPluginInstance()
    {
        $this->assertInstanceOf(
            DynamicVariables::class,
            DynamicVariables::$plugin
        );
    }

    /**
     *
     */
    public function testCraftEdition()
    {
        Craft::$app->setEdition(Craft::Pro);

        $this->assertSame(
            Craft::Pro,
            Craft::$app->getEdition()
        );
    }
}
