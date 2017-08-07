<?php
//チームの中に特定のペアがいるか調査するメソッド
//ドール=カード、キャラクターインスタンス

$pair_list=array(
                    array('pair_id'=>1,'name'=>'Effect A','mag'=>120,'doll_id_1'=>1,'doll_id_2'=>2),
                    array('pair_id'=>2,'name'=>'Effect B','mag'=>140,'doll_id_1'=>3,'doll_id_2'=>4),
                    array('pair_id'=>3,'name'=>'Effect C','mag'=>160,'doll_id_1'=>4,'doll_id_2'=>6),
                    array('pair_id'=>4,'name'=>'Effect D','mag'=>180,'doll_id_1'=>5,'doll_id_2'=>7),
                    array('pair_id'=>5,'name'=>'Effect E','mag'=>200,'doll_id_1'=>8,'doll_id_2'=>9),
                );

$target_doll_id_list=[7,8,5];//ドールは3体。マスターの方のIDを引っ張っておく。
sort($target_doll_id_list);//ここでsortを使うのが肝(1) ドールの並び順を強制的にdoll_id若い順にして比較する

$effected_pair_id_array=null;
$effected_pair_name=null;
$effected_pair_mag=100;

foreach($pair_list as $row){
    $check_id_pair=[$row['doll_id_1'],$row['doll_id_2']];
    sort($check_id_pair);//ここでsortを使うのが肝(2) マスター側もdoll_id順にソートする

    //その上で1個目が合致＋2個目か3個目が合致するならペア発見できる
    if(
       ($target_doll_id_list[0]==$check_id_pair[0] 
       && ($target_doll_id_list[1]==$check_id_pair[1] || $target_doll_id_list[2]==$check_id_pair[1] ) )
       ||
       //(ペアにならない若い数字が1個目に入ってきて)2個目と3個目がペアだったパターンも見つけられる
       ($target_doll_id_list[1]==$check_id_pair[0] && $target_doll_id_list[2]==$check_id_pair[1])
      )
       {
            $effected_pair_id_array=[$row['doll_id_1'],$row['doll_id_2']];
            $effected_pair_mag=$row['mag'];
            $effected_pair_name=$row['name'];
            break;
       }
}


//結果表示部分====================================
echo "effected_pair_id_array=";
if(is_null($effected_pair_id_array))echo "null\n";

$first=true;
if(is_array($effected_pair_id_array)){
    echo"[";
    foreach($effected_pair_id_array as $row){
        if($first===true){
             echo $row.",";
             $first=false;
            }
         else echo $row;
    }
    echo "]\n";
}
echo "effect_name=";
if(is_null($effected_pair_name))echo "null\n";
else echo $effected_pair_name."\n";

echo "mag={$effected_pair_mag}\n";