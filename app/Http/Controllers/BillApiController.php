<?php

namespace App\Http\Controllers;

use App\Http\Resources\Bill as BillResource;
use App\Services\BillServiceInterface;
use Illuminate\Http\Request;

class BillApiController extends Controller
{

    /**
     * @var BillServiceInterface
     */
    private $billService;

    public function __construct(BillServiceInterface $billService)
    {
        $this->billService = $billService;
    }

    public function index()
    {
        $product = $this->billService->getAll();

        return BillResource::collection($product);
    }
}
