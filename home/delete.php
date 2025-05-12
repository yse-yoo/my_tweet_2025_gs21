<?php
// 共通ファイル app.php を読み込み
require_once('../app.php');

use App\Models\AuthUser;
use App\Models\Tweet;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // POSTリクエストでない場合、終了
    exit;
}

// ログインチェック
$auth_user = AuthUser::checkLogin();

// サニタイズ
$posts = sanitize($_POST);

// TODO: 削除処理
$tweet = new Tweet();
$tweet->delete($posts['tweet_id']);

// トップにリダイレクト
header('Location: ./');
exit;