<?php


namespace AppTest\Controller;

use App\Service\View;
use App\Service\Container;
use App\Controller\Products;
use App\Model\ProductRepository;
use PHPUnit\Framework\TestCase;


class ProductsTest extends TestCase
{
    private View $view;
    private Products $products;
    private ProductRepository $productRepository;

    protected function setUp(): void
    {
        $container = new Container();
        $this->view = new View();
        $container->set(View::class, $this->view);
        $this->productRepository = new ProductRepository();
        $this->products = new Products($container, $this->productRepository);

        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testWhereProductsExists(): void
    {
        $this->products->action();

        self::assertSame('products.tpl', $this->view->getTemplate());

        $params = $this->view->getParams();
        self::assertCount(4, $params);
        self::assertSame('Products', $params['headline']);
        self::assertSame('Product list:', $params['info']);
        self::assertSame($this->productRepository->getList(), $params['allProducts']);
        self::assertSame($this->productRepository->hasProduct(2), $params['hasProduct']);
    }

    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }
}