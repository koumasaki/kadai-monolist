<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class RankingController extends Controller
{
    public function want()
    {
//Wantの中間テーブルであるitem_userを指定。SQLでいうとFROM item_userに相当
//$items = \DB::table('item_user')

//items テーブルを item_user テーブルと結合しています。
//->join('items', 'item_user.item_id', '=', 'items.id')

//itemsテーブル全カラム、COUNT計算によって一時的に出現するカラムに、countという名前をつける
//->select('items.*', \DB::raw('COUNT(*) as count'))

//type = wantのみ
//->where('type', 'want')

//グループ化
//->groupBy('items.id', 'items.code', 'items.name', 'items.url', 'items.image_url','items.created_at', 'items.updated_at')

//countの多い順に並べる
//->orderBy('count', 'DESC')

//上位10件取得
//->take(10)

//データ取得
//->get();

        $items = \DB::table('item_user')->join('items', 'item_user.item_id', '=', 'items.id')->select('items.*', \DB::raw('COUNT(*) as count'))->where('type', 'want')->groupBy('items.id', 'items.code', 'items.name', 'items.url', 'items.image_url','items.created_at', 'items.updated_at')->orderBy('count', 'DESC')->take(10)->get();

        return view('ranking.want', [
            'items' => $items, 
        ]);
    }

    public function have()
    {
        $items = \DB::table('item_user')->join('items', 'item_user.item_id', '=', 'items.id')->select('items.*', \DB::raw('COUNT(*) as count'))->where('type', 'have')->groupBy('items.id', 'items.code', 'items.name', 'items.url', 'items.image_url','items.created_at', 'items.updated_at')->orderBy('count', 'DESC')->take(10)->get();

        return view('ranking.have', [
            'items' => $items, 
        ]);
    }
}
