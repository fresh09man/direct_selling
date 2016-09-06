<?php
namespace App\Services;

use App\Models\Tree;

class TreeService {
    public $treelist = array();
    public $parentlist = array();
            
    function createtree($member, $parent=NULL, $node=0){
        if(is_null($parent))
            $this->treelist = array();
        
        //store member and parent
        $this->treelist[$node]["member"]=$member;
        $this->treelist[$node]["parent"]=$parent;
        
        //find $member's children
        if(!is_null($member)){
            $datas = Tree::where('parent_id','=',$member)->get();
            
            //left and right pull a null children node
            $l_node = $node*2+1;
            $r_node = $node*2+2;
            $this->createtree(NULL,$member,$l_node);
            $this->createtree(NULL,$member,$r_node);
            
            //if there is a children(member) in DB, put it in left or right children node
            foreach ($datas as $children){
                if($children->position=="L"){
                    $newnode = $node*2+1;
                    $this->createtree($children->member_id,$children->parent_id,$newnode);
                    
                }else if($children->position=="R"){
                    $newnode = $node*2+2;
                    $this->createtree($children->member_id,$children->parent_id,$newnode);
                    
                }
            }
            
        }
    }
    
    //安置
    function insertnode($member,$parent,$node){
        if($node%2==0)
            $data = array("member_id"=>$member,"parent_id"=>$parent,"position"=>"R");
        else 
            $data = array("member_id"=>$member,"parent_id"=>$parent,"position"=>"L");
        
        $result = Tree::create($data);
        if(!$result)
            throw new Exception ("error");
        else
            return $r=array("result" => 1);
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
    
    //見點
}
