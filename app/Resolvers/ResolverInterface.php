<?php

namespace App\Resolvers;

use App\Exceptions\InvalidResolverValueException;

interface ResolverInterface
{
    /**
     * Resolve entity by the given value
     *
     * @param mixed $value
     * @return mixed
     * @throws InvalidResolverValueException
     */
    public function resolve($value);
}
