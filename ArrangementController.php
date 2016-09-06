<?php
namespace App\Http\Controllers\Front;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Services\TreeService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Lang;
use Session;
use Auth;


class ArrangementController extends Controller{
    
    protected $treelist = array();
    protected $parentlist = array();

    protected $user; 
    protected $userService; 
    protected $treeService; 

    public function __construct(UserService $userService,TreeService $treeService)
    {
        $this->userService =  $userService;
        $this->treeService =  $treeService;
        $this->user = $this->userService->getUserInfo();
    }

     /**
     * 安置首���
     *
     * @return view front/place/index
     */
    public function index($user_id){


        $data=[
            'page_title' => Lang::get('default.index')
        ];

        return view('front.arrangement.index');
    }

    /**
     * 安置���員������
     *
     * @return 
     */
    public function store($member_id,$parent_id,$node){

        //$this->treeService->insertnode($member_id,$parent_id,$node);
        $this->treeService->createtree(2);
        print_r($this->treeService->treelist);
        
        return $this->treeService->parentlist;
    }

            
  
}
