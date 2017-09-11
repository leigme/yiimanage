
<body>
  <?php $this->beginContent('../admin/nav');?>
  <?php $this->endContent();?> 

  <div class="container">

<form class="form-inline">

        <div class="row topheader">

          <div class="col-md-2"></div>

          <div class="col-md-8">
            <div class="row top">
              <div class="col-md-6">
               <div class="form-group">
                 <label for="exampleInputName2">姓名</label>
                 <input type="text" class="form-control" id="exampleInputName2" placeholder="请输入用户姓名">
               </div>
             </div>

             <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputName2">性别</label>
                <select class="form-control">
                  <option>选择</option>
                  <option>男</option>
                  <option>女</option>
                </select>
              </div>
            </div>
          </div><!--row 1 end-->

          <div class="row top">

           <div class="col-md-6">
             <div class="form-group">
              <label for="exampleInputName2">微信</label>
              <input type="text" class="form-control" id="exampleInputName2" placeholder="weixin">
            </div>
          </div>
          <div class="col-md-6">

           <div class="form-group">
             <label for="exampleInputName2">价格敏感度</label>
             <select class="form-control">
               <option>选择</option>
               <option>低</option>
               <option>中</option>
               <option>高</option>
             </select>
           </div>


         </div>

       </div><!--row 2 end-->

       <div class="row top">

         <div class="col-md-6">
           <div class="form-group">
            <label for="exampleInputEmail2">电话</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="18888888888">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputName2">年龄</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="18">
          </div>

        </div>

      </div><!--row 3 end-->
      
      <div class="row top">

        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputName2">邮件</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="example@example.com">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="exampleInputName2">职业</label>
            <input type="text" class="form-control" id="exampleInputName2" placeholder="老板">
          </div>

        </div>

      </div><!--row 4 end-->
      
      <div class="row top">

       <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputName2">来源</label>
          <input type="text" class="form-control" id="exampleInputName2" placeholder="">
        </div>
      </div>
      <div class="col-md-6">

      </div>

    </div><!--row 5 end-->
    
    <div class="row top">

     <div class="col-md-12">
       <label for="exampleInputName2">备注</label>
       <textarea class="form-control" rows="3" cols="80"></textarea>
     </div>

   </div><!--row 6 end-->
   
   <div class="row top">

     <div class="col-md-6"></div>
     <div class="col-md-6">
      <button type="submit" class="btn btn-primary">提 交</button>
      <button type="submit" class="btn btn-default">取 消</button>
    </div>
  </div><!--row 7 end-->
  
</div><!-- col-md-8 end-->
<div class="col-md-2"></div>
</div>
</form>
<button type="submit" class="btn btn-primary">添 加</button>
<div>
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
</body>



