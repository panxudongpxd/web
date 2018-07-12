<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../layui/css/layui.css">
	<script type="text/javascript" src='../layui/layui.all.js'></script>
	<script type="text/javascript" src='../layui/jquery-3.2.1.min.js'></script>
</head>
<body>
<form method="post">
	
	{{csrf_field()}}
	<button type="button" class="layui-btn" id="test1">
  		<i class="layui-icon">&#xe67c;</i>上传图片
	</button>
</form>
   
<script>
layui.use('upload', function(){
  var upload = layui.upload;
  //执行实例
  var uploadInst = upload.render({
    elem: '#test1' //绑定元素
    ,url: 'upload' //上传接口
    ,multiple:true
    ,data:{'_token':$('input[type=hidden]').val()}
    ,done: function(res){
      //上传完毕回调
      console.log(res);
      layer.msg(res.msg);
    }
    ,error: function(res){
      //请求异常回调
      console.log(res.msg);
    }
  });
});
</script> 
</body>
</html>