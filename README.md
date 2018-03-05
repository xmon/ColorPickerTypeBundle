ColorPickerTypeBundle
==============================

The ``ColorPickerTypeBundle`` extends ``Symfony2/3`` form types, 
creates a new  ``ColorPicker`` form type, to display a javascript color picker.

This Bundle use [jscolor](http://jscolor.com/).

## Installation

```sh
$ php composer.phar require xmon/color-picker-type-bundle
```

### Add Bundle to your application kernel
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
## Configuration with Assetic Bundle
https://symfony.com/doc/2.8/frontend/assetic/asset_management.html

## Configuration

### Instaling Assetic Bundle (optional)
If you wish to use Assetic Bundle to manage web assets, please follow this [official guide](https://symfony.com/doc/3.4/frontend/assetic/asset_management.html). However keep in mind that `symfony/assetic-bundle` library has been deprecated and is not actively maintained and it's not compatible with Symfony 4+.

### Add ColorPickerTypeBundle to assetic (optional)

If you choose to use Assetic anyway, add this bundle to Assetic configuration.
```yml
# app/config/config.yml
# Assetic Configuration
assetic:
    bundles:        [ 'XmonColorPickerTypeBundle' ]
```

### Include the template for the layout.
Add default form field template shipped with the Bundle.
You can also modify the template in your own bundle and use it instead.
**NOTE:** Please, use correct template depending your setup - with or without Assetic.

#### [SYMFONY 2]
```yml
# your config.yml
twig:
    form:
        resources:
            # Add this one if you use assetic
            - 'XmonColorPickerTypeBundle:Form:fields.html.twig'
            # Add this one if you DON'T use assetic
            - 'XmonColorPickerTypeBundle:Form:fields_no_assetic.html.twig'
```

#### [SYMFONY 3]

```yml
# your config.yml
twig:
    form_themes:
            # Add this one if you use assetic
            - 'XmonColorPickerTypeBundle:Form:fields.html.twig'
            # Add this one if you DON'T use assetic
            - 'XmonColorPickerTypeBundle:Form:fields_no_assetic.html.twig'
```

## Usage

### Add validation to your model. 

```php
// src/AppBundle/Entity/MyEntity.php

use Symfony\Component\Validator\Constraints as Assert;
use Xmon\ColorPickerTypeBundle\Validator\Constraints as XmonAssertColor;

class MyEntity
{

    /**
     * @ORM\Column(type="string", length=6, nullable=true)
     * @XmonAssertColor\HexColor()
     */
    public $fieldName;

}
```

If you want change default message, try this:
```php
    /**
     * @XmonAssertColor\HexColor(
     *      message = "Custom message for value (%color%)."
     * )
     */
```

### [SYMFONY 2] How to use in your form. 

```php
$builder->add('fieldName', 'xmon_color_picker')
```

### [SYMFONY 3] How to use in your form. 

```php
use Xmon\ColorPickerTypeBundle\Form\Type\ColorPickerType;
...
$builder->add('fieldName', ColorPickerType::class)
...
```

This form type can be used without any problem with ``SonataAdminBundle``

### Credits

 - Thanks project used by this one:
	 - [jscolor](http://jscolor.com/)
 - Thanks project by inspiration:
	 - [OhColorPickerTypeBundle](https://github.com/ollieLtd/OhColorPickerTypeBundle)
