ColorPickerTypeBundle
==============================

The ``ColorPickerTypeBundle`` extends ``Symfony2`` form types, 
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
## Configuration

### Add ColorPickerTypeBundle to assetic

```yml
# app/config/config.yml
# Assetic Configuration
assetic:
    bundles:        [ 'XmonColorPickerTypeBundle' ]
```

### Include the template for the layout. 
You can modify the template in your own bundle.

```yml
# your config.yml
twig:
    form:
        resources:
            # This uses the default - you can put your own one here
            - 'XmonColorPickerTypeBundle:Form:fields.html.twig'
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

### How to use in your form. 

```php
$builder->add('fieldName', 'xmon_color_picker')
```

### Credits

 - Thanks proyect used by this one:
	 - [jscolor](http://jscolor.com/)
 - Thanks proyect by inspiration:
	 - [OhColorPickerTypeBundle](https://github.com/ollieLtd/OhColorPickerTypeBundle)