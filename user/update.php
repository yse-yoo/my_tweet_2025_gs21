<?php
require_once "../app.php";

// AuthUser モデルを読み込み
use App\Models\AuthUser;
// User モデルを読み込み
use App\Models\User;

// TODO: POSTリクエスト以外は処理しない

// 認証チェック
$auth_user = AuthUser::checkLogin();

// サニタイズ
$posts = sanitize($_POST);

// ユーザ情報を更新
$user = new User();
$user->update($auth_user['id'], $posts);

// ユーザ情報をセッションに保存
$_SESSION[APP_KEY]['auth_user'] = $user->find($auth_user['id']);

// リダイレクト
header('Location: ./');