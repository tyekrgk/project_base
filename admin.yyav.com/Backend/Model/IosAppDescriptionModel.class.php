<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Backend\Model;
use Think\Model;

class IosAppDescriptionModel extends Model
{
    protected $trueTableName = 'ios_app_description';
    
    //根据trackId获取有效的应用描述
    public  function getAppDescription($trackId)
    {
        $where = array(
           'status' => '1',
            'track_id' => $trackId
        );
        
        return $this->where($where)->find();
    }
    
    //更新描述
    public function updateAppDescription($trackId,$fieldName,$fieldValue){
        return $this->where(array('track_id'=>$trackId))->setField($fieldName,$fieldValue);
    }
    
    //添加描述
    public function addAppDescription($data){
        return $this->add($data);
    }
    
    
    //设置制定字段的数据值
    public function setFieldValue($id,$field)
    {
        return $this->where(array('id' => $id))->setField($field);
    }
    
    
    
}

