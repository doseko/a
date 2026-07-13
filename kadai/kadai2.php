<?php

$vendors = [
    ['name' => '名古屋カギ救急',   'area' => '名古屋', 'genre' => '鍵'],
    ['name' => '中部水道サービス', 'area' => '名古屋', 'genre' => '水回り'],
    ['name' => '大阪ロックサポート', 'area' => '大阪',   'genre' => '鍵'],
];

$request = ['area' => '名古屋', 'genre' => '鍵', 'content' => '玄関の鍵をなくした'];

function matchVendors(array $vendors, array $request): array
{
    $matched = [];                       // ← 空配列で初期化（[] なし）

    foreach ($vendors as $vendor) {      // ← 加盟店を1件ずつ $vendor に
        if ($vendor['area'] === $request['area']
            && $vendor['genre'] === $request['genre']) {
            $matched[] = $vendor;        // ← = で末尾に追加
        }
    }

    return $matched;                     // ← 配列ごと返す
}

$result = matchVendors($vendors, $request);
print_r($result);                        // ← 配列の中身を確認