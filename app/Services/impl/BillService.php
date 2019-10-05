<?php


namespace App\Services\impl;


use App\Bill;
use App\Repositories\BillRepositoryInterface;
use App\Services\BillServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BillService implements BillServiceInterface
{
    /**
     * @var BillRepositoryInterface
     */
    private $billRepository;

    public function __construct(BillRepositoryInterface $billRepository)
    {
        $this->billRepository = $billRepository;
    }

    public function getAll()
    {
        return $this->billRepository->getAll();
    }

    public function create($request)
    {
        $billId = $this->getBillId();
        $bill = new Bill();
        $bill->id = $billId;
        $bill->user_id = Auth::user()->id;
        $bill->billPrice = Session::get('cart')->totalPrice;
        $bill->payDate = date('Y:m:d');
        $bill->billAddress = $request->billAddress;
        $bill->billDistric = $request->billDistric;
        $bill->billCity = $request->billCity;
        $this->billRepository->store($bill);

        $this->storeBillProduct($billId);

        Session::put('cart', null);
    }

    public function findById($id)
    {
        return $this->billRepository->findById($id);
    }

    public function update($request, $id)
    {
        return $this->billRepository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->billRepository->delete($id);
    }

    public function getProductFromSession()
    {
        $products = [];
        foreach (Session::get('cart')->product as $product) {
            array_push($products, $product);
        }

        return $products;
    }

    public function getBillId()
    {

        $bills = $this->billRepository->getAll();
        foreach ($bills as $bill) {
            $billId = mt_rand(0, 100);
            if ($billId !== $bill->id) {
                return $billId;
            }
        }

        return 'request time out';
    }

    public function storeBillProduct($billId)
    {
        $products = $this->getProductFromSession();
        foreach ($products as $product) {
            DB::table('bills_products')->insert([
               'bill_id' => $billId,
               'product_id'=> $product['product'] -> id,
               'quantity' => $product['qty'],
            ]);

        }
    }

    public function findByUserId($id)
    {
        return $this->billRepository->findByUserId($id);
    }
}
