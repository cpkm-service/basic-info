<?php

return [
    'currency'  =>  [
        'model' =>  \Cpkm\Basic\Models\Currency::class,
        'service'   =>  \Cpkm\Basic\Services\Basic\CurrencyService::class,
        'form'  =>  [
            'create'    =>  'backend.basic.currency.create',
            'show'      =>  'backend.basic.currency.show',
            'edit'      =>  'backend.basic.currency.edit',
            'name'  =>  'currency',
            'action'=>  '',
            'back'  =>  '',
            'method'=>  "POST",
            'form'  =>  [
                [
                    'class' =>  'row',
                    'col'   =>  [
                        [
                            'class' =>  'col-xl-4',
                            'col'   =>  [
                                [
                                    'class' =>  'fields',
                                    'field' =>  'name',
                                ]
                            ]
                        ],
                        [
                            'class' =>  'col-xl-4',
                            'col'   =>  [
                                [
                                    'class' =>  'fields',
                                    'field' =>  'code',
                                ]
                            ]
                        ],
                        [
                            'class' =>  'col-xl-4',
                            'col'   =>  [
                                [
                                    'class' =>  'fields',
                                    'field' =>  'exchange',
                                ]
                            ]
                        ],
                    ]
                ],
                [
                    'class' =>  'row',
                    'col'   =>  [
                        [
                            'class' =>  'col-xl-4',
                            'col'   =>  [
                                [
                                    'class' =>  'fields',
                                    'field' =>  'unit_price_float',
                                ]
                            ]
                        ],
                        [
                            'class' =>  'col-xl-4',
                            'col'   =>  [
                                [
                                    'class' =>  'fields',
                                    'field' =>  'price_float',
                                ]
                            ]
                        ],
                    ]
                ],
                [
                    'class' =>  'row',
                    'col'   =>  [
                        [
                            'class' =>  'col-xl-12',
                            'col'   =>  [
                                [
                                    'class' =>  'fields',
                                    'field' =>  'remark',
                                ]
                            ]
                        ],
                    ]
                ],
            ],
            'fields'    =>  [
                //日期
                'name'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'text',
                    'name'          =>  'name',
                    'text'          =>  'basic::backend.currencies.name',
                    'placeholder'   =>  'basic::backend.currencies.name',
                    'required'      =>  true,
                    'rules' =>  [
                        
                    ],
                    'api_rules' =>  [
                        'common'    =>  [
                            'required',
                            'string',
                            \Illuminate\Validation\Rule::unique('currencies'),
                        ],
                    ],
                ],
                //單號
                'code'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'text',
                    'name'          =>  'code',
                    'text'          =>  'basic::backend.currencies.code',
                    'placeholder'   =>  'basic::backend.currencies.code',
                    'required'      =>  true,
                    'disabled'      =>  false,
                    'rules' =>  [
                        
                    ],
                    'api_rules' =>  [
                        'common'    =>  [
                            'required',
                            'string',
                            \Illuminate\Validation\Rule::unique('currencies'),
                        ],
                    ],
                ],
                //匯率
                'exchange'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'number',
                    'name'          =>  'exchange',
                    'text'          =>  'basic::backend.currencies.exchange',
                    'placeholder'   =>  'basic::backend.currencies.exchange',
                    'value'         =>  0,
                    'required'      =>  true,
                    'disabled'      =>  false,
                    'float'         =>  5,
                    'value'         =>  1,
                    'rules' =>  [
                        
                    ],
                    'api_rules' =>  [
                        'common'    =>  [
                            'required',
                            'numeric',
                            'decimal:0,16,',
                        ],
                    ],
                ],
                //單價位數
                'unit_price_float'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'number',
                    'name'          =>  'unit_price_float',
                    'text'          =>  'basic::backend.currencies.unit_price_float',
                    'placeholder'   =>  'basic::backend.currencies.unit_price_float',
                    'value'         =>  0,
                    'required'      =>  true,
                    'disabled'      =>  false,
                    'int'           =>  true,
                    'value'         =>  1,
                    'rules' =>  [
                        
                    ],
                    'api_rules' =>  [
                        'common'    =>  [
                            'required',
                            'integer',
                        ],
                    ],
                ],
                //金額位數
                'price_float'   =>  [
                    'tag'           =>  'input',
                    'type'          =>  'number',
                    'name'          =>  'price_float',
                    'text'          =>  'basic::backend.currencies.price_float',
                    'placeholder'   =>  'basic::backend.currencies.price_float',
                    'value'         =>  0,
                    'required'      =>  true,
                    'disabled'      =>  false,
                    'int'           =>  true,
                    'value'         =>  1,
                    'rules' =>  [
                        
                    ],
                    'api_rules' =>  [
                        'common'    =>  [
                            'required',
                            'integer',
                        ],
                    ],
                ],
                //備註
                'remark'   =>  [
                    'tag'           =>  'textarea',
                    'name'          =>  'remark',
                    'text'          =>  'basic::backend.currencies.remark',
                    'placeholder'   =>  'basic::backend.currencies.remark',
                    'required'      =>  false,
                    'rules' =>  [
                        
                    ],
                    'api_rules' =>  [
                        'common'    =>  [
                            'nullable',
                            'string',
                        ],
                    ],
                ],
            ],
        ]
    ],
];
