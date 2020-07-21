<?php
namespace App;

use App\Picture;

class PictureGenerator{

    public static function generate($account){
        
        $picure = Picture::where('account_id', $account->id)->first();
        
        if($picure){

            return $picure->fname;
        }else{
            return 'user.jpg';
        }
    }   
}