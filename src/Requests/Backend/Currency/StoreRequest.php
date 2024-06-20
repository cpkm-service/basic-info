<?php

namespace Cpkm\Basic\Http\Requests\Backend\Currency;

use Cpkm\Admin\Http\Requests\Backend\Universal\BasicFormRequest;

class StoreRequest extends BasicFormRequest
{
    public $rules = [];
    
    public $type = 'store';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->rules = [
        ];
        foreach(config('basic.currency.form.fields') as $key => $field) {
            foreach ($field['api_rules']['common'] as $rule) {
                if(is_object($rule) && $rule::class == 'Illuminate\Validation\Rules\Unique') {
                    $rule->ignore($this->route('currency'));
                }
            }
            $this->rules[$key]   =  array_merge($field['api_rules']['common'],$field['api_rules'][$this->type]??[]);
        }
        return $this->rules;
    }

    public function attributes(){
        $data = [];
        foreach(config('basic.currency.form.fields') as $key => $field) {
            $data[$key]   =  __($field['text']);
        }
        return $data;
    }
}
