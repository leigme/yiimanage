
<body>
  <?php $this->beginContent('../admin/nav');?>
  <?php $this->endContent();?> 

  <div class="container">

<form class="form-inline">

        <div class="row topheader">

          <div class="col-md-2"></div>
          
          <div class="col-md-8">
          <label for="exampleInputName2">添加孩子</label>
            <div class="row top">
              <div class="col-md-6">
               <div class="form-group">
                 <label for="exampleInputName2">姓名</label>
                 <input type="text" class="form-control" id="exampleInputName2" placeholder="请输入用户姓名">
               </div>
             </div>

             <div class="col-md-6">


            </div>
          </div><!--row 1 end-->

          <div class="row top">

           <div class="col-md-6">
             <div class="form-group">
              <label for="exampleInputName2">生日</label>
              <input type="text" class="form-control" id="exampleInputName2" placeholder="weixin">
            </div>
          </div>
          <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputName2">性别</label>
                <select class="form-control">
                  <option value="-1">选择</option>
                  <option value="2">王子</option>
                  <option value="4">公主</option>
                </select>
              </div>
          </div>
          </div>
    
    <div class="row top">

     <div class="col-md-12">
       <label for="exampleInputName2">备注</label>
       <textarea class="form-control" rows="5" cols="80"></textarea>
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
</div>
</body>



