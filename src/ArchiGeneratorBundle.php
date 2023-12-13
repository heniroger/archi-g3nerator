<?php


declare(strict_types=1);

namespace ArchiGeneratorBundle;

use ArchiGeneratorBundle\DependencyInjection\ArchiGeneratorExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ArchiGeneratorBundle extends AbstractBundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        if($this->extension === null) {
            $this->extension = new ArchiGeneratorExtension();
        }

        return $this->extension;
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
