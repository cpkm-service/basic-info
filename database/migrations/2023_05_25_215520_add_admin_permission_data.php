<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AdminPermission;

return new class extends Migration
{
    public $permissionList = [
        [
            'id'            => '21',
            'name'          => '銀行管理',
            'is_show'       => '1',
            'seq'           => '3',
        ],
        [
            'id'            => '22',
            'name'          => '幣別資料',
            'parent_id'     => '21',
            'is_show'       => '1',
            'link'          => 'currencies',
            'controller'    => 'Cpkm\Basic\Http\Controllers\Backend\Basic\CurrencyController',
            'function'      => 'index',
        ],
        [
            'id'            => '23',
            'name'          => '新增幣別',
            'parent_id'     => '22',
            'is_show'       => '0',
            'controller'    => 'Cpkm\Basic\Http\Controllers\Backend\Basic\CurrencyController',
            'function'      => 'create,store',
            'tags_hide'     => '.create',
            'status'        => '0',
        ],
        [
            'id'            => '24',
            'name'          => '幣別詳情',
            'parent_id'     => '22',
            'is_show'       => '0',
            'controller'    => 'Cpkm\Basic\Http\Controllers\Backend\Basic\CurrencyController',
            'function'      => 'show',
            'tags_hide'     => '.read',
            'status'        => '0',
        ],
        [
            'id'            => '25',
            'name'          => '修改幣別',
            'parent_id'     => '22',
            'is_show'       => '0',
            'controller'    => 'Cpkm\Basic\Http\Controllers\Backend\Basic\CurrencyController',
            'function'      => 'edit,update',
            'tags_hide'     => '.edit',
            'status'        => '0',
        ],
        [
            'id'            => '26',
            'name'          => '刪除幣別',
            'parent_id'     => '22',
            'is_show'       => '0',
            'controller'    => 'Cpkm\Basic\Http\Controllers\Backend\Basic\CurrencyController',
            'function'      => 'destroy',
            'tags_hide'     => '.delete',
            'status'        => '0',
        ],
        [
            'id'            => '27',
            'name'          => '幣別異動紀錄',
            'parent_id'     => '22',
            'is_show'       => '0',
            'controller'    => 'Cpkm\Basic\Http\Controllers\Backend\Basic\CurrencyController',
            'tags_hide'     => '.audit-tab,#data-audit',
            'status'        => '0',
        ],
    ];
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        foreach ($this->permissionList as $key => $value) {
            AdminPermission::create($value);
        } 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach ($this->permissionList as $key => $value) {
            AdminPermission::where('id',$value['id'])->delete();
        } 
    }
};