<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
	protected $primaryKey = 'member_id';
    protected $fillable=[
    	'member_id',
    	'parent_id',
    	'position'
    ];

    /**
     * 取得擁有此tree的會員。
     */
    public function member()
    {
        return $this->belongsTo('App\Models\User', 'member_id','user_id');
    }

    /**
     * 取得擁有此tree的會員上線。
     */
    public function parent()
    {
        return $this->belongsTo('App\Models\User', 'parent_id', 'user_id');
    }


}
