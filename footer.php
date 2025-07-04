<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $plugin=Typecho_Plugin::export(); ?>
<?php if ($this->options->AplayerCode) echo APlayerSalt($this->options->AplayerCode); ?>
<a class="mdui-fab mdui-fab-fixed mdui-fab-mini mdui-color-theme-accent mdui-ripple mdui-fab-hide" id="gototop" style="z-index:1"><i class="mdui-icon material-icons">&#xe316;</i></a>               
<footer>
	<div class="mdui-color-white">
		<div class="mdui-container">
			<div class="mdui-row mdui-p-y-4">
				<div class="mdui-col-xs-4 mdui-col-md-3 mdui-col-offset-md-1">
					<div class="mdui-float-left">
						<?php if ($this->options->githublink){ ?><a href="<?php echo $this->options->githublink; ?>" target="_blank" class="mdui-p-x-1"><i class="mdui-icon mdui-text-color-theme-accent iconfont footerlink" mdui-tooltip="{content:'github',position:'top'}">&#xe60e;</i></a><?php } ?>
						<?php if ($this->options->bilibililink){ ?><a href="<?php echo $this->options->bilibililink; ?>" target="_blank" class="mdui-p-x-1"><i class="mdui-icon mdui-text-color-theme-accent iconfont footerlink" mdui-tooltip="{content:'bilibili',position:'top'}">&#xe60f;</i></a><?php } ?>
						<?php if ($this->options->zhihulink){ ?><a href="<?php echo $this->options->zhihulink; ?>" target="_blank" class="mdui-p-x-1"><i class="mdui-icon mdui-text-color-theme-accent iconfont footerlink" mdui-tooltip="{content:'知乎',position:'top'}">&#xe60d;</i></a><?php } ?>
						<?php if ($this->options->travelling=='true'){ ?><div class="mdui-p-l-1 mdui-p-t-1"><a href="https://travellings.now.sh/" target="blank" class="a-no-bottom"><img src="<?php echo asseturl('img/travelling.gif', true); ?>" alt="开往-友链接力" height=24 mdui-tooltip="{content:'开往-友链接力',position:'right'}" /></a></div><?php } ?>
					</div>
				</div>
				<div class="mdui-typo mdui-col-xs-4 mdui-col-md-4">
					<div class="mdui-text-center">
						<div>Copyright &copy; <?php echo '2022-' . date("Y"); ?> <a href="<?php $this->options->siteUrl(); ?>"><!-- <php $this->options->title(); ?>-->Noonisy</a></div>
						<?php if ($this->options->filing){ ?><div><a href="http://beian.miit.gov.cn" target="_blank" rel="nofollow"><?php echo $this->options->filing; ?></a> · Powered by <a href="http://typecho.org" target="_blank">Typecho</a></div><?php } ?>
						<?php if ($this->options->gafiling){ ?><div><img src="<?php echo asseturl('img/gaba.png', true); ?>" /><?php echo $this->options->gafiling; ?></div><?php } ?>
					</div>
				</div>
				<div class="mdui-typo mdui-col-xs-4 mdui-col-md-3">
					<div class="mdui-float-right mdui-text-center">
						<!-- <div>Powered by <a href="http://typecho.org" target="_blank">Typecho</a></div> -->
						<?php if ($this->options->upyuncdn=='true'){ ?><div><span style="line-height:28px;">CDN by </span><a href="https://www.upyun.com" target="_blank"><img src="<?php echo asseturl('img/upyun.png', true); ?>" height=28 /></a></div>
						<?php } else if (!empty($this->options->cdnby)) echo '<div>CDN by '.$this->options->cdnby.'</div>'; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<script>
	globallistener();changetitle();
    function loadScript(url, callback) {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = url;
        script.onload = callback;
        document.head.appendChild(script);
    }
	$(function(){
		showannouncement('<?php echo $this->options->announcement; ?>','<?php echo $this->options->announcementpos; ?>');
		highlightinit('<?php echo $this->options->highlightmode; ?>');codelinenumber('#pjax-container');
		showposttoc(<?php echo $this->options->posttoc=='true'; ?>);mdui.mutation();
	});
	$(document).pjax('a:not(a[target="_blank"],a[no-pjax])',{container:'#pjax-container',fragment:'#pjax-container',timeout:8000});
	$(document).on('submit','form[role="search"]',function(event){$.pjax.submit(event,{container:'#pjax-container',fragment:'#pjax-container',timeout:8000});});
	$(document).on('pjax:send',function(){if (announcement!=null) announcement.close();sidebar.close();showoverlay();});
	$(document).on('pjax:complete',function(){
		mathjaxreload('pjax-container');codelinenumber('#pjax-container');
		highlightreload('<?php echo $this->options->highlightmode; ?>','#pjax-container');closeoverlay();
        initCodeCopy();
	});
    // $(document).on('ready pjax:end', function(e){
    //     $(e.target).ready(function(){
            
    //     });
    // });
	$(document).on('pjax:end',function(){
		changetitle();showposttoc(<?php echo $this->options->posttoc=='true'; ?>);
		mdui.mutation();<?php if (array_key_exists('Meting',$plugin['activated'])){ ?>loadMeting();<?php } ?>		
        // <php if (isset($plugins['activated']['WordCloud'])){ ?>
        //     <php WordCloud_Plugin::renderWordCloud(); ?>
        // <php } ?>
        <?php echo $this->options->pjaxreload; ?>
	});
	$(document).on('pjax:error',function(e){closeoverlay();mdui.alert('PJAX加载超时，请检查网络','加载失败');e.preventDefault();});
</script>
<?php if ($this->options->customjs) echo $this->options->customjs; ?>
<?php $this->footer(); ?>
</body>
</html>