<?php

namespace Xmon\ColorPickerTypeBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * To validate HexColor Value in field
 *
 * @author Juanjo García <juanjogarcia@editartgroup.com>
 */
class HexColorValidator extends ConstraintValidator {

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $protocol The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     */
    public function validate($protocol, Constraint $constraint) {


        if (is_null($constraint->requireHash)) {
            $hashReg = '#{0,1}';
        } else if ($constraint->requireHash === true) {
            $hashReg = '#';
        } else if ($constraint->requireHash === false) {
            $hashReg = '';
        } else {
            throw new \Exception('The requireHash option value is NOT valid');
        }

        if (!$this->checkHexColor($protocol, $hashReg)) {
            $this->context->buildViolation($constraint->message)
                    ->setParameter('%color%', $protocol)
                    ->addViolation();
        }
    }

    /**
     * @param $color
     * @return bool
     */
    private function checkHexColor($color, $hashReg) {
        /**
         * OK:
         * #ffffff
         * #fff
         * ffffff
         * 444
         * 
         * KO:       
         * #asdfgh
         * #ffff
         * hhhhhh
         * hhh
         */
        $return = false;

        trim($color);

        if (empty($color)) {
            $return = true;
        }

        if (preg_match("/^$hashReg([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/", $color)) {
            $return = true;
        }

        return $return;
    }

}
