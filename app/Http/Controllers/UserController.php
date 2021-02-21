<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Logic\UserPosts;

class UserController extends Controller
{
    public function FollowUser($username)
    {
        $UserId = session()->get('user_info')["Id"];

        DB::insert('insert into followers (following_user_id, followed_user_id) values (?, (SELECT Id FROM users WHERE username = ? ));', [$UserId, $username]);
        
        return redirect("/user/$username");
    }

    public function UnfollowUser($username)
    {
        $UserId = session()->get('user_info')["Id"];

        DB::delete('delete from followers where followed_user_id = (SELECT Id FROM users WHERE username = ?) AND following_user_id = ?', [$username, $UserId]);

        return redirect("/user/$username");
    }


    public function UploadPeach($username, $postId)
    {
        $UserId = session()->get('user_info')["Id"];

        DB::insert("INSERT INTO `peachs` (`Id`, `post_id`, `user_id`, `created_date`) VALUES (NULL, ?, ?, current_timestamp());", [$postId, $UserId]);

        return redirect("/post/$username/id/$postId");
    }

    public function UploadBanana($username, $postId)
    {
        $UserId = session()->get('user_info')["Id"];

        DB::insert("INSERT INTO `bananas` (`Id`, `post_id`, `user_id`, `created_date`) VALUES (NULL, ?, ?, current_timestamp());", [$postId, $UserId]);

        return redirect("/post/$username/id/$postId");
    }

    public function PostComment(Request $request, $username, $postId)
    {
        $UserId = session()->get('user_info')["Id"];

        DB::insert("INSERT INTO `comments` (`Id`, `post_id`, `user_id`, `comment`, `created_date`) VALUES (NULL, ?, ?, ?, current_timestamp());", [$postId, $UserId, $request->comment]);

        return redirect("/post/$username/id/$postId");
    }

    public function Explore()
    {
        $username = session()->get('user_info')["Username"];
        $UserId = session()->get('user_info')["Id"];

        $GetLatestPost = UserPosts::GetLatestPost();
        $TotalBananas = UserPosts::GetSelectedPostTotalBananas($UserId);
        $TotalPeachs = UserPosts::GetSelectedPostTotalPeachs($UserId);
        $HasBananad = UserPosts::HasBananad($UserId);
        $HasPeachd = UserPosts::HasPeachd($UserId);

        return view('user/explore', ["Username" => $username, "GetLatestPost"=> $GetLatestPost, "TotalBananas" => $TotalBananas, "TotalPeachs" => $TotalPeachs, "HasBananad" => $HasBananad, "HasPeachd" => $HasPeachd]);
    }

    public function UploadedPost($Username, $Id)
    {
        $username = session()->get('user_info')["Username"];
        $PostInfo = UserPosts::GetSelectedPost($Username, $Id);
        $Comments = UserPosts::GetSelectedPostComments($Id);
        $TotalBananas = UserPosts::GetSelectedPostTotalBananas($Id);
        $TotalPeachs = UserPosts::GetSelectedPostTotalPeachs($Id);
        $HasBananad = UserPosts::HasBananad($Id);
        $HasPeachd = UserPosts::HasPeachd($Id);

        //print_r($Comments);
        return view('user/post-information', ["Username" => $username, "PostInfo" => $PostInfo, "Comments" => $Comments, "PostId" => $Id, "TotalBananas" => $TotalBananas, "TotalPeachs" => $TotalPeachs, "HasBananad" => $HasBananad, "HasPeachd" => $HasPeachd]);
    }

    public function UploadPost(Request $request)
    {
        $username = session()->get('user_info')["Username"];
        $UserId = session()->get('user_info')["Id"];

        if ($request->post_type == "POST") {

            if (!$request->post_image) return redirect("/create-post");

            $postImageName = $username . "_" . time() . '_post_image.' . $request->post_image->extension();
            $request->post_image->move(public_path('post_images'), $postImageName);

            DB::insert('insert into `posts` (user_id, path, caption, type) values (?, ?, ?, ?)', [$UserId, "/post_images/$postImageName", $request->post_caption, 0]);

            return redirect("/user/$username");
        } else {
            //ToDo
        }
    }

    public function CreatePost()
    {
        $username = session()->get('user_info')["Username"];

        return view('user/create-post', ["Username" => $username]);
    }

    public function ExplorerSearch(Request $request)
    {
        $username = session()->get('user_info')["Username"];

        $results = DB::select("select * from users where (username LIKE '%$request->Keyword%' OR full_name LIKE '%$request->Keyword%') and username <> ? ORDER BY registration_date DESC ", [$username]);

        return view('user/explorer', ["Username" => $username, "SearchedUsers" => $results, "IsSearch" => 1]);
    }

