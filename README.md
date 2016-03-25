ColorPickerTypeBundle
==============================

The ``ColorPickerTypeBundle`` extends ``Symfony2`` form types, 
creates a new  ``ColorPicker`` form type, to display a javascript color picker.

This Bundle use [jscolor](http://jscolor.com/).

## Installation

```sh
$ php composer.phar require xmon/color-picker-type-bundle dev-master
```

## Add Bundle to your application kernel
```php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Xmon\ColorPickerTypeBundle\XmonColorPickerTypeBundle(),
        // ...
    );
}
```

## Add ColorPickerTypeBundle to assetic

```yml
# app/config/config.yml
# Assetic Configuration
assetic:
    bundles:        [ 'XmonColorPickerTypeBundle' ]
```

## Include the template for the layout. You can modify the template in your own bundle

```yml
# your config.yml
twig:
    form:
        resources:
            # This uses the default - you can put your own one here
            - 'XmonColorPickerTypeBundle:Form:fields.html.twig'
```