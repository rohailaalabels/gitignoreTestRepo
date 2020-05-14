<style>
html body div.ourTeam div.container div.row div.col-lg-8.col-md-8.col-sm-12.col-xs-12 div.panel.lbApp-mainDetail div.col-lg-12.col-md-12.col-sm-12.col-xs-12 p {
	font-size: 13px;
	line-height: 24px !important;
}
.nl-sidebar {
	background-color: #ffffff;
	border: 1px solid #dddddd;
	border-radius: 4px;
	/*box-shadow: 0 4px 0 #848484;*/
	display: block;
	margin-bottom: 20px;
	padding: 10px;
	transition: border 0.2s ease-in-out 0s;
}
.nl-sidebar .title {
	background-color: #17b1e3;
	border-radius: 4px;
	color: #fff;
	font-size: 16px;
	font-weight: bold;
	margin-bottom: 10px;
	padding: 10px;
	text-transform: uppercase;
}
.nl-sidebar .navbar-nav, .nl-sidebar .navbar-nav li {
	width: 100%;
}
.nl-sidebar .navbar-nav > li > a {
	border-radius: 4px;
	border-right: 0 none !important;
	color: #0573a4 !important;
	display: block;
	font-size: 14px;
	padding: 6px 10px;
	text-transform: none;
}
.nl-sidebar .navbar-nav > li > a .fa {
	color: #17b1e3;
	position: relative;
	top: 4px;
}
.nl-sidebar .navbar-nav > li > a:hover, .nl-sidebar .navbar-nav > li > a:focus, .nl-sidebar .navbar-nav > li > a:visited {
	background-color: #f9f9f9;
	color: #0573a4 !important;
}
.nl-sidebar .navbar-nav > li ul.dropdown-menu {
	display: none;
}
.nl-sidebar .navbar-nav > li:hover ul.dropdown-menu {
	display: inline-block;
}
.nl-sidebar .navbar-nav > li .dropdown-menu {
	background-color: #f9f9f9 !important;
	border: 0 none !important;
	border-radius: 4px !important;
	box-shadow: 0 4px 0 #848484;
	display: inline-block;
	left: 99%;
	padding: 10px !important;
	position: absolute;
	top: -100%;
	width: auto;
}
.nl-sidebar .navbar-nav > li ul.dropdown-menu li {
	color: #666;
}
.nl-sidebar .navbar-nav > li ul.dropdown-menu li a {
	border-radius: 4px !important;
	color: #666;
	font-size: 14px;
	text-transform: none;
}
.nl-sidebar .navbar-nav > li ul.dropdown-menu li:hover a, .nl-sidebar .navbar-nav > li ul.dropdown-menu li:focus a, .nl-sidebar .navbar-nav > li ul.dropdown-menu li:visited a {
	background-color: #17b1e3;
	color: #fff !important;
}
.printed-lba-a4 h1 {
	color: #fff;
	font-size: 26px;
	font-weight: bold;
}
.ourTeam h2 {
	font-size: 20px;
	color: #16b1e4;
	font-weight: bold;
	margin: 18px 0 !important;
}
.panel h1 {
	font-size: 20px;
	margin: 10px 0 !important;
	font-weight: bold;
	color: #16b1e4;
}
.headingPost {
	font-size: 18px !important;
	font-weight: bold !important;
}
ul li {
	/*font-size: 13px;*/
	line-height: 24px;
}
.hr {
	clear: both;
	border: 0;
	height: 25px;
	width: 100%;
}
.blog-frame {
	margin-top: 15px;
}
</style>

<div class="">
  <div class="container m-t-b-8 ">
    <div class="row">
      <div class="col-xs-12  col-sm-6 col-md-8 ">
        <ol class="breadcrumb  m0">
          <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
          <li class="active">Blog</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="printed-lba-a4 ">
  <div class="container ">
    <div class="col-md-8 col-sm-12  ">
      <h1>Blog</h1>
      <p class="text-justify">Our reputation is built on our comprehensive product range and the excellent service
        offered by our customer care team. The AA Labels name is not just seen as a guarantee of quality.</p>
    </div>
    <div class="col-md-4 col-sm-12 "><img onerror='imgError(this);' class="img-responsive" src="<?= Assets ?>images/header/blog_header.png" alt="Blog"></div>
  </div>
