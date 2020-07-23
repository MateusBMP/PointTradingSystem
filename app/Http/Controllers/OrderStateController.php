<?php

namespace App\Http\Controllers;

use App\OrderState;
use Illuminate\Http\Request;

class OrderStateController extends Controller
{
    /**
     * Current route name
     * 
     * @param string
     */
    private $route_name;

    public function __construct()
    {
        $this->route_name = substr(\Request::route()->getName(), 0, strrpos(\Request::route()->getName(), '.'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'collection' => OrderState::all(),
            'route_name' => $this->route_name,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', [
            'inputs' => [
                ['type' => 'string', 'name' => 'name'],
                ['type' => 'string', 'name' => 'detail']
            ],
            'route_name' => $this->route_name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|alpha_dash|max:100',
            'detail' => 'required',
        ]);

        $order_state = new OrderState;

        $order_state->name = \Illuminate\Support\Str::of($validatedData['name'])->upper();
        $order_state->detail = $validatedData['detail'];

        $order_state->save();

        return redirect()->route($this->route_name . ".index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderState  $orderState
     * @return \Illuminate\Http\Response
     */
    public function show(OrderState $orderState)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderState  $orderState
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderState $orderState)
    {
        return view('edit', [
            'inputs' => [
                ['type' => 'string', 'name' => 'name', 'value' => $orderState->name],
                ['type' => 'string', 'name' => 'detail', 'value' => $orderState->detail]
            ],
            'collection' => $orderState,
            'route_name' => $this->route_name
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderState  $orderState
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderState $orderState)
    {
        $validatedData = $request->validate([
            'name' => 'required|alpha_dash|max:100',
            'detail' => 'required',
        ]);

        $orderState->name = \Illuminate\Support\Str::of($validatedData['name'])->upper();
        $orderState->detail = $validatedData['detail'];

        $orderState->save();

        return redirect()->route($this->route_name . ".index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderState  $orderState
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderState $orderState)
    {
        $orderState->forceDelete();

        return redirect()->route($this->route_name . ".index");
    }
}
