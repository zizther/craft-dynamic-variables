<?php
/**
 * Dynamic Variables plugin for Craft CMS 4.x
 *
 * Allows you to parse any text as a Twig template, with access to variables, from globals, entries, etc.
 *
 * @link      https://vimia.co.uk
 * @copyright Copyright (c) 2020 Nathan Reed
 */

namespace zizther\dynamicvariables\twigextensions;

use zizther\dynamicvariables\DynamicVariables;

use Craft;
use craft\helpers\Template;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Nathan Reed
 * @package   DynamicVariables
 * @since     1.0.0
 */
class DynamicVariablesTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'DynamicVariables';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something {{ entry.title }}' | dv(entry) }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('dv', [$this, 'renderStringFunction']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = dv('something {{ entry.title }}', entry) %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('dv', [$this, 'renderStringFunction']),
        ];
    }

    /**
     * Our function called via Twig; it will convert any variables passed in
     * using `view.renderString()`
     *
     * @param string $text
     * @param entry $entry
     *
     * @return string outputs the string with the variables converted.
     */
    public function renderStringFunction($text = null, $entry = null)
    {
        $output = '';

        // Test if anything has been passed in
        if ($text) {
            // Returns a string wrapped in a \Twig\Markup object
            // This helps support fields which contain markup
            $output = Template::raw(Craft::$app->getView()->renderString($text, [
                'entry' => $entry
            ]));
        }

        return $output;
    }
}
