<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" type="text/css" href="/oj2/Public/Bbs/Index/amazeui.css" />
<section class="am-panel am-panel-default">
        <div class="am-panel-hd">主题</div>

        <ul class="am-list blog-list">
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/inside');?>?id=<?php echo ($data["id"]); ?>"><?php echo ($data["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
</section>








<form class="am-form" action="<?php echo U('Index/add');?>" method="post">

<div class="admin-content">


  <div class="am-tabs am-margin" data-am-tabs="">
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li class="am-active"><a href="#tab2">发帖</a></li>
    </ul>

    <div class="am-tabs-bd" style="touch-action: pan-y; -webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
      <div class="am-tab-panel am-fade" id="tab1">
        

        

        <input type="hidden" name="mainid" value="<?php echo ($mainId); ?>"/>


        <div class="am-g am-margin-top">
          <div class="am-u-sm-8 am-u-md-10">
            <form action="" class="am-form am-form-inline">
              <div class="am-form-group am-form-icon">
                <i class="am-icon-calendar"></i>
                <input type="text" class="am-form-field am-input-sm" placeholder="时间">
              </div>
            </form>
          </div>
        </div>

      </div>

      <div class="am-tab-panel am-fade am-active am-in" id="tab2">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right" >
              文章标题
            </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type="text" class="am-input-sm" name="title">
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right" >
              文章作者
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
              <input type="text" class="am-input-sm" name="author">
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text" >
              内容描述
            </div>
            <div class="am-u-sm-12 am-u-md-10">
              <textarea rows="10" name="content" placeholder="请使用富文本编辑插件"></textarea>
            </div>
          </div>

      </div>

           
      </div>

    </div>
    <div class="am-margin">
    <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
    <button type="reset" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
  </div>
  </div>

  
</form>

</div>