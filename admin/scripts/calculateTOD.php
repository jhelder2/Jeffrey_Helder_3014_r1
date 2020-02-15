<?php

function calculateTOD($time){

//if time is 3:00am-11:59am
    if ($time >= '030000' && $time <= '115959') {
        
        return 'Morning';
//if time is 12:00-3:59pm
    }elseif($time >= '120000' && $time <= '155959') {
            
        return 'Afternoon';    
//if time is 4:00pm-2:59am
    }elseif($time >= '160000' || $time <= '025959') {
                
        return 'Night'; 

    }else{
//if nothing found (error) just return "day"
        return 'Day';
    }
}
 ?>
