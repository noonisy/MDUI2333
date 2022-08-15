<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-container">
	<div class="mdui-row">
		<div class="mdui-col-md-10 mdui-col-offset-md-1">
			<div class="mdui-typo mdui-card mdui-m-y-3">
				<div class="mdui-card-primary">
					<div class="mdui-card-primary-title">404 Not Found!</div>
					<div class="mdui-card-primary-subtitle">并没有此页面呢……</div>
				</div>
				<div class="mdui-card-actions">
					<a href="/" class="mdui-btn mdui-ripple mdui-color-theme-accent mdui-m-a-1">返回首页</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>