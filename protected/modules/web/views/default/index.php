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
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>姓名</th>
                  <th>性别</th>
                  <th>生日</th>
                  <th>年龄</th>
                  <th>职业</th>
                  <th>电话</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>王蓓</td>
                  <td>女</td>
                  <td>1984-09-08</td>
                  <td>33</td>
                  <td>婚礼策划师</td>
                  <td>185731655050</td>
                  <td>详情/修改/删除</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>王蓓</td>
                  <td>女</td>
                  <td>1984-09-08</td>
                  <td>33</td>
                  <td>婚礼策划师</td>
                  <td>185731655050</td>
                  <td>详情/修改/删除</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
