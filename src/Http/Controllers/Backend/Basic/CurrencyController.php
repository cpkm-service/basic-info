<?php

namespace Cpkm\Basic\Http\Controllers\Backend\Basic;

use App\Http\Controllers\Backend\BasicController as Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    protected $form = [];
    protected $fields = [];

    public $show = false;
    function __construct() 
    {
        $this->form = config('basic.currency.form');
        $this->fields = config('basic.currency.form.fields');
        $this->form['back'] =   route('backend.basic.currency.index');
        $this->CurrencyService = app(config('basic.currency.service'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->expectsJson()) {
            return response()->json([
                "data"  =>  $this->CurrencyService->index(request()->extraParam??[]),
            ]);
        }
        return view('basic::backend.currency.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->form['action']   =   route('backend.basic.currency.store');
        $this->form['title']    =   '新增幣別';
        $data['form']   =   $this->form;
        \View::share('fields',$this->fields);
        return view('basic::backend.currency.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->CurrencyService->store($request->all());
        return redirect()->route('backend.basic.currency.index');
    }

    public function formDataHandle($detail) {
        foreach($detail as $field => $value) {
            if(isset($this->fields[$field])) {
                $this->fields[$field]['value']  =   $value;
                if($this->show) {
                    $this->fields[$field]['disabled']  =   true;
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['detail'] = $this->CurrencyService->getCurrency($id);
        $this->form['title']    =   '幣別詳情';
        $this->show = true;
        $this->formDataHandle($data['detail']->toArray());
        $data['form']   =   $this->form;
        \View::share('fields',$this->fields);
        $data['table']  =   'currencies';
        $data['show']   =   $this->show;
        return view('basic::backend.currency.form',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['detail'] = $this->CurrencyService->getCurrency($id);
        $this->form['title']    =   '編輯幣別';
        $this->form['action']   =   route('backend.basic.currency.update',['currency'=>$id]);
        $this->form['method']   =   "PUT";
        $this->formDataHandle($data['detail']->toArray());
        $data['form']   =   $this->form;
        \View::share('fields',$this->fields);
        return view('basic::backend.currency.form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->CurrencyService->update($request->all(),$id);
        return redirect()->route('backend.basic.currency.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->CurrencyService->delete($id);
        return response()->json(['message' => __('delete').__('success')]);
    }
}
