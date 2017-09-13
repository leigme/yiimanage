
<body>
  <?php $this->beginContent('../admin/nav');?>
  <?php $this->endContent();?> 

  	<div class="container">
  		<label style="margin: 100px 0px 0px 0px">客户详情</label>
		<table class="table table-striped">
	      	<tbody>
		        <tr>
	          		<td>客户名称</td>
		          	<td>王蓓</td>
		          	<td>性别</td>
		          	<td>女</td>
		        </tr>
		        <tr>
	          		<td>微信</td>
		          	<td>tianxinmamiwb</td>
		          	<td>电话</td>
		          	<td>18573165050</td>
		        </tr>
		        <tr>
	          		<td>年龄</td>
		          	<td>33</td>
		          	<td>职业</td>
		          	<td>婚礼策划师</td>
		        </tr>
		        <tr>
	          		<td>电子邮件</td>
		          	<td></td>
		          	<td>备注</td>
		          	<td>女儿 四岁 喜欢冰雪奇缘</td>
		        </tr>
		        <tr>
	          		<td>客户来源</td>
		          	<td>传单</td>
		          	<td>价格敏感度</td>
		          	<td>低</td>
		        </tr>
	      	</tbody>
	    </table>

		<label style="margin: 100px 0px 0px 0px">孩子资料</label>
		<a type="submit" class="btn btn-primary" href="<?php echo $this->urls['addChild']; ?>">添加孩子</a>
		
		<table class="table table-striped" style="margin: 0px 0px 20px 0px">
	      	<thead>
	                <tr>
	                  <th>姓名</th>
	                  <th>生日</th>
	                  <th>年龄</th>
	                  <th>性别</th>
	                  <th>备注</th>
	                  <th>操作</th>
	                </tr>
	              </thead>
	      	<tbody>
		        <tr>
	          		<td>李贝贝</td>
		          	<td>2012-08-08</td>
		          	<td>5岁</td>
		          	<td>公主</td>
		          	<td>喜欢冰雪奇缘</td>
		          	<td><a href="">修改</a> / <a href="">删除</a></td>
		        </tr>
		        <tr>
	          		<td>李明</td>
		          	<td>2013-08-08</td>
		          	<td>4岁</td>
		          	<td>王子</td>
		          	<td>喜欢小猪佩奇</td>
		          	<td><a href="">修改</a> / <a href="">删除</a></td>
		        </tr>
	      	</tbody>
	    </table>

		<label style="margin: 100px 0px 0px 0px">跟进信息</label>
		<a type="submit" class="btn btn-primary" href="<?php echo $this->urls['addUser']; ?>">添加跟进</a>

		<table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>跟进日期</th>
                  <th>跟进情况</th>
                  <th>备注</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>2017/9/1</td>
                  <td>派发传单时获取基本信息，有意向，愿意进一步了解</td>
                  <td></td>
                  <td><a href="">修改</a> / <a href="">删除</a></td>
                </tr>
              </tbody>
        </table>
	</div>
</body>



