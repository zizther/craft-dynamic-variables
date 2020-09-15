# Craft Dynamic Variables plugin for Craft CMS 3.x

Allows you to parse any text as a Twig template, with access to variables, from globals, entries, etc.

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require zizther/craft-dynamic-variables

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Dynamic Variables.

## Dynamic Variables Overview

The filter and function allows you to output variables from Craft, globals, plugins and your configs.
You would reference the field as you would in a template with `{{ }}`.

This plugin is limited to outputting text based fields, by default, however if you would like to reference the entry itself you can do this passing in the entry within the filter or function, You will be able to reference any field within the entry you pass in.

```
{% set entry = craft.entries({ id: 1 }).one() %}
{{ '{{ entry.title }}' | dv(entry) }}
{{ dv('{{ entry.title }}', entry) }}
```

## Using Dynamic Variables
Here are some example for using the filter and function.

### Craft
Want to output the site name or site URL.

#### Filter
`{{ '{{ siteName }} {{ siteUrl }}' | dv }}`

#### Function
`{{ dv('{{ siteName }} {{ siteUrl }}') }}`

### Globals
If you want to output a global field, such as a telephone number.

#### Filter
`{{ '{{ globalHandle.fieldHandle }}' | dv }}`

#### Function
`{{ dv('{{ globalHandle.fieldHandle }}') }}`

### Plugin example
If you want to output field data from a plugin such as SEOmatic.

#### Filter
`{{ '{{ seomatic.site.sameAsLinks["instagram"]["url"] }}' | dv }}`

#### Function
`{{ dv('{{ seomatic.site.sameAsLinks["instagram"]["url"] }}') }}`


### Config example
Maybe you want to output a value from a config file, such as a custom value in the general.php file.

#### Filter
`{{ '{{ craft.app.config.general.custom.variableName }}' | dv }}`

#### Function
`{{ dv('{{ craft.app.config.general.custom.variableName }}') }}`


Brought to you by [Nathan Reed](https://vimia.co.uk)
