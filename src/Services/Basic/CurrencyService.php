<?php

namespace Cpkm\Basic\Services\Basic;

use Illuminate\Support\Arr;
use App\Exceptions\ErrorException;
use DataTables;

/**
 * Class CurrencyService.
 */
class CurrencyService
{
    /** 
     * @access protected
     * @var CurrencyRepository
     * @version 1.0
     * @author Henry
    **/
    protected $CurrencyRepository;
    
    /** 
     * 建構子
     * @version 1.0
     * @author Henry
    **/
    public function __construct() {
        $this->CurrencyRepository = app(config('basic.currency.model'));
    }
    
    /**
     * 幣別列表
     * @param array $data
     * @version 1.0
     * @author Henry
     * @return \DataTables
     */
    public function index($data , $datable = true) {
        $where = Arr::only($data,[]);
        if($datable) {
            return DataTables::of($this->CurrencyRepository->listQuery($where))->make();
        }else{
            return $this->CurrencyRepository->listQuery($where)->get();
        }
    }

    /**
     * 取得幣別資料
     * @param string $id
     * @return object
     * @version 1.0
     * @author Henry
     */
    public function getCurrency(string $id) {
        return $this->CurrencyRepository->getDetail($id);
    }
    /**
     * 資料處理
     *
     * @param  mixed $data
     * @return void
     */
    public function dataHandle($data) {
        return $data;
    }

    /**
     * 建立幣別資料
     * @param array $data
     * @return object $model
     * @throws \App\Exceptions\Universal\ErrorException
     * @version 1.0
     * @author Henry
     */
    public function store(array $data) {
        return \DB::transaction(function() use ($data){
            $createData =  $this->dataHandle(Arr::only($data, $this->CurrencyRepository->getDetailFields()));
            $model     =   $this->CurrencyRepository->create($createData);
            if(!$model){
                throw new ErrorException(__('backend.errors.insertFail'), 500);
            }
            return $model;
        });
    }

    /**
     * 更新幣別資料
     * @param array $updateData
     * @param string $id
     * @return object $model
     * @throws \App\Exceptions\Universal\ErrorException
     * @version 1.0
     * @author Henry
     */
    public function update(array $data, string $id) {
        return \DB::transaction(function() use ($data, $id){
            $updateData = $this->dataHandle(Arr::only($data, $this->CurrencyRepository->getDetailFields()));
            $model =  $this->getCurrency($id);
            $result = $model->update($updateData);
            if(!$result){
                throw new ErrorException(__('backend.errors.updateFail'), 500);
            }
            return $model;
        });
    }

    /**
     * 刪除幣別資料
     * @param string $id
     * @return object $model
     * @throws \App\Exceptions\Universal\ErrorException
     * @version 1.0
     * @author Henry
     */
    public function delete(string $id) {
        $model =  $this->getCurrency($id);
        $model->delete();
        if(!$model){
            throw new ErrorException(__('backend.errors.deleteFail'), 500);
        }
        return $model;
    }

    public function select() {
        return $this->CurrencyRepository->select(['id', 'code', 'name'])->get()->map(function($item) {
            return [
                'value' =>  $item->id,
                'name'  =>  "{$item->name}"
            ];
        })->toArray();
    }

}