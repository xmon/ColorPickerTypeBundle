<?php

namespace Xmon\ColorPickerTypeBundle\Validator\Constraints;

use Exception;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * To validate HexColor Value in field
 *
 * @author Juanjo García <juanjogarcia@editartgroup.com>
 */
class HexColorValidator extends ConstraintValidator
{

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $color The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     *
     * @api
     *
     * @throws Exception
     */
    public function validate($color, Constraint $constraint)
    {
        /** @var HexColor $constraint */
        if (null === $constraint->requireHash) {
            $hashReg = '#{0,1}';
        } elseif (true === $constraint->requireHash) {
            $hashReg = '#';
        } elseif (false === $constraint->requireHash) {
            $hashReg = '';
        } else {
            throw new Exception('The requireHash option value is NOT valid');
        }

        if (!$this->checkHexColor($color, $hashReg)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%color%', $color)
                ->addViolation();
        }
    }

    /**
     * @param string $color
     * @param string $hashReg
     *
     * @return bool
     */
    private function checkHexColor($color, $hashReg)
    {
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
