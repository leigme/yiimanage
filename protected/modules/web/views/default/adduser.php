
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <?php $this->beginContent('sidebar');?>
		<?php $this->endContent();?> 
          <div class="table-responsive">
            <form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">姓名</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="请输入用户姓名">
  </div>
    <div class="form-group">
    <label for="exampleInputName2">性别</label>
    		<select class="form-control">
		  <option>选择</option>
		  <option>男</option>
		  <option>女</option>
		</select>
  </div>
    <div class="form-group">
    <label for="exampleInputName2">微信</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
  </div>
    <div class="form-group">
    <label for="exampleInputName2">电话</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2">年龄</label>
    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="输入数字">
  </div>
      <div class="form-group">
    <label for="exampleInputName2">职业</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
  </div>
      <div class="form-group">
    <label for="exampleInputName2">电子邮件</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
  </div>
      <div class="form-group">
    <label for="exampleInputName2">客户来源</label>
    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
  </div>
      <div class="form-group">
	    <label for="exampleInputName2">价格敏感度</label>
	    <select class="form-control">
	    		<option>选择</option>
  <option>低</option>
  <option>中</option>
  <option>高</option>
		</select>
  	</div>
  	<label for="exampleInputName2">备注</label>
  	<textarea class="form-control" rows="3"></textarea>
  <button type="submit" class="btn btn-primary">添 加</button>
  <button type="submit" class="btn btn-default">取 消</button>
</form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>



