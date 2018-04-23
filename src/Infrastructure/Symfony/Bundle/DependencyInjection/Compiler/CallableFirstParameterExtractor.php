<?php

namespace App\Infrastructure\Symfony\Bundle\DependencyInjection\Compiler;

use ReflectionClass;
use ReflectionMethod;

final class CallableFirstParameterExtractor
{
    public function extract($class)
    {
        $reflector = new ReflectionClass($class);
        $method = $reflector->getMethod('__invoke');

        return $this->firstParameterClassFrom($method);
    }

    private function firstParameterClassFrom(ReflectionMethod $method)
    {
        return $method->getParameters()[0]->getClass()->getName();
    }
}
