<?php

include_once './../../../back-end/helper/function.php';
function getVids($number)
{
    $vids = getApi('timeline/video/' . $number);
    return $vids;
}

function postAPIString($string){
    if( $string == ''){
        $vids = getVids(10);
    }else{
        $arrayJSon = array(
            'searchRequest' => $string
        );
        $vids = postApi($arrayJSon, "search");
    }

    return $vids;
}


function getCreator($id)
{
    $creator = getApi('channel/' . $id);
    return $creator;
}

    $vids = postAPIString('#DCS');
    // $vids = Searchupdate( $vids);

    var_dump($vids);
    die;
        ?>