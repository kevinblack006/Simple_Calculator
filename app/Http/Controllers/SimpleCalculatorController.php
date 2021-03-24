<?php

namespace App\Http\Controllers;

use App\SimpleCalculator;
use Illuminate\Http\Request;

class SimpleCalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lastcalc=NULL)
    {
        // Return last 10 entries and result as a flash message
        $calculations = SimpleCalculator::orderBy('created_at', 'desc')->take(10)->get();
        return view('simplecalculator.index')
        ->with('calculations', $calculations)
        ->with('flash_message', $lastcalc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'input1' => 'required|integer',
            'input2' => 'required|integer'
        ]);

        // Compute the result and insert into DB
        switch($request['operand']) {
            case '+':
                $finalResult = $request['input1'] + $request['input2'];
                break;
            case '-':
                $finalResult = $request['input1'] - $request['input2'];
                break;
            case '*':
                $finalResult = $request['input1'] * $request['input2'];
                break;
            case '/':
                $finalResult = $request['input1'] / $request['input2'];
                break;  
        }

        $calc = new SimpleCalculator([
            'Input1' => $request['input1'],
            'Input2' => $request['input2'],
            'Operand' => $request['operand'],
            'Result' => $finalResult
        ]);

        $calc->save();
        return $this->index($finalResult);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SimpleCalculator  $simpleCalculator
     * @return \Illuminate\Http\Response
     */
    public function show(SimpleCalculator $simpleCalculator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SimpleCalculator  $simpleCalculator
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpleCalculator $simpleCalculator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SimpleCalculator  $simpleCalculator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpleCalculator $simpleCalculator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SimpleCalculator  $simpleCalculator
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpleCalculator $simpleCalculator)
    {
        //
    }
}
