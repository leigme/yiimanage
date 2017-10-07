
<body>
  <?php $this->beginContent('../admin/nav');?>
  <?php $this->endContent();?> 

  <div class="container">

    <form class="form-inline" id="upFollowForm" action="<?php echo $this->urls['upFollow']; ?>" method="post">
      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
      <input type="hidden" name="followId" value="<?php echo $followInfo['id']; ?>">
      <div class="row topheader">

        <div class="col-md-2"></div>

        <div class="col-md-8">

         <div class="row top">
           <div class="col-md-6">
             <label for="exampleInputName2">日期 </label>
             <div class="input-group date form_date col-md-10" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
              <input class="form-control" type="text" id="followDate" name="followDate" value="<?php echo $followInfo['followtime']; ?>" readonly>
              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
          </div>
       </div>

	   <div class="row top">
         <div class="col-md-12">
           <label for="exampleInputName2">情况 </label>
           <textarea id="content" name="content" class="form-control" rows="5" cols="80"><?php echo $followInfo['context']; ?></textarea>
         </div>
       </div><!--row 6 end-->

       <div class="row top">
         <div class="col-md-12">
           <label for="exampleInputName2">备注 </label>
           <textarea id="remark" name="remark" class="form-control" rows="5" cols="80"><?php echo $followInfo['remark']; ?></textarea>
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

    var content = $('#content').val();

    if (null == content || undefined == content || '' == content) {
      alert('跟进情况不能为空');
      return;
    }

    $('#upFollowForm').submit();
  }
</script>

</body>