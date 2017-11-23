<?php

namespace Xmon\ColorPickerTypeBundleTests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Xmon\ColorPickerTypeBundle\DependencyInjection\XmonColorPickerTypeExtension;
use Xmon\ColorPickerTypeBundle\Form\Type\ColorPickerType;

class XmonColorPickerTypeExtensionTest extends TestCase
{
    public function testDefaultConfigurationColorPickerClassIsLoaded()
    {
        $container = new ContainerBuilder();
        
        (new XmonColorPickerTypeExtension())->load([], $container);
        
        // Compile to resolve % substitutions in the configuration.
        $container->compile();
        
        $this->assertSame(
            ColorPickerType::class,
            $container->getDefinition('form.type.xmon_color_picker')->getClass()
        );
    }
}
