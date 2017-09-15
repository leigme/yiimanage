    <div class="container">

      <form class="form-signin" action="<?php echo $this->urls['login']; ?>">
        <h2 class="form-signin-heading"><?php echo $title; ?></h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name='username' type="text" id="inputEmail" class="form-control" placeholder="账号/邮箱" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name='password' type="password" id="inputPassword" class="form-control" placeholder="密码" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 保存密码
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登 录</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

