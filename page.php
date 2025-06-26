<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-container">
	<div class="mdui-row">
		<div class="mdui-col-md-10 mdui-col-offset-md-1">
			<div class="mdui-card mdui-m-y-3">
				<div class="mdui-card-media">
					<div class="thumbnail" style="background:url(<?php ShowThumbnail($this); ?>);"></div>
					<div class="mdui-card-media-covered">
						<div class="mdui-card-primary">
							<div class="mdui-card-primary-title"><?php $this->title() ?></div>
						</div>
					</div>
				</div>
				<div class="mdui-card-actions">
					<?php if ($this->user->hasLogin()){ ?>
						<a href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid; ?>" target="_blank" class="mdui-btn mdui-btn-icon mdui-color-theme-accent mdui-ripple mdui-float-right mdui-hidden-sm-down" mdui-tooltip="{content:'编辑该页面',position:'right'}"><i class="mdui-icon material-icons">&#xe3c9;</i></a>
					<?php } ?>
				</div>
				<div class="mdui-divider"></div>
				<div class="mdui-card-content post-container" style="padding-left:4%;padding-right:4%;">
					<div class="mdui-typo">
		  				<?php echo RewriteContent($this->content); ?>
					</div>
				</div>
				<div class="mdui-divider"></div>
				<?php $this->need('comments.php'); ?>
			</div>
		</div>
	</div>
</div>
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>