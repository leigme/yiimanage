  <body>

<?php $this->beginContent('nav');?>
<?php $this->endContent();?> 

    <div class="container">
      <div class="row">
          <div class="table-responsive">
            <label style="margin: 100px 0px 0px 0px">客户列表</label>
            <a type="submit" class="btn btn-primary" href="<?php echo $this->urls['addUser']; ?>">添加客户</a>
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
                  <td><a href="<?php echo $this->mBaseUrl('web/admin/detail/id/'); ?>1001">详情</a> / <a href="">修改</a> / <a href="">删除</a></td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>王蓓</td>
                  <td>女</td>
                  <td>1984-09-08</td>
                  <td>33</td>
                  <td>婚礼策划师</td>
                  <td>185731655050</td>
                  <td><a href="">详情</a> / <a href="">修改</a> / <a href="">删除</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

  </body>
</html>
