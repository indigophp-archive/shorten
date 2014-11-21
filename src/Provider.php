<?php

/*
 * This file is part of the Indigo Shorten package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Shorten;

/**
 * URL Shorten Provider interface
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface Provider
{
    /**
     * Shorten an URL
     *
     * @param string $url
     *
     * @return string
     */
    public function shorten($url);

    /**
     * Expand a shortened URL
     *
     * @param string $url
     *
     * @return string
     */
    public function expand($url);
}
