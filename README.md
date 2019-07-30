# transferTable

![2019-07-30.17.38.16-image.png](https://raw.githubusercontent.com/9499574/markdown/master/img/2019-07-30.17.38.16-image.png)

#### >>>layui 版本 2.5.4
#### 使用方法:
~~~javascript
<body>
	<div id="transferTable"></div>
</body>
<script type="text/javascript">
	layui.config({
		base:'js/layui_exts/'
	}).use('transferTable', function(){
		var transferTable = layui.transferTable,$=layui.$;
		var cols = [
				{checkbox: true, fixed: true}
				,{field:'id', title: 'ID'} 
				,{field:'username', title: '用户名'}
				,{field:'sex', title: '性别'}
				]

		transferTable.render({
			elem: '#transferTable'
			,url: ['api.php?t=1','api.php?t=2']
			,cols: [[cols],[cols]]
			,page: [true,true]
			,id:['transferTable_1_1','transferTable_2_2']
			,height:[500,500]
			,where:{id:'1,2,3'}
			,id_name:'id'
		})
		
		$('#reload').on('click',function(){
			transferTable.reload('transferTable_1_1',{
				page:{curr:1},
				where:{
					title: $('#title').val(),
					sex: $('#sex').val()
				}
			})
		})

		$('#submit').on('click',function(){
			var id = transferTable.get('transferTable_2_2');
			layer.msg(JSON.stringify(id));
		})
	
	})
</script>
~~~