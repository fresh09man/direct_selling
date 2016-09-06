<?php

class recommend {
    
    //推薦獎金
    function recommend($member){
        $user = User::find($member);
        $bouns = $user->member_level_id->price_usd * $user->member_level_id->recommend_percent;
        
        //新增$bouns給$user->recommend_id
    }
    
    //對等獎金
    function recommender($member,$times=1){
        $user = User::find($member);
        //member的推薦人的代數和趴數
        $rnum = $user->recommend_id->member_level_id->recommender_num;
        $user->recommend_id->member_level_id->recommender_percnet;
        
        if($times<=3){
            
            if($rnum>=$times){
                //新增對等獎金
                
            }
            recommender($recommend_id,2);
        }
    }
}
