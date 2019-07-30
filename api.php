<?php
$params = $_GET;
if($params['t']==2 && empty($params['id'])){
	echo json_encode(['code'=>1,'msg'=>'无数据','data'=>[],'count'=>0]);die;
}
if(!empty($params['id'])){
	$ids = explode(',', $params['id']);
}else{
	$ids = [];
}

$data = [];
for ($i=1; $i < 100 ; $i++) {
	$sex = $i%2==0?'男':'女';
	if($params['t']==1 && !in_array($i, $ids)){
		if(!empty($params['sex']) && $params['sex']==1 && $sex=='男'){
			$data[] = ['id'=>$i,'username'=>'user_'.$i,'sex'=>$sex];
		}else if(!empty($params['sex']) && $params['sex']==2 && $sex=='女'){
			$data[] = ['id'=>$i,'username'=>'user_'.$i,'sex'=>$sex];
		}else if(empty($params['sex'])){
			$data[] = ['id'=>$i,'username'=>'user_'.$i,'sex'=>$sex];
		}
		
	}else if($params['t']==2 && in_array($i, $ids)){
		$data[] = ['id'=>$i,'username'=>'user_'.$i,'sex'=>$sex];
	}
	
}
if($data){
	$arr = array_chunk($data,$params['limit'])[$params['page']-1];
	echo json_encode(['code'=>0,'msg'=>'','data'=>$arr,'count'=>count($data)]);
}else{
	echo json_encode(['code'=>1,'msg'=>'无数据','data'=>[],'count'=>0]);
}
