<?php
namespace App\Services;

use App\Models\Tree;

class TreeService {
    
    public $treelist = array();
    public $parentlist = array();
            
    function createtree($member, $parent=NULL, $node=0){

        return $member.$parent.$node;
        /*if(is_null($parent))
            $this->treelist = array();
        
        //store member and parent
        $this->treelist[$node]["member"]=$member;
        $this->treelist[$node]["parent"]=$parent;
        
        //find $member's children
        $datas = Tree::where('parent_id','=',$member);
        foreach ($datas as $children){
            if($children->position=="L")
                $newnode = $node*2+1;
            else if($children->position=="R")
                $newnode = $node*2+2;
            create_function($children->member_id,$children->parent_id,$newnode);
        }*/
    }
    
    //安置
    function insertnode($member,$parent,$position){
        
    }
    
    //呼叫createparent前 tree->parentlist需要初始化
    function createparent($member,$level){
        if($level != 0){
            $data = Tree::find($member);
            $this->parentlist[$level]=$data->parent_id;
            $newlevel = $level-1;
            createparent($data->parent_id,$newlevel);
        }       
    }

}
