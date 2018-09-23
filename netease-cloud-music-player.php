<?php

/*
Plugin Name:  网易云音乐网页播放插件（netease-cloud-music-website-player）	
Description: 一个插件支持你实现网页播放网易云歌单（a plugin help you to come true play netease cloud song sheet on your wordpress website）
Version:     1.0
Author:      South-Rose
Author URI:  http://jianghaowen.com
*/
add_action( 'wp_head','netease_cloud_music_player_css_add',1);
function netease_cloud_music_player_css_add() {
    wp_enqueue_style( 
            'netease_cloud_music_player_css', 
            plugin_dir_url(__FILE__).'css/style.css' 
            );
}
add_action( 'wp_head','netease_cloud_music_player_js_add',2);
function netease_cloud_music_player_js_add(){
    wp_enqueue_script(
            'netease_cloud_music_player_js',
            plugin_dir_url(__FILE__).'js/netease-cloud-music-player-js.js',
            array('jquery')
            );
}
add_action( 'wp_footer',netease_cloud_music_player,1);
function netease_cloud_music_player(){
 $temporary=get_option("song_sheet_number");
 $temporary_2=get_option("song_sheet_music_auto");
 $temporary_3=get_option("song_sheet_display_auto");
 $temporary_4=get_option("song_sheet_size_1");
 $temporary_5=get_option("song_sheet_size_2");
 $temporary_6=$temporary_4+20;
 $temporary_7=$temporary_5+20;
 $temporary_8=$temporary_4-10;
 $temporary_9=$temporary_5-10;
 echo  '<iframe id="music4" frameborder="no" border="0" marginwidth="0" marginheight="0" width='.$temporary_6 .' height='.$temporary_7 .' src="http://music.163.com/outchain/player?type=0&id='.$temporary .'&auto='.$temporary_2 .'&height='.$temporary_5 .'"></iframe>
     <a href="javascript:void(0)" id="guan2" style="bottom:'.$temporary_9 .'px; left:'.$temporary_8 .'px;">X</a>
<div id="music" style="display:'.$temporary_3 .';">
 <a href="javascript:void(0)" id="music5">
  <i id="music2"></i>
  <span id="music3"></span>
  <img src="'. plugin_dir_url(__FILE__) .'/img/1.jpg">
 </a>
 </div>';
 } 
add_action('admin_menu','netease_cloud_music_player_menu');
function netease_cloud_music_player_menu(){
    add_menu_page(
            '网易云音乐网页播放插件', 
            '音乐歌单设置', 
            'manage_options',
            'netease_music_song_sheet_control', 
            'netease_cloud_music_player_menu_action', 
            'dashicons-media-audio', 
            '100');
}
function netease_cloud_music_player_menu_action(){
  echo '  
    <div class="wrap">
    <h1>网易云歌单设置</h1>
    <h3>歌单id为你的网易云歌单url里面id的后面数字</h3>
    <form method="post" action="options.php">';
         settings_fields('to_check'); 
  echo ' <table class="form-table">
            <tr>
                <th scope="row">
                    <label for="song_sheet_number">歌单id</label>
                </th>
                <td>';
    $temporary=get_option("song_sheet_number");
    echo '  <input type="text" id="song_sheet_number" name="song_sheet_number" class="regular-text" value=" '.$temporary .'"/>';
    echo'         </td>
            </tr>
                <tr>
                <th scope="row">
                    <label for="song_sheet_number2">是否自动播放</label>
                </th>
                <td>';
    $temporary_2=get_option("song_sheet_music_auto");
    if($temporary_2==1){
    echo '  <input type="radio" id="song_sheet_number2" name="song_sheet_music_auto" class="regular-text" value=1 checked="checked"/>是
            <input type="radio" id="song_sheet_number2" name="song_sheet_music_auto" class="regular-text" value=0/>否
    ';}
    elseif($temporary_2==0){
    echo '  <input type="radio" id="song_sheet_number2" name="song_sheet_music_auto" class="regular-text" value=1 />是
            <input type="radio" id="song_sheet_number2" name="song_sheet_music_auto" class="regular-text" value=0 checked="checked"/>否
    ';}
     else{
         echo '  <input type="radio" id="song_sheet_number2" name="song_sheet_music_auto" class="regular-text" value=1 />是
            <input type="radio" id="song_sheet_number2" name="song_sheet_music_auto" class="regular-text" value=0/>否
    ';}
    echo'         </td>
            </tr>
             <tr>
                <th scope="row">
                    <label for="song_sheet_number3">是否显示播放框</label>
                </th>
                <td>';
    $temporary_3=get_option("song_sheet_display_auto");
    if($temporary_3=="block"){
    echo '  <input type="radio" id="song_sheet_number3" name="song_sheet_display_auto" class="regular-text" value="block" checked="checked"/>是
            <input type="radio" id="song_sheet_number3" name="song_sheet_display_auto" class="regular-text" value="none"/>否
    ';}
    elseif($temporary_3=="none"){
        echo '  <input type="radio" id="song_sheet_number3" name="song_sheet_display_auto" class="regular-text" value="block"/>是
                <input type="radio" id="song_sheet_number3" name="song_sheet_display_auto" class="regular-text" value="none" checked="checked"/>否
             ';
    }
    else{
          echo '  <input type="radio" id="song_sheet_number3" name="song_sheet_display_auto" class="regular-text" value="block"/>是
                  <input type="radio" id="song_sheet_number3" name="song_sheet_display_auto" class="regular-text" value="none"/>否
             ';
    }
    echo'         </td>
            </tr>
             <tr>
                <th scope="row">
                    <label for="song_sheet_number3">播放框尺寸</label>
                </th>
                <td>';
    $temporary_4=get_option("song_sheet_size_1");
    $temporary_5=get_option("song_sheet_size_2");
    if(empty($temporary_4)|| empty($temporary_5)){
    echo '  宽：<input type="text" id="song_sheet_number4" name="song_sheet_size_1" class="size-text" value=310 size=5/>x
            高：<input type="text" id="song_sheet_number4" name="song_sheet_size_2" class="size-text" value=430 size=5/><h3>(推荐为310x430，宽的设置范围为260-510，高的设置范围为190-500)</h3>';
    }else{
        echo '  宽：<input type="text" id="song_sheet_number4" name="song_sheet_size_1" class="size-text" value=" '.$temporary_4 .'" size=5/>x
                高：<input type="text" id="song_sheet_number4" name="song_sheet_size_2" class="size-text" value=" '.$temporary_5 .'" size=5/><h3>(推荐为310x430，建议在宽的设置范围为260-510，高的设置范围为190-500之间进行调节，<br/>当然不在范围也可以。)</h3>';
    }
    echo'         </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="立即保存" class="button button-primary"/>
    </form>
</div>';
settings_errors();
}
add_action('admin_init','receive_date_to_datebase');
function receive_date_to_datebase(){
    register_setting('to_check', 'song_sheet_number');
    register_setting('to_check', 'song_sheet_music_auto');
    register_setting('to_check', 'song_sheet_display_auto');
    register_setting('to_check', 'song_sheet_size_1');
    register_setting('to_check', 'song_sheet_size_2');
}

