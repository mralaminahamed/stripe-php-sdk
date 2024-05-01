<?php

namespace Stripe\ApiOperations;

use Stripe\Util\Util;

/**
 * Trait for searchable resources.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait Search
{
    /**
     * @param string $searchUrl
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult of ApiResources
     */
    protected static function _searchResource($searchUrl, $params = null, $opts = null)
    {
        $className = static::class;
        if (\defined("{$className}::DEPRECATED_PARAMS")) {
            Util::triggerDeprecatedParamWarnings($params, static::DEPRECATED_PARAMS);
        }

        return static::_requestPage($searchUrl, \Stripe\SearchResult::class, $params, $opts);
    }
}
