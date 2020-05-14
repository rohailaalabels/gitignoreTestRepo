<style>
    .lba-space-custom{
        height:440px !important;
    }
    .image_description {
    margin-top: 87px !important;
    }
</style>
<div class="row" style="padding: 10px 0;">
  <div class="col-md-9 lba-left-col">
    <div class="bg-n-border-radius lba-space lba-space-custom bg-white " id="add_cart_design">
      <?php 
		$cat_data = $this->home_model->fetch_category_details($category);
		$label_image = Assets.'images/categoryimages/thumbnail_label/'.$cat_data['CategoryImage'];
		if (@getimagesize($label_image) == false) {
			$label_image = Assets.'images/categoryimages/labelShapes/180x180.png';	
		}
		if($cat_data['Shape_upd'] == "Circular"){
			$LabelSize =  str_replace("Label Size:","",$cat_data['specification3']); 
		}else{
			$LabelSize =  $cat_data['LabelWidth']." x ".$cat_data['LabelHeight'];
		}
		$label_description = $this->home_model->get_db_column('lba_design','description','designID',$designid);
	?>
      <div class="image_thumgnail"> <img src="<?=$label_image?>" class="img-responsive"> </div>
      <div class="image_description">
      	<div class="row">
        	<div class="col-md-7 p-0">
            	<img src="<?=Assets?>images/lba/menu/fldt-preview-image.png" class="img-responsive"/>
            </div>
            <div class="col-md-5">
            	<p><strong>FREE LABEL DESIGN TEMPLATES</strong></p>
                <p class="bullet_point_fldt"><i class="fa fa-check-circle-o"></i> 100% Money Back Guarantee <a href="#" class="img-ribbon" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-html="true" data-content="If you are not 100% satisfied with your labels, return them to us within 30 days and we will refund your purchase. <a target='_blank' href='<?=base_url(); ?>terms-and-conditions/'><span class='glyphicon glyphicon-new-window'></span> Read more.</a>" data-original-title="" title="" aria-describedby="popover990393">Read more</a></p>
                <p class="bullet_point_fldt"><i class="fa fa-check-circle-o"></i> Free to Use</p>
                <p class="bullet_point_fldt"><i class="fa fa-check-circle-o"></i> Customisable Designs</p>
                <p class="bullet_point_fldt"><i class="fa fa-check-circle-o"></i> Roll & Sheet Format Labels</p>
                <p class="bullet_point_fldt"><i class="fa fa-check-circle-o"></i> Design & Order Online</p>
                <p class="bullet_point_fldt"><i class="fa fa-check-circle-o"></i> Fast Order Fulfilment</p>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 lba-right-col productdetails">
    <div class="row bg-n-border-radius lba-space lba-space-custom">
      <input type="hidden" id="diecode" value="<?=$category?>" />
      <input type="hidden" id="designid" value="<?=$designid?>" />
      <input type="hidden" id="brand" value="<?=$brand?>" />
      <input type="hidden" class="lba_label_shape" value="<?=$cat_data['Shape_upd']?>" />
      
      <div class="image_thumbnail_cover"> <img src="<?=$label_image?>" class="img-responsive"> </div>
      <p><span class="lba_label_text"><?=$label_description?></span><br>
     	Label Size: <span class="lba_label_size"><?=$LabelSize?></span></p>
      <p>Add to basket to select the above design and the label shape/size shown for our studio design team to produce the template. When available you will receive an emailed link to the uploaded design in FLDT for you to amend and customise.</p>
      <hr>
      <div class="lba_price">
      	<span class="lba-editor-price"><?=symbol.number_format($this->home_model->currecy_converter(LBAPRICE),2,'.','');?></span>
        <span><?=vatoption?> <strong>VAT</strong></span>
      </div>
      <div class="add_to_cart_div">
      	<button type="button" class="btn orangeBg col-lg-12 col-md-12 add_to_cart_custom" style="margin-bottom: 31px; top: 30px;">Add To Basket <i class="fa fa-shopping-cart"> </i></button>
      </div>
    </div>
  </div>
</div>
<script>

$(".img-ribbon").hover(function(e) {
		$('.img-ribbon').popover('show');
},function(e){});
$(function () {
  $('[data-toggle="popover"]').popover()
})

$(document).on('click', 'body', function(e) {	
		$('.img-ribbon').popover('hide');
});



$(document).ready(function(e) {
	$("[data-toggle=tooltip-integrated]").tooltip();
	var width = $(window).width();
	if(width >= 1200)
	{
		var myTimeout = counter = 0;
		$('nav.navbar').mouseenter(function(evt){
			$('.popover').popover('destroy');
			myTimeout = setTimeout(function(){
				counter = 1;
				$("#nav-overlay").show();
				$('nav.navbar').addClass("hover");
				//var targetLi = evt.target.parentNode;
				var q = document.querySelectorAll(":hover"); 
				var targetLi = q[q.length-1].parentNode;
				
				$('.dropdown-menu', targetLi).not('.in .dropdown-menu').slideDown(300);
				targetLi.classList.add("open");
				
				$('li.dropdown').mouseenter(function(evt){
					if(counter == 1)
					{
						$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown(300);
						$(this).addClass("open");
						$(this).siblings("li").removeClass("open");
					}
				}).mouseleave(function() {
					$('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp(300);
					$(this).removeClass("open");
					$('.dropdown-menu', targetLi).not('.in .dropdown-menu').slideUp(300);
				});
			}, 500);
		}).mouseleave(function() {
			counter = 0;
			$("#nav-overlay").hide();
			$('nav.navbar').removeClass("hover");
			$('.dropdown-menu', this).not('.in .dropdown-menu').slideUp(300);
			$("nav.navbar li.dropdown").removeClass("open");
			clearTimeout(myTimeout);
		});
		
		$(".dropdown-menu").hover(function(e){
			$(this).parents("li").addClass("hover");
		},
		function(e){
			$(this).parents("li").removeClass("hover");		
		});
		
		$(document).on("click",".nav > li > a.dropdown-toggle",function(e){
			var url = $(this).attr("data-url");
			if(url != '')
			{
				window.location = url;
			}	
		});
	}
	else
	{
		$(document).on("click", ".nav_container .open a",function(){
			//return false;
			e.preventDefault();
		});
	}
});
</script> 