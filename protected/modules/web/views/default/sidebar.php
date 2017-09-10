<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="            							<?php 
            								if ('index' === $this->active) {
            									echo 'active';
            								}
            							;?>"><a href="<?php  echo $this->urls['index']; ?>">管理会员 <span class="sr-only">(current)</span>

            							</a></li>
            <li class="            							<?php 
            								if ('add' === $this->active) {
            									echo 'active';
            								}
            							;?>"><a href="<?php  echo $this->urls['add']; ?>">添加会员 <span class="sr-only">(current)</span>
            						            							<?php 
            								if ('add' === $this->active) {
            									
            								}
            							;?>
            </a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header"><?php echo  $this->page ;?></h1>