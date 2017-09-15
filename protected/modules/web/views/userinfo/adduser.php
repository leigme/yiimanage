
<body>
  <?php $this->beginContent('../admin/nav');?>
  <?php $this->endContent();?> 

  <div class="container">

    <form class="form-inline" id="myForm" action="<?php echo $this->urls['addUser']; ?>" method="POST">

      <div class="row topheader">

        <div class="col-md-2"></div>

        <div class="col-md-8">
          <div class="row top">
            <div class="col-md-6">
             <div class="form-group">
               <label for="exampleInputName2">姓名</label>
               <input name="realname" id="realname" type="text" class="form-control" id="exampleInputName2" placeholder="请输入用户姓名">
             </div>
           </div>

           <div class="col-md-6">

            <div class="form-group">
              <label for="exampleInputName2">性别</label>
              <select name="sex" id="sex" class="form-control">
                <option value="-1">选择</option>
                <option value="2">男</option>
                <option value="4">女</option>
              </select>
            </div>
          </div>
        </div><!--row 1 end-->

        <div class="row top">

         <div class="col-md-6">
           <div class="form-group">
            <label for="exampleInputName2">微信</label>
            <input name="weixin" id="weixin" type="text" class="form-control" id="exampleInputName2" placeholder="weixin">
          </div>
        </div>
        <div class="col-md-6">

         <div class="form-group">
           <label for="exampleInputName2">价格敏感度</label>
           <select name="price" id="price" class="form-control">
             <option value="-1">选择</option>
             <option value="2">低</option>
             <option value="4">中</option>
             <option value="8">高</option>
           </select>
         </div>


       </div>

     </div><!--row 2 end-->

     <div class="row top">

       <div class="col-md-6">
         <div class="form-group">
          <label for="exampleInputEmail2">电话</label>
          <input name="telephone" id="telephone" type="text" class="form-control" id="exampleInputEmail2" placeholder="18888888888">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputName2">年龄</label>
          <input name="age" id="age" type="text" class="form-control" id="exampleInputName2" placeholder="18">
        </div>

      </div>

    </div><!--row 3 end-->

    <div class="row top">

      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputName2">邮件</label>
          <input  name="email" id="email" type="email" class="form-control" id="exampleInputName2" placeholder="example@example.com">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputName2">职业</label>
          <input name="career" id="career" type="text" class="form-control" id="exampleInputName2" placeholder="老板">
        </div>

      </div>

    </div><!--row 4 end-->

    <div class="row top">

     <div class="col-md-6">
      <div class="form-group">
        <label for="exampleInputName2">来源</label>
        <input name="come" id="come" type="text" class="form-control" id="exampleInputName2" placeholder="">
      </div>
    </div>
    <div class="col-md-6">

    </div>

  </div><!--row 5 end-->

  <div class="row top">

   <div class="col-md-12">
     <label for="exampleInputName2">备注</label>
     <textarea name="remark" id="remark" class="form-control" rows="3" cols="80"></textarea>
   </div>

 </div><!--row 6 end-->

 <div class="row top">

   <div class="col-md-6"></div>
   <div class="col-md-6">
    <button type="button" class="btn btn-primary" onclick="myClick()">提 交</button>
    <button type="submit" class="btn btn-default">取 消</button>
  </div>
</div><!--row 7 end-->

</div><!-- col-md-8 end-->
<div class="col-md-2"></div>
</div>
</form>
</div>
<script type="text/javascript">

  function myClick() {

  	var emailReg = /^[a-zA-Z0-9_\-]{1,}@[a-zA-Z0-9_\-]{1,}\.[a-zA-Z0-9_\-.]{1,}$/;
  	
    var realname = $('#realname').val();
    if (null == realname  || undefined == realname || '' == realname) {
      alert('客户姓名不能为空!');
      return;
    }

    var sex = $('#sex').val();

    if (-1 == sex) {
      alert('请选择性别');
      return;
    }
    
    var weixin = $('#weixin').val();
    
    var price = $('#price').val();
    
    if (-1 == price) {
      alert('请选择价格敏感度');
      return;
    }
    
    var telephone = $('#telephone').val();

    if (null != telephone && undefined != telephone && '' != telephone) {
      if (isNaN(telephone)) {
        alert('电话号码只能是数字');
        return;
      }
    }

    
    var age = $('#age').val();

    if (isNaN(age)) {
      alert('年龄只能是数字');
      return;
    }
      
    var email = $('#email').val();

    if (null != email && undefined != email && '' != email) {
      if (!emailReg.test(email)) {
        alert('请输入正确的邮箱格式');
        return;
      }
    }
    
    var career = $('#career').val();
    var come = $('#come').val();
    var remark = $('#remark').val();

    $('#myForm').submit();

  }
</script>
</body>



