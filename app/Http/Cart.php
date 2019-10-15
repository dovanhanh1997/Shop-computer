<?php


namespace App\Http;

use Illuminate\Support\Facades\Session;

class Cart
{
    public $product;
    public $totalQty;
    public $totalPrice;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->product = $oldCart->product;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function changeCart($product, $request)
    {
        $storeProduct = ['qty' => 0, 'price' => $product->productPrice, 'product' => $product];

        if ($this->isAnyProductInCart()) {
            $this->updateOrCreateProduct($product, $request, $storeProduct);
        } else {
            $this->createFirstProductInCart($product, $request, $storeProduct);
        }
    }

    public function addInToCart($product, $request, $storeProduct)
    {
        if ($request->qty) {
            $storeProduct['qty'] = $request->qty;
        } else {
            $storeProduct['qty']++;
        }
        $storeProduct['price'] = $product->productPrice * $storeProduct['qty'];

        $this->product[$product->id] = $storeProduct;
        $this->totalPrice += $storeProduct['price'];
        $this->totalQty += $storeProduct['qty'];

        Session::flash('success', 'Add to Cart');
    }

    public function removeFromCart($product, $storeProduct)
    {
        if ($storeProduct['qty'] > 1) {
            $storeProduct['qty']--;

            $this->totalQty--;
            $this->totalPrice -= $product->productPrice;
        }
        $storeProduct['price'] = $storeProduct['qty'] * $product->productPrice;
        $this->product[$product->id] = $storeProduct;
    }

    public function deleteInCart($product)
    {
        $storeProduct = $this->product[$product->id];
        $this->totalPrice -= $storeProduct['price'];
        $this->totalQty -= $storeProduct['qty'];

        unset($this->product[$product->id]);
    }

    public function createFirstProductInCart($product, $request, $storeProduct)
    {
        $this->addInToCart($product, $request, $storeProduct);
    }

    public function listenIncreaseOrDecreaseProduct($request, $product, $storeProduct)
    {
        if ($storeProduct['qty'] < $request->qty) {
            $this->totalQty -= ($request->qty - 1);
            $this->totalPrice = ($this->totalPrice - $storeProduct['price']);
            $this->addInToCart($product, $request, $storeProduct);
        } else {
            $this->removeFromCart($product, $storeProduct);
        }
    }

    public function createIfNotUpdate($product, $request, $storeProduct)
    {
        $this->addInToCart($product, $request, $storeProduct);
    }

    public function getDataToUpdate($product)
    {
        return $this->product[$product->id];
    }

    /**
     * @param $product
     * @return bool
     */
    public function isProductExistInCart($product): bool
    {
        return array_key_exists($product->id, $this->product);
    }

    /**
     * @param $product
     * @param $request
     */
    public function updateProductInCart($product, $request): void
    {
        $storeProduct = $this->getDataToUpdate($product);

        $this->listenIncreaseOrDecreaseProduct($request, $product, $storeProduct);
    }

    /**
     * @param $product
     * @param $request
     * @param array $storeProduct
     */
    public function updateOrCreateProduct($product, $request, array $storeProduct): void
    {
        if ($this->isProductExistInCart($product)) {
            $this->updateProductInCart($product, $request);

        } else {
            $this->createIfNotUpdate($product, $request, $storeProduct);
        }
    }

    /**
     * @return mixed
     */
    public function isAnyProductInCart()
    {
        return $this->product;
    }
}
