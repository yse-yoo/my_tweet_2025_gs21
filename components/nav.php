<?php
use App\Models\User;
?>
<nav id="side-menu" class="p-3">
    <ul>
        <li>
            <a href="home/" class="inline-flex items-center">
                <img src="svg/home.svg" class="w-10 mr-2">
                <span>ホーム</span>
            </a>
        </li>
        <li>
            <a href="home/grallary.php" class="inline-flex items-center">
                <img src="svg/camera.svg" class="w-10 mr-2">
                <span>ギャラリー</span>
            </a>
        </li>
        <li>
            <div id="user-menu" class="inline-flex items-center">
                <img src="<?= User::profileImage($auth_user['profile_image']) ?>" class="my-2 rounded-full w-10 h-10">
            </div>
            <!-- ポップアップ（初期状態は非表示） -->
            <div id="user-popup" class="hidden absolute left-0 m-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">

                <a href="user/" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    ユーザホーム
                </a>

                <a href="user/logout.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <?= $auth_user['account_name'] ?>
                    からログアウト
                </a>
            </div>
        </li>
    </ul>
</nav>