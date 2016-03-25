<?php

namespace Xmon\ColorPickerTypeBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * To validate HexColor Value in field
 * 
 * @Annotation
 *
 * @author Juanjo García <juanjogarcia@editartgroup.com>
 */
class HexColor extends Constraint {

    public $message = 'The color (%color%) is NOT valid.';

    /**
     * Takes one of these values:
     * null = The hash isn't checked
     * true = The hash is required
     * false = The hash isn't allowed
     * @var type 
     */
    public $requireHash = false;

}
