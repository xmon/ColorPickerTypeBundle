<?php

namespace Xmon\ColorPickerTypeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColorPickerType extends AbstractType {

    public function configureOptions(OptionsResolver $resolver) {

        $resolver->setDefaults(array(
            'attr' => [
                'class' => 'jscolor {required:false}'
            ]
        ));
    }

    public function getParent() {
        return TextTypeTest::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockSuffix() {
        return 'xmon_color_picker';
    }

}
