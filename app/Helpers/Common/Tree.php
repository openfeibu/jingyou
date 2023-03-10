<?php

namespace App\Helpers\Common;

class Tree
{
    public function sort($arr,$cols='sort')
    {
        $sort = [];
        //子分类排序
        foreach ($arr as $k => &$v) {
            if(!empty($v['sub'])){
                $v['sub']=self::sort($v['sub'],$cols);
            }
            $sort[$k]=$v[$cols];
        }
        if($sort)
            array_multisort($sort,SORT_DESC,$arr);
        return $arr;
    }
    /*
    public function getLevelTree($data,$parent_id = 0){
        $new_arr = [];
        foreach($data as $k => $v){
            if($v['parent_id'] == $parent_id){
                $new_arr[$v['id']] = $v;
                $new_arr[$v['id']] = $this->getLevelTree($data,$v['id']);
            }
        }
        return $new_arr ?? array();
    }
    */
    public function getLevelTree($data,$parent_id=0)
    {
        $new_arr = [];
        foreach ($data as $key => $item) {
            if($item['parent_id'] == $parent_id)
            {
                $new_arr[$item['id']] = $item;
                $new_arr[$item['id']]['children'] = $this->getLevelTree($data,$item['id']);
            }
        }
        return $new_arr;
    }
    public function getSameLevelWithSignTree($data, $repeat='&nbsp;&nbsp;', $id=0, $new_arr=[], $number=0){
        $child = $this->getChild($data,$id);
        if(is_array($child)){
            $number++;
            foreach($child as $id => $item){
                $level_sign = $number > 0 ? str_repeat($repeat,($number-1) * 4 ) : '';
                $item['name'] = $level_sign.$item['name'];
                $new_arr[] = $item;
                $new_arr = $this->getSameLevelWithSignTree($data, $repeat, $item['id'], $new_arr,$number);
            }
        }
        return $new_arr;
    }
    /**
     * 得到子级数组
     * @param int
     * @return array
     */
    public function getChild($data, $id){
        $a = $new_arr = array();
        if(is_array($data)){
            foreach($data as $key => $a){
                if($a['parent_id'] == $id) $new_arr[$key] = $a;
            }
        }
        return $new_arr ?? false;
    }
}