</div>
<div class="ourTeam">
  <div class="container">
    <div class="clear30"></div>
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-4">
        <div class="nl-sidebar">
          <div class="title"><a style="color:inherit;" href="<?= base_url() ?>blog/">Blog
            Categories</a></div>
          <ul class="nav navbar-nav">
            <? foreach($blog_categories as $category):?>
            <li class="blue"><a href="<?=base_url()."blog/".$category->category_slug?>/"> <i aria-hidden="true" class="fa fa-arrow-circle-right pull-left"></i>
              <?=$category->category_title?>
              </a></li>
            <? endforeach;?>
          </ul>
          <div class="clear"></div>
        </div>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
        <? if (isset($file) and $file != '') { ?>
        <div class="panel lbApp-mainDetail">
          <div class="row">
          	<div class="single_post <?=$file?>">
            	<article class="preview blog-main-preview col-xs-12">
                  <div class="col-xs-12">
                  <h1 class="post-page-heading col-md-9 no-padding-left"><?=$single_post->post_title?></h1>
                  <div class="col-md-3 pull-right title-back no-padding">
                    <a href="<?=base_url()?>blog/" class="btn btn-sm btn-block tt-button orange large"><i class="fa fa-chevron-circle-left"></i> Back to Blog </a>
                  </div>
                    <div class="clear"></div>
                    <span class="metadata postinfo"> Posted by <?=$single_post->author?> on <?=$single_post->publish_date?> </span>
                  <div class="img-frame blog-frame">
                    <img src="<?=BLOG_ASSETS?><?=$single_post->featured_image?>" class="img-responsive finderNote" alt="<?=$single_post->post_title?>">
                  </div>
                  </div>
                    <div class="line-height-2">
            	<? $this->load->view('blog/' . $file . '.php'); ?>
                    </div>
                </article>
                <div class="col-md-12">
                  <div class="post-details">
                    <p class="post-tags"></p>
                    <div class="clear">
                      <div class="col-md-6">
                        <p class="post-categories"><strong>Posted in:</strong> <a href="<?=base_url()."blog/".$single_post->category_slug?>"><?=$single_post->category_title?></a></p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <? } else { ?>
        
        <? 
		
		if(!empty($posts)):
		foreach($posts as $post):
			$post_link = base_url()."blog/".$post->category_slug."/".$post->slug."/";
		?>
        <div class="panel lbApp-mainDetail">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <article class="preview blog-main-preview col-xs-12">
              <h2> <a href="<?=$post_link?>" title="<?=$post->post_title?>"><?=$post->post_title?></a></h2>
              <span class="metadata postinfo"> Posted by <?=$post->author?> on <?=$post->publish_date?> </span>
              <div class="img-frame blog-frame"><a href="<?=$post_link?>" title="<?=$post->post_title?>"><img src="<?=BLOG_ASSETS.$post->featured_image?>" class="img-responsive finderNote" alt="<?=$post->post_title?>"></a></div>
                <div class="line-height-2">
              <p><?=$post->excerpt?> […]</p>
                </div>
              <div style="width: 40%"> <a role="button" class="btn-block btn orange" href="<?=$post_link?>">Continue Reading <i class="fa fa-arrow-circle-right"></i> </a> </div>
              <div class="clear"></div>
              <div class="post-details">
                <p class="post-tags"></p>
                <div class="row">
                  <div class="col-md-6">
                        <p class="post-categories"><strong>Posted in:</strong> <a href="<?=base_url()."blog/".$post->category_slug?>/"><?=$post->category_title?></a></p>
                  </div>
                </div>
              </div>
              <!-- end .post-details --> 
            </article>
          </div>
          <div class="clear"></div>
        </div>
        <? endforeach;?>
            <div class="col-md-12 lba-pagination">
                <nav>
               		<?=$links?>
                </nav>
            </div>
		<? else:?>
        <div class="panel lbApp-mainDetail">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>No Posts Found in "<?=$category_title?>"</h2>
          </div>
          <div class="clear"></div>
        </div>
        <? endif;?>
        <? } ?>
      </div>
    </div>
  </div>
</div>
<div class="printed-lba-call ">
  <div class="container ">
    <div class="col-lg-9 col-md-8 col-sm-8">
      <h2>INFORMATION & ADVICE <br/>
        <small>We’re here to help.</small> </h2>
      <p class="text-justify">If you would like to discuss any of the information in the newsletters, please
        contact our customer care team, via the live-chat facility on the page, our website contact form,
        telephone, or email and they will be happy to discuss your requirements.</p>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 "><img onerror='imgError(this);' class="img-responsive"
                                              src="<?= Assets ?>images/header/call_opr_1.png" alt="Customer Support"> </div>
  </div>
</div>

<!-- Small modal -->

<div class="modal fade bs-example-modal-sm aa-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog " role="document">
    <div class="">
      <div class="modal-content no-padding">
        <div class="panel no-margin">
          <div class="panel-heading">
            <h3 class="pull-left no-margin"><b>Newsletter Sign-Up</b></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                                    class="fa fa-times-circle"></i></button>
            <div class="clear"></div>
          </div>
          <div class="panel-body">
            <div id="ajax_layout_spec" class="">
              <div>
                <div class="col-md-12">
                  <p class="text-justify">I would like to receive newsletters and information on
                    offers and discount vouchers to the email address provided. In agreeing to
                    receive communication from time-to-time, AA Labels assures you that your contact
                    details will remain confidential and will not be shared with any
                    third-party. </p>
                  <form id="subscribe" name="unsubscribe-form" method="post">
                    <div class="labels-form ">
                      <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                        <input placeholder="Enter Your Email Address" name="email" id="email"
                                                       type="email">
                      </label>
                    </div>
                    <div class="text-center">
                      <button class="btn orangeBg" type="submit"> Subscribe <i
                                                        class="fa fa-arrow-circle-right" aria-hidden="true"></i> </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    var form = $("#subscribe");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            email: {
                required: true,
                email: true,
            }
        },
        submitHandler: function (form) {
            $.post(base + 'ajax/subscribe_newsletter', $("#subscribe").serialize(), function (data) {
                if (data.response == 'sucess') {
                    $('#email').val('');
                    $('.aa-modal').modal('hide');
                    swal("Congratulation", "You have successfully subscribed", "success");
                } else {
                    $('#email').val('');
                    $('.aa-modal').modal('hide');
                    swal("", "You already subscribed for our mailing list", "warning");
                }
                return false;
            }, 'json');
            return false;

        }
    });
</script>