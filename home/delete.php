<?php
// 共通ファイル app.php を読み込み
require_once('../app.php');

use App\Models\AuthUser;
use App\Models\Tweet;

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

$auth_user = AuthUser::checkLogin();

$posts = sanitize($_POST);

// TODO: 削除処理
$tweet = new Tweet();

// トップにリダイレクト
header('Location: ./');
exit;