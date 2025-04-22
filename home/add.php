<?php
// 共通ファイル app.php を読み込み
require_once('../app.php');

// AuthUser モデルを読み込み
use App\Models\AuthUser;
// Tweet モデルを読み込み
use App\Models\Tweet;

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// TODO: ログインユーザチェック
// TODO: ユーザがいなかったらログイン画面にリダイレクト
$auth_user = AuthUser::checkLogin();

// TODO: POSTデータを取得
$posts = sanitize($_POST);
// var_dump($posts);

// TODO: 投稿処理
$tweet = new Tweet();
$tweet->insert($auth_user['id'], $posts);

// トップにリダイレクト
header('Location: ./');
exit;