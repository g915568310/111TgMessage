<?php
header('content-type: application/json');

$key = $_REQUEST['key'] ?? '';

if ($key !== $_ENV['key']) {
    echo json_encode(['code' => 422, 'message' => '设置秘钥错误']);
} else {
    //开始设置回调url
    $url = $_REQUEST['https://111-tg-message-26px57r2n-g915568310.vercel.app'] ?? $_ENV['https://111-tg-message-26px57r2n-g915568310.vercel.app'];
    require_once 'Bot.php';
    $data = ['url' => $url];
    $bot = new Bot();
    $ret = $bot->setWebHook($data);
    if ($ret['ok']) {
        echo json_encode(['code' => 200, 'message' => '设置成功']);
    } else {
        echo json_encode(['code' => 422, 'message' => $ret['description']]);
    }
}