    public function UploadProfileSubFee(Request $request)
    {
        $username = session()->get('user_info')["Username"];
        $amount = $request->amount;

        DB::update('update users set subscription_fee = ? where username = ?', [$amount, $username]);

        return redirect("/user/$username");
    }

    public function UploadProfilePassword(Request $request)
    {
        $username = session()->get('user_info')["Username"];
        $password = $request->password;

        DB::update('update users set passcode = ? where username = ?', [$password, $username]);

        return redirect("/user/$username");
    }

    public function UploadProfileInfo(Request $request)
    {
        $name = $request->full_name;
        $biography = $request->biography;
        $category = $request->category;
        $twitter = $request->twitter;
        $instagram = $request->instagram;
        $onlyfans = $request->onlyfans;
        $website = $request->website;

        $username = session()->get('user_info')["Username"];

        DB::update('update users set full_name = ?, biography = ?, category = ?, url_twitter = ?, url_instagram = ?, url_onlyfans = ?, url_website = ? where username = ?', [$name, $biography, $category, $twitter, $instagram, $onlyfans, $website, $username]);

        return redirect("/user/$username");
    }

    public function UploadProfileBanner(Request $request)
    {
        $username = session()->get('user_info')["Username"];

        if ($username == $request->username_profile_banner) {
            if (!$request->profile_banner) return redirect("/user/$username");

            $imageName = $username . "_" . time() . '_profile_banner.' . $request->profile_banner->extension();
            $request->profile_banner->move(public_path('profile_banners'), $imageName);

            DB::update('update users set url_banner = ? where username = ?', ["/profile_banners/$imageName", $username]);

            return redirect("/user/$username");
        } else {
            return redirect("/");
        }
    }

    public function UploadProfilePicture(Request $request)
    {
        $username = session()->get('user_info')["Username"];

        if ($username == $request->username_profile_picture) {
            if (!$request->profile_picture) return redirect("/user/$username");

            $imageName = $username . "_" . time() . '_profile_picture.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $imageName);

            DB::update('update users set url_profile = ? where username = ?', ["/profile_pictures/$imageName", $username]);

            return redirect("/user/$username");
        } else {
            return redirect("/");
        }
    }

    public function Profile($Username)
    {
        //Get user information
        $username = session()->get('user_info')["Username"];
        $user_info = DB::select('select * from users where username = ?', [$Username]);
        $user_following = UserPosts::GetSelectedUserNumberOfFollowing($Username);
        $user_following_base = UserPosts::GetSelectedUserFollowingBase($Username);

        if (!$user_info[0]->user_type) {

            $user_account_posts = UserPosts::GetSelectedUserPosts($Username);
            $user_followers = UserPosts::GetSelectedUserNumberOfFollowers($Username);
            $user_peaches = UserPosts::GetSelectedUserNumberOfPeaches($Username);
            $user_bananas = UserPosts::GetSelectedUserNumberOfBananas($Username);
            //Get current user following status
            $isFollowedByMe = UserPosts::IsFollowedByMe($Username);

            $IsCurrentUser = ($Username == $username ? 1 : 0);
            return view('user/user-username',  ["Username" => $username, "UserInfo" => $user_info[0], "IsCurrentUser" => $IsCurrentUser, "UserPosts" => $user_account_posts, "NumberOfFollowers"=> $user_followers[0]->total_followers, "NumberOfPeaches"=> $user_peaches[0]->total_number_of_peaches, "NumberOfBananas"=> $user_bananas[0]->total_number_of_bananas, "isFollowedByMe" => $isFollowedByMe]);
        } else {
            
            //print_r($isFollowedByMe);
            return view('user/other-user-username', ["Username" => $username, "UserInfo" => $user_info[0], "NumberOfFollowing"=> $user_following[0]->total_following, "FollowingBase"=> $user_following_base]);
        }
    }

    public function Explorer()
    {
        $username = session()->get('user_info')["Username"];

        $results = DB::select('SELECT Id, full_name, username, url_profile FROM users WHERE username != ? AND user_type = ? ORDER BY registration_date DESC LIMIT ?', [$username, 0, 20]);

        return view('user/explorer', ["Username" => $username, "Users" => $results, "IsSearch" => 0]);
    }

    public function Inbox()
    {
        $username = session()->get('user_info')["Username"];

        return view('user/inbox', ["Username" => $username]);
    }
}
