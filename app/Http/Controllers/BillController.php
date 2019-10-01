<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequestForm;
use App\Services\BillServiceInterface;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * @var BillServiceInterface
     */
    private $billService;

    public function __construct(BillServiceInterface $billService)
    {
        $this->middleware('auth');

        $this->billService = $billService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = $this->billService->getAll();
        return view('bill.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillRequestForm $request)
    {
        $this->billService->create($request);
        return redirect()->route('bills.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = $this->billService->findById($id);
        return view('bill.detail', compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bill.update', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BillRequestForm $request, $id)
    {
        $bill = $this->billService->update($request, $id);
        return redirect()->route('bills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->billService->delete($id);
        return redirect()->route('bills.index');
    }
}
