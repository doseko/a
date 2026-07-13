<?php
// ===================================================================
// 課題1：困りごとデータを地域で集計する
// 実行方法： ターミナルで  php kadai1.php
// ===================================================================

// --- 連想配列（キーと値のペア）を要素に持つ配列 ---------------------
// 1件の「困りごと」を [地域・ジャンル・内容] の連想配列で表す。
// それを複数まとめて $requests という配列に入れている。
$requests = [
    ['area' => '名古屋', 'genre' => '鍵',   'content' => '玄関の鍵をなくした'],
    ['area' => '大阪',   'genre' => '水回り', 'content' => 'トイレが詰まった'],
    ['area' => '名古屋', 'genre' => '水回り', 'content' => 'キッチンの水漏れ'],
    ['area' => '東京',   'genre' => '鍵',   'content' => '車のインロック'],
    ['area' => '名古屋', 'genre' => 'ガラス', 'content' => '窓ガラスが割れた'],
    ['area' => '大阪',   'genre' => '鍵',   'content' => '金庫が開かない'],
];

// --- 関数：指定した地域の件数を数える -------------------------------
// 引数： $list（困りごと配列）と $targetArea（数えたい地域）
// 戻り値： 一致した件数（整数）
function countByArea(array $list, string $targetArea): int
{
    $count = 0;

    // foreach で1件ずつ取り出してチェックする
    foreach ($list as $request) {
        // 条件分岐：地域が一致したらカウントを1増やす
        if ($request['area'] === $targetArea) {
            $count++;
        }
    }

    return $count;
}

// --- 実行①：特定の地域を指定して集計する ---------------------------
$target = '名古屋';
$result = countByArea($requests, $target);
echo "【{$target}】の困りごと件数： {$result}件\n";

echo "-----------------------------------\n";

// --- 実行②：全地域を自動で集計する（foreach の応用） --------------
// まず「どんな地域があるか」を集めて重複をなくす。
$areas = [];
foreach ($requests as $request) {
    $areas[$request['area']] = true; // キーにしておくと自然に重複が消える
}

// 集めた地域ごとに件数を出す
echo "▼ 地域別の件数一覧\n";
foreach (array_keys($areas) as $area) {
    $n = countByArea($requests, $area);
    echo "  {$area}： {$n}件\n";
}