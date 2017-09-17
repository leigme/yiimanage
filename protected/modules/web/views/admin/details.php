
<body>
  <?php $this->beginContent('../admin/nav');?>
  <?php $this->endContent();?> 

  	<div class="container">
  		<label style="margin: 100px 0px 0px 0px">客户详情</label>
  		<a type="submit" class="btn btn-primary" href="<?php echo $this->urls['upUserPage'].'/id/'.$userId; ?>">修改详情</a>
		<table class="table table-striped" style="margin: 10px 0px 0px 0px">
	      	<tbody>
		        <tr>
	          		<td>客户名称</td>
		          	<td><?php echo $userInfo['realname']; ?></td>
		          	<td>性别</td>
		          	<td><?php echo $userInfo['sex']; ?></td>
		        </tr>
		        <tr>
	          		<td>微信</td>
		          	<td><?php echo $userInfo['weixinnum']; ?></td>
		          	<td>电话</td>
		          	<td><?php echo $userInfo['telephonenum']; ?></td>
		        </tr>
		        <tr>
	          		<td>年龄</td>
		          	<td><?php echo $userInfo['age']; ?></td>
		          	<td>职业</td>
		          	<td><?php echo $userInfo['career']; ?></td>
		        </tr>
		        <tr>
	          		<td>电子邮件</td>
		          	<td><?php echo $userInfo['email']; ?></td>
		          	<td>备注</td>
		          	<td><?php echo $userInfo['remark']; ?></td>
		        </tr>
		        <tr>
	          		<td>客户来源</td>
		          	<td><?php echo $userInfo['come']; ?></td>
		          	<td>价格敏感度</td>
		          	<td><?php echo $userInfo['pricelevel']; ?></td>
		        </tr>
	      	</tbody>
	    </table>

		<label style="margin: 50px 0px 0px 0px">孩子资料</label>
		<a type="submit" class="btn btn-primary" href="<?php echo $this->urls['addChildPage'].'/id/'.$userId; ?>">添加孩子</a>
		
		<table class="table table-striped">
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

			<?php 
				if (STATUS_NG != $childInfos) {
					foreach ($childInfos as $childInfo) {
			?>
	      	<tbody>
		        <tr>
	          		<td><?php echo $childInfo['realname']; ?></td>
		          	<td><?php echo $childInfo['birthday']; ?></td>
		          	<td><?php echo $childInfo['age']; ?></td>
		          	<td><?php echo $childInfo['sex']; ?></td>
		          	<td><?php echo $childInfo['remark']; ?></td>
		          	<td><a href="">修改</a> / <a href="">删除</a></td>
		        </tr>
	      	</tbody>
			<?php
					}
				}
			 ?>
		</table>

		<label style="margin: 50px 0px 0px 0px">跟进信息</label>
		<a type="submit" class="btn btn-primary" href="<?php echo $this->urls['addFollowPage'].'/id/'.$userId; ?>">添加跟进</a>

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
                <?php 
              		if (STATUS_NG != $followsData) {
              			foreach ($followsData as $followData) {
              	?>
              <tbody>
              	<tr>
                  <td><?php echo $followData['id']; ?></td>
                  <td><?php echo $followData['followtime']; ?></td>
                  <td><?php echo $followData['context']; ?></td>
                  <td><?php echo $followData['remark']; ?></td>
                  <td><a href="<?php echo $this->urls['upFollowPage'].'/id/'.$userId.'/followId/'.$followData['id']; ?>">修改</a> / <a href="">删除</a></td>
                </tr>
              </tbody>
              	<?php
              			}
              		}
              	?>
        </table>
        <?php 
        	if (STATUS_NG != $followsData) {
        		$this->widget('CLinkPager', array('pages'=>$pages['pages'], 
                		'header'=>false,  
                    	'htmlOptions'=>array('class'=>'pagination pull-right'),  
	                    'selectedPageCssClass' => 'active',  
	                    'hiddenPageCssClass' => 'disabled',  
	                    'firstPageLabel'=>'首页',  
	                    'lastPageLabel'=>'尾页',  
	                    'prevPageLabel'=>'«',  
	                    'nextPageLabel'=>'»',  
	                    'maxButtonCount'=>5,  
	                    'cssFile'=>false,  
	                    'firstPageCssClass'=>'previous',  
	                    'lastPageCssClass'=>'next', 
                	));
        	}
        ?>
	</div>
</body>



