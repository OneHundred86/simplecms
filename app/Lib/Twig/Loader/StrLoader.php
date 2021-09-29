<?php


namespace App\Lib\Twig\Loader;


use Twig\Error\LoaderError;
use Twig\Loader\LoaderInterface;
use Twig\Source;

class StrLoader implements LoaderInterface
{
    private $tpl_str;


    public function __construct(string $tpl_str)
    {
        $this->tpl_str = $tpl_str;
    }

    /**
     * Returns the source context for a given template logical name.
     *
     * @throws LoaderError When $name is not found
     */
    public function getSourceContext(string $name): Source{
        return new Source($this->tpl_str, $name);
    }

    /**
     * Gets the cache key to use for the cache for a given template name.
     *
     * @throws LoaderError When $name is not found
     */
    public function getCacheKey(string $name): string{
        return $name;
    }

    /**
     * @param int $time Timestamp of the last modification time of the cached template
     *
     * @throws LoaderError When $name is not found
     */
    public function isFresh(string $name, int $time): bool{
        echo sprintf('%s: %s, %s', __METHOD__, $name, $time) . PHP_EOL;
        return false;
    }

    /**
     * @return bool
     */
    public function exists(string $name){
        echo sprintf('%s: %s, %s', __METHOD__, $name) . PHP_EOL;
        return true;
    }
}