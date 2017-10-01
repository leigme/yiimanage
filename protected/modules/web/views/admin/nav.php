    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $this->urls['homePage']; ?>"><?php echo CHtml::encode($this->pageTitle); ?></a>
        </div>
        <form action="<?php echo $this->urls['findUser']; ?>" method="POST" id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:findUser()">查 找</a></li>
            <li><a href="<?php echo $this->urls['signOut']; ?>"><?php echo $_SESSION['username']; ?> | 注 销</a></li>
          </ul>
          <div  class="navbar-form navbar-right">
            <input type="text" name="username" class="form-control" placeholder="Search...">
          </div>
        </form>
      </div>
      <script type="text/javascript">
         function findUser(){
             $("#navbar").submit() ;
         }
      </script>
    </nav>