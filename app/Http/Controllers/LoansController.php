<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loans;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loans::all();
    return view('loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shares.create');
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
      'employee'  => 'required',
      'loanAmount'  => 'required',
      'currency' => 'required',
      'date'   => 'required',
      'startDate' => 'required',
      'InstallmentAmount'   => 'required',
    ]);

    $loan = new Loans([
      'employee'  => $request->get('employee'),
      'loanAmount'  => $request->get('loanAmount'),
      'currency' => $request->get('currency'),
      'date'   => $request->get('date')
      'startDate' => $request->get('startDate'),
      'InstallmentAmount'   => $request->get('InstallmentAmount')
      
    ]);
    $loan->save();
    return redirect('/loans')->with('success','Loan has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loan = Loans::find($id);
    return view('loans.edit', compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
      'employee'  => 'required',
      'loanAmount'  => 'required',
      'currency' => 'required',
      'date'   => 'required',
      'startDate' => 'required',
      'InstallmentAmount'   => 'required',
    ]);

    $loan = new Loans([
      'employee'  => $request->get('employee'),
      'loanAmount'  => $request->get('loanAmount'),
      'currency' => $request->get('currency'),
      'date'   => $request->get('date')
      'startDate' => $request->get('startDate'),
      'InstallmentAmount'   => $request->get('InstallmentAmount')
      
    ]);
    $loan->save();
    return redirect('/loans')->with('success','Loan has been Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loan = Loans::find($id);
    $loan->delete();
    return redirect('/loans')->with('success', 'Loan has been deleted!');
    }
}
