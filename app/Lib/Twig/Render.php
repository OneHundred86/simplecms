<?php


namespace App\Lib\Twig;

use App\Lib\Twig\Loader\CategoryLoader;
use App\Lib\Twig\Loader\StrLoader;
use App\Model\Article;
use App\Model\Category;
use Twig\Environment;
use Twig\TwigFunction;
use function foo\func;

class Render
{
    private $config;
    public function __construct()
    {
        $this->config = config("twig");
    }

    public function renderByStr(string $tpl, array $data = [])
    {
        $loader = new StrLoader($tpl);
        $twig = new \Twig\Environment($loader, $this->config);

        $this->initFunction($twig);

        echo $twig->render(md5($tpl), $data);
    }

    public function renderByCategory(Category $category, array $data = [])
    {
        $loader = new CategoryLoader($category);
        $twig = new Environment($loader, $this->config);

        $this->initFunction($twig);

        echo $twig->render("category", $data);
    }

    private function initFunction(Environment $twig)
    {
        // article function
        $article = new TwigFunction('article', function ($id = null){
            if($id){
                return Article::find($id);
            }

            // 只取已发布的
            return Article::where('status', Article::STATUS_PUB);
        });
        $twig->addFunction($article);

        // category function
        $category = new TwigFunction('category', function ($id = null){
            if($id){
                return Category::find($id);
            }

            return Category::query();
        });
        $twig->addFunction($category);
    }
}