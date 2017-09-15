  <body>

<?php $this->beginContent('nav');?>
<?php $this->endContent();?> 

    <div class="container">
      <div class="row">
          <div class="table-responsive">
            <label style="margin: 100px 0px 0px 0px">客户列表</label>
            <a type="submit" class="btn btn-primary" href="<?php echo $this->urls['addUserPage']; ?>">添加客户</a>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>姓名</th>
                  <th>性别</th>
                  <th>生日</th>
                  <th>年龄</th>
                  <th>职业</th>
                  <th>微信</th>
                  <th>电话</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              	if (STATUS_OK === $resultData['resStatus']) {
              		$resArray = $resultData['resArray'];
                  foreach ($resArray as $resData) {
                  ?>
                    <tr>
                      <td><?php echo $resData['id']; ?></td>
                      <td><?php echo $resData['realname']; ?></td>
                      <td><?php echo $resData['sex']; ?></td>
                      <td><?php echo $resData['birthday']; ?></td>
                      <td><?php echo $resData['age']; ?></td>
                      <td><?php echo $resData['career']; ?></td>
                      <td><?php echo $resData['weixinnum']; ?></td>
                      <td><?php echo $resData['telephonenum']; ?></td>
                      <td><a href="<?php echo $this->urls['detailPage'].'/id/'.$resData['id']; ?>">详情</a> / <a href="">修改</a> / <a href="">删除</a></td>
                    </tr>
                  <?php
                  }
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

  </body>
</html>
