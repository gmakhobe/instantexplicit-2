<?php

namespace App\Http\Logic;
use Illuminate\Support\Facades\DB;

class UserPosts{
    public static function GetLatestPost()
    {
        $UserId = session()->get('user_info')["Id"];

        return DB::select('SELECT S.url_profile AS "Profile", S.Id AS "UserId", S.full_name AS "Name", S.username AS "Username", P.Id AS "PostId", P.path AS "Path", P.caption AS "Caption", P.created_date AS "CreatedDate" FROM followers f INNER JOIN posts P ON f.followed_user_id = P.user_id INNER JOIN users S ON S.Id = P.user_id WHERE f.following_user_id = ? ORDER BY P.created_date DESC', [$UserId]);
    }

    public static function IsFollowedByMe($username) 
    {
        $UserId = session()->get('user_info')["Id"];

        $results = DB::select('select * from followers F
        where F.following_user_id = ? AND F.followed_user_id = (SELECT Id FROM users WHERE username = ?)', [$UserId, $username]);

        return $results;    
    }

    public static function HasBananad($postId)
    {
        $UserId = session()->get('user_info')["Id"];

        $results = DB::select('select * from bananas B
        where B.post_id = ? AND B.user_id = ?', [$postId, $UserId]);

        return (count($results) > 0 ? true: false);
    }

    public static function HasPeachd($postId)
    {
        $UserId = session()->get('user_info')["Id"];

        $results = DB::select('select * from peachs P
        where P.post_id = ? AND P.user_id = ?', [$postId, $UserId]);

        return (count($results) > 0 ? true: false);
    }

    public static function GetSelectedPostTotalPeachs($postId)
    {
        return DB::select('select * from peachs P
        INNER JOIN users U
        ON U.Id = P.user_id
        where P.post_id = ?', [$postId]);
    }

    public static function GetSelectedPostTotalBananas($postId)
    {
        return DB::select('select * from bananas B
        INNER JOIN users U
        ON U.Id = B.user_id
        where B.post_id = ?', [$postId]);
    }

    public static function GetSelectedPost($username, $postId)
    {    
        return DB::select('select * from posts P
        INNER JOIN users U
        ON U.Id = P.user_id
        where P.user_id = (SELECT Id FROM users WHERE username = ?) AND 
        P.Id = ?', [$username, $postId]);
    }

    public static function GetSelectedPostComments($postId)
    {    
        return DB::select('select * from comments C
        INNER JOIN users U
        ON U.Id = C.user_id
        where C.post_id = ? ORDER BY C.created_date DESC', [$postId]);
    }

    public static function GetSelectedUserPosts($username)
    { 
        return DB::select('select * from posts where user_id = (SELECT Id FROM users WHERE username = ?) ORDER BY created_date DESC', [$username]);
    }

}