<style type="text/css">
.loading-gif {
	left: 55%;
}
.panel h2 b {
	font-size: 18px;
}
.panel h2 {
	margin: 12px 4px 11px;
}
.printed-lba-a4 h1, h2 {
	color: #fff;
	font-size: 26px;
	font-weight: bold;
}
</style>
<div id="aa_loader" class="white-screen" style=" display:none;" >
  <div class="loading-gif text-center" style="top:50%; z-index:150;"> <img onerror='imgError(this);' src="<?=Assets?>images/loader.gif" class="image" style="width:139px; height:29px; " alt="AA Labels loader"> </div>
</div>
<div class="">
  <div class="container m-t-b-8 ">
    <div class="col-md-8">
      <ol class="breadcrumb  m0">
        <? $uri = explode("/",uri_string()); ?>
        <li><a href="<?=base_url()?>"><i class="fa fa-home"></i></a></li>
        <?=$breadcrum?>
      </ol>
    </div>
  </div>
</div>
<div class="printed-lba-a4">
  <div class="container ">
    <div class="col-md-8 col-sm-12">
      <h1>
        <?=ucwords(str_replace("-"," ",$uri[2]))?>
        by Application</h1>
      <p class="text-justify">The labels found in the categories below have application in both home and workplace locations, many of which are editable to include your details, or amended wording and all can be ordered online for fast delivery. Available in small and large formats (A4) as standard and larger formats (SRA3) if required, from as little as one self-adhesive label (A4), or sheet of labels. Representing a value for money and an easily changed or replaced, source of advisory and instructional signage. Helping to comply with HSE guidelines and legislation, keeping the workplace and public areas of buildings and homes, safer places. </p>
    </div>
    <div class="col-md-4 col-sm-12 "> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/lba-banner.png" alt="Labels by Application"> </div>
  </div>
</div>
<div class="ourTeam">
  <div class="container">
    <div class="clear30"></div>
    <div class="clear"></div>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <? include_once('sidebar.php');?>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <? if(isset($page) and $page=='design'){  ?>
        <div class="panel lbApp-hTitle">
          <div class="col-xs-7">
            <h2 class="col-xs-12"><b class="pull-left blueColor">
              <?=ucfirst(str_replace("-"," ",$uri[2]))?>
              </b></h2>
          </div>
          <? if(count($subcatresults) > 1) {?>
          <div class="col-xs-5 labels-form m-t-15">
            <label class="select">
              <select name="filter_category" id="filter_category">
                <? foreach($subcatresults as $row){?>
                <option value="<?=$row->CategoryID?>">
                <?=$row->CategoryName?>
                </option>
                <? }?>
                <option selected="selected" value="all">Show all
                <?=ucfirst(str_replace("-"," ",$uri[2]))?>
                </option>
              </select>
              <i></i> </label>
          </div>
          <? } ?>
          <div class="clear"></div>
        </div>
        <div id="design_listing" class="row  dm-row">
          <? include('design_list.php');?>
        </div>
        <?  } else{?>
        <div class="panel lbApp-mainDetail">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div> <img onerror='imgError(this);'  alt="AA Labels" src="<?=Assets?>images/application/lba_main.png" class="img-responsive m-b-10"> </div>
            <p>Ever since their invention and commercial introduction in the 1930’s in America, self-adhesive labels have become increasingly popular to the point where they are now almost ubiquitous and can be found on everything from retail price stickers to the sides of planes. </p>
            <p>The multitudes of technological innovations that have followed their introduction mean that they now can be used for almost any purpose in any environment, to provide advice and important information, cost effectively. </p>
            <p>Wherever you are in the world now, you will see some sort of label, whether they are representing a brand on the side of an apple, or on the bottom of your shoe, on a fire extinguisher, electrical plug or a construction site, you cannot escape them. </p>
            <p>The use of self-adhesive labels are a major factor in marketing brands and promoting company and organisational image. But also provide a cost-effective means of delivering essential information in the workplace and home, as shown here. </p>
          </div>
          <div class="clear"></div>
        </div>
        <? } ?>
      </div>
    </div>
    <div class="clear20"></div>
  </div>
</div>
<div class="printed-lba-call">
  <div class="container" >
    <div class="col-md-8 col-sm-12 col-lg-9">
      <h2>INFORMATION & ADVICE <br />
        <small>We’re here to help you chose the label that’s right for you.</small></h2>
      <p class="text-justify">If you need assistance or help deciding which label format you require for your application, or the material and adhesive, or size most suited. Please contact our customer care team, via the live-chat facility on the page, our website contact form, telephone, or email and they will be happy to discuss your requirements.</p>
    </div>
    <div class="col-md-4 col-sm-12 col-lg-3"> <img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/header/call_opr_1.png" alt="Customer Support"> </div>
  </div>
</div>
<script>


$(document).on("change", "#filter_category", function(e) {
		var designid = $(this).val();
		$('#aa_loader').show();
		if(designid.length > 0){
			$.ajax({
					url: base+'ajax/filter_design_category',
					type:"POST",
					async:"false",
					data:{designid:designid,category:'<?=$maincategory?>',url:'<?=$url?>'},
					dataType: "html",
					success: function(data){
							$('#aa_loader').hide();
							if(!data==''){	
								data = $.parseJSON(data); 
								$('#design_listing').html(data.html);
							}
					  }  
			});
		}
});
</script> 
