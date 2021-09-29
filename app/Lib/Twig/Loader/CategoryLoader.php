<?php


namespace App\Lib\Twig\Loader;


use App\Exceptions\ErrorCodeException;
use App\Model\Category;
use Twig\Error\LoaderError;
use Twig\Loader\LoaderInterface;
use Twig\Source;

class CategoryLoader implements LoaderInterface
{
    /**
     * @var Category
     */
    protected $category;

    /**
     * $var Template
     */
    protected $template;

    public function __construct($category)
    {
        $this->category = $category;

        if(!$category->template){
            throw new ErrorCodeException(400, "栏目模版未配置");
        }elseif(!$category->template->category_template){
            throw new ErrorCodeException(400, "栏目模版未配置(1)");
        }

        $this->template = $category->template;
    }

    public function getSourceContext(string $name): Source
    {
        return new Source($this->template->category_template, $name);
    }

    public function getCacheKey(string $name): string
    {
        return sprintf("category_%d", $this->category->id);
    }

    public function isFresh(string $name, int $time): bool
    {
        //\Log::debug(__METHOD__, [
        //    'time' => date('Y-m-d H:i:s', $time),
        //]);
        return $time >= strtotime($this->template->updated_at);
    }

    public function exists(string $name)
    {
        return !empty($this->template->category_template);
    }
}