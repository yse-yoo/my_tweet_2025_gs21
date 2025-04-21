<?php
// 共通ファイル app.php を読み込み
require_once '../app.php';

// Userモデルをインポート
use App\Models\User;

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
// POSTデータ取得
$posts = sanitize($_POST);
// var_dump($posts);
// exit;

// TODO: セッションの APP_KEY 下の regist にPOSTデータを保存
$_SESSION[APP_KEY]['regist'] = $posts;

// TODO: サニタイズ

// TODO: Userモデルでユーザ登録(insert)を実行
$user = new User();
$auth_user['id'] = $user->insert($posts);

if (empty($auth_user['id'])) {
    // TODO: エラーを APP_KEY > errors > public セッションに保存
    $_SESSION[APP_KEY]['errors']['public'] = 'ユーザ登録に失敗しました。';
    // TODO: 入力画面(input.php)にリダイレクト
    header('Location: input.php');
    exit;
} else {
    // TODO: 登録成功の場合は完了画面(login/)へリダイレクト
    header('Location: ../login/');
    exit;
}
