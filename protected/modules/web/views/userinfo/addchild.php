
<body>
  <?php $this->beginContent('../admin/nav');?>
  <?php $this->endContent();?> 

  <div class="container">

    <form class="form-inline" action="<?php echo $this->urls['addChild']; ?>">
      <input type="hidden" name="parentId" value="<?php echo $parentId; ?>">
      <div class="row topheader">

        <div class="col-md-2"></div>

        <div class="col-md-8">
          <label for="exampleInputName2">添加孩子</label>
          <div class="row top">
            <div class="col-md-6">
             <div class="form-group">
               <label for="exampleInputName2">姓名 </label>
               <input type="text" class="form-control" id="realname" name="realname" placeholder="请输入用户姓名">
             </div>
           </div>
           <div class="col-md-6">
           </div>
         </div><!--row 1 end-->

         <div class="row top">
           <div class="col-md-6">
             <label for="exampleInputName2">生日 </label>
             <div class="input-group date form_date col-md-10" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" id="birthday" name="birthday" readonly>
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
             <label for="exampleInputName2">性别 </label>
             <select class="form-control" id="sex" name="sex">
               <option value="-1">选择 </option>
               <option value="2">王子</option>
               <option value="4">公主</option>
             </select>
           </div>
         </div>
       </div>

       <div class="row top">
         <div class="col-md-12">
           <label for="exampleInputName2">备注 </label>
           <textarea id="remark" name="remark" class="form-control" rows="5" cols="80"></textarea>
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
  $('.form_date').datetimepicker({
    language: 'zh-CN',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
  });

  function myClick() {

    var realname = $('#realname').val();

    if (null == realname || undefined == realname || '' == realname) {
      alert('孩子姓名不能为空!');
      return;
    }

    var birthday = $('#birthday').val();
    if (null == birthday || undefined == birthday || '' == birthday) {
      alert('孩子生日不能为空!');
      return;

    } else {

      var starttime = new Date(birthday);
      var today = new Date();

      if (starttime.getTime() >= today.getTime()) {
        alert('出生日期大于当前时间，请检查');
        return;
        
      }
    }

    var sex = $('#sex').val();

    if (-1 == sex) {
      alert('请选择性别');
      return;
    }

    $('#myForm').submit();
  }
</script>

</body>



