<?
$last = $this->uri->total_segments();
$cat_header = $this->uri->segment($last);



$slider1  = Assets."images/lba/slider/".$cat_header."-1.jpg";
$slider2  = Assets."images/lba/slider/".$cat_header."-2.jpg";
$slider3  = Assets."images/lba/slider/".$cat_header."-3.jpg";
$is_slider = 1;
$coming_soon = 0;
if(!file_exists($slider1))
{
    $slider1 = Assets."images/lba/slider/coming-soon-slider.jpg";
    $is_slider = 0;
    $coming_soon = 1;
    
}
?>
<div class="container">
<div class="col-md-12 col-sm-12 hidden-lg">

    <div > <img onerror='imgError(this);' class="img-responsive m-t-10 " src="<?=Assets?>images/fldt-mobild-and-tab-header.png" alt="Label Designer"/> </div>

</div>
</div>

<div class="free-label-design-text hidden-lg" >
                        <span>
                            In this section of the website you will find a range of professionally produced, high
                            quality, pre-designed product labels freely available for customisation using the label
                            editing function. The easy to use process provides the option to create professional looking
                            product labels and order online for fast delivery.
                        </span>
    <br>
    <br>
    <span>
                            There is a selection of label formats (shape and size) to suit most requirements and once
                            you label design is complete and the order placed your labels will be printed and
                            despatched.
                        </span>
</div>
<div class="col-md-12 hidden-lg">

    <div   class="designer-tool-tab-text text-center padding-15  ">
        To access this tool you need to browse this page from your laptop or desktop computer.
    </div>

</div>
<? if($cat_header=="free-label-design-templates"){ ?>


<div class="col-md-7 col-sm-6 hidden-md hidden-sm">




    <div class="row ">
    <div class="col-md-3 hidden-sm">
    <img src="<?=Assets?>images/lba/menu/main-jar.png" class="img-responsive" style="margin-top:20px;"/>
    </div>
    <div class="col-md-9">
    	<h1>FREE LABELS DESIGN TEMPLATES</h1>
        <p class="text-justify"> In this section of the website you will find a range of professionally produced, high quality, pre-designed  product labels freely available for customisation using the label editing function.</p>
        <div class="collapse" id="collapseExample">
        <p class="text-justify">The easy to use process provides the option to create professional looking product labels and order online for fast delivery. There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
        <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
        </div>
        <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> <br />
        <p><img onerror='imgError(this);' class="img-responsive" src="<?=Assets?>images/lba/menu/thumbnails.png"/></p>
    </div>
  </div>
</div>
<? 
$slider1  = Assets."images/lba/slider/free-label-design-templates-1.jpg";
$slider2  = Assets."images/lba/slider/free-label-design-templates-2.jpg";
$slider3  = Assets."images/lba/slider/free-label-design-templates-3.jpg";
$is_slider = 1;
      }else if($cat_header=="bathing-and-body-products-bottles"){ ?>
<div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Bathing & Body Care Products – Bottles & Dispensers</h1>
  <p class="text-justify">We understand that whatever the use it is important that the quality of the labels appearance matches the quality of the product contained in the bottle and that the medium can strongly influence the consumer message. A well designed, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more!</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  labels for bathing products in bottles. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<? 
$slider1  = Assets."images/lba/slider/bathing-and-body-products-1.jpg";
$slider2  = Assets."images/lba/slider/bathing-and-body-products-2.jpg";
$slider3  = Assets."images/lba/slider/bathing-and-body-products-3.jpg";
$is_slider = 1;
   
     }else if($cat_header=="bottle-cosmetics"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for bottle cosmetics</h1>
  <p class="text-justify">Whatever the use it is important that the quality of the label's appearance matches the quality of the product contained in the bottle and that the overall appearance strongly influences consumer behaviour. An attractive, quality label with a professional appearance conveys a great deal about brand values and creates confidence in the product.</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed labels for cosmetic products in bottles. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your bottles and contents noticed.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once your label design is complete and the order placed your labels will be printed and despatched for fast delivery.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<? 
$slider1  = Assets."images/lba/slider/Cosmetic-bottles-slider-1.jpg";
$slider2  = Assets."images/lba/slider/Cosmetic-bottles-slider-2.jpg";
$slider3  = Assets."images/lba/slider/Cosmetic-bottles-slider-3.jpg";
$is_slider = 1;
     
     }else if($cat_header=="edible-oils"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Edible Oils - Bottles</h1>
  <p class="text-justify">We understand that whatever the use it is important that the quality of the labels appearance matches the quality of the oil and/or vinegar product contained in the bottle and that the medium can strongly influence the consumer message. A well designed, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more! </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  labels for edible oils and vinegars in bottles. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery. </p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/edible-oils-1.jpg";
$slider2  = Assets."images/lba/slider/edible-oils-2.jpg";
$slider3  = Assets."images/lba/slider/edible-oils-3.jpg";
$is_slider = 0;
    
	    }else if($cat_header=="sauces"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Sauce Bottles</h1>
  <p class="text-justify">We understand that whatever the use it is important that the quality of the labels appearance matches the quality of the product content contained in the bottle and that the medium can strongly influence the consumer message. A well designed layout, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more! </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  labels for sauce bottles. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/sauces-1.jpg";
$slider2  = Assets."images/lba/slider/sauces-2.jpg";
$slider3  = Assets."images/lba/slider/sauces-3.jpg";
$is_slider = 1;
    
	    }else if($cat_header=="vinegars"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Vinegar Bottles</h1>
  <p class="text-justify">We understand that whatever the use it is important that the quality of the labels appearance matches the quality of the oil and/or vinegar product contained in the bottle and that the medium can strongly influence the consumer message. A well designed layout, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more! </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  labels for vinegars and/or edible oils and vinegars in bottles. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/vinegars-1.jpg";
/*$slider2  = Assets."images/lba/slider/vinegars-2.jpg";
$slider3  = Assets."images/lba/slider/vinegars-3.jpg";*/
$is_slider = 0;
      
   }else if($cat_header=="bottle-labels"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Bottles & Dispensers</h1>
  <p class="text-justify">We understand that whatever the use it is important that the quality of the labels appearance matches the quality of the product contained in the bottle and that the medium can strongly influence the consumer message. A well designed layout, quality label with a professional appearance conveys a great deal to the potential consumer, while conversely a poor design layout and label quality communicates even more!</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  labels for many products in bottles. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/bottle-labels-1.jpg";
$slider2  = Assets."images/lba/slider/bottle-labels-2.jpg";
$slider3  = Assets."images/lba/slider/bottle-labels-3.jpg";
$is_slider = 1;
	  }else  if($cat_header=="bathing-and-body-products-jars"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Bathing & Body Care Products - Jars</h1>
  <p class="text-justify">We understand that whatever the use it is important that the quality of the labels appearance matches the quality of the product contained in the jar and that the medium can strongly influence the consumer message. A well designed, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more! </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  jar labels for bathing products. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery. </p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/bathing-products-and-packaging-1.jpg";
$slider2  = Assets."images/lba/slider/bathing-products-and-packaging-2.jpg";
$slider3  = Assets."images/lba/slider/bathing-products-and-packaging-3.jpg";
$is_slider = 1;
	 }else if($cat_header=="jar-sweets"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Sweet Jars</h1>
  <p class="text-justify">Sweets in clear glass jars look wonderful and effectively sell themselves, almost without a label. However, whether the jar is small for individual consumption, or large for display and dispensing the labels provides essential information about the content and create a perception about the retailer, distributor or manufacturer with the potential purchaser.</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed labels for sweet jar labels. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your jars and contents noticed.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/Sweets-jar-slider-1.jpg";
$slider2  = Assets."images/lba/slider/Sweets-jar-slider-2.jpg";
$slider3  = Assets."images/lba/slider/Sweets-jar-slider-3.jpg";
$is_slider = 1;	
	
 }else if($cat_header=="jar-cosmetics"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Cosmetics Jars</h1>
  <p class="text-justify">Whatever the use it is important that the quality of the label's appearance matches the quality of the product contained in the jar and that the overall appearance strongly influences consumer behaviour. An attractive, quality label with a professional appearance conveys a great deal about brand values and creates confidence in the product.</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed labels for cosmetic products in contained in jars. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your jars and contents noticed.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once your label design is complete and the order placed your labels will be printed and despatched for fast delivery.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/Cosmetic-jar-slider-1.jpg";
$slider2  = Assets."images/lba/slider/Cosmetic-jar-slider-2.jpg";
$slider3  = Assets."images/lba/slider/Cosmetic-jar-slider-3.jpg";
$is_slider = 1;	
 
 }else if($cat_header=="candles"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Candles & Diffusers - Jars</h1>
  <p class="text-justify">Nothing creates such a pleasing atmosphere or sets the mood and tone of an occasion, quite like the right room candle, or diffuser. However before the product is used it first need to be purchased by the consumer and in this respect we understand the importance of label appearance in determining choice. It is fundamentally important that the quality of the labels appearance matches the quality of the product contained in the jar because the medium can strongly influence the consumer message. A well designed, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more! </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  jar labels for candle and diffuser products. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery. </p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/candles-1.jpg";
$slider2  = Assets."images/lba/slider/candles-2.jpg";
$slider3  = Assets."images/lba/slider/candles-3.jpg";
$is_slider = 1;
      }else if($cat_header=="condiments-chutney"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Chutneys & Preserves - Jars</h1>
  <p class="text-justify">We are a nation of chutney and savoury preserve lovers! Whether we're spooning it onto our ploughman's lunch, adding a little to enhance the flavour of a sandwich or enjoying it next to our favourite Indian dishes, we seemingly can't get enough of relishes. But a special foodstuff deserves a special label, and we understand just how important it is to get the labels for your chutney and preserve jars just right. The quality of the labels appearance must  match the quality of the product contained in the jar because the medium can strongly influence the consumer message. A well designed, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more! </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  jar labels for chutney and savoury preserve products. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/chutney-preserves-1.jpg";
$slider2  = Assets."images/lba/slider/chutney-preserves-2.jpg";
$slider3  = Assets."images/lba/slider/chutney-preserves-3.jpg";
$is_slider = 0;
	 }else if($cat_header=="pickles-sauces"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Condiments & Sauces - Jars</h1>
  <p class="text-justify">Enhancing the flavours of food with quality condiments and sauces is for most of us, one of life's pleasures. But a special foodstuff deserves a special label, and we understand just how important it is to get the labels for your condiment and sauce jars just right. The quality of the labels appearance must  match the quality of the product contained in the jar because the medium can strongly influence the consumer message. A well designed, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more!</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  jar labels for chutney and savoury preserve products. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/condiments-sauces-1.jpg";
$slider2  = Assets."images/lba/slider/condiments-sauces-2.jpg";
$slider3  = Assets."images/lba/slider/condiments-sauces-3.jpg";
$is_slider = 1;
	 }else if($cat_header=="honey"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Honey Jar Labels</h1>
  <p class="text-justify">Honey is truly one of natures sweet treats and produced in so many forms and flavour variants and for most of us, represents one of life's real pleasures. But a special foodstuff deserves a special label, and we understand just how important it is to get the labels for your honey jars just right. The quality of the labels appearance must  match the quality of the product contained in the jar because the medium can strongly influence the consumer message. A well designed, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more!</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  jar labels for honey. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/honey-1.jpg";
$slider2  = Assets."images/lba/slider/honey-2.jpg";
$slider3  = Assets."images/lba/slider/honey-3.jpg";
$is_slider = 0;

 	 }else if($cat_header=="jam"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Jam Jar Labels</h1>
  <p class="text-justify">The making of jams and preserves has a tradition in most countries and cultures around the world and whether you produce only occasionally for friends and family or are involved in continuous batch production a special foodstuff deserves a great label, and we understand just how important it is to get the labels for your jam jars just right. The quality of the labels appearance must  match the quality of the product contained in the jar because the medium can strongly influence the consumer message. A well designed, quality label with a professional appearance conveys a great deal, while conversely a poor design layout and label quality communicates even more! </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed jam jar labels in many flavours. All freely available for customisation using the label editing function, which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery. </p>
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/jam-1.jpg";
$slider2  = Assets."images/lba/slider/jam-2.jpg";
$slider3  = Assets."images/lba/slider/jam-3.jpg";
$is_slider = 1;
	 }else if($cat_header=="jar-labels"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Jar Labels</h1>
  <p class="text-justify">Whatever you use jars for you will most probably find a label design that you can use, and customise for your purpose. In this section of the website you will find a range of professionally produced, high quality, pre-designed jar labels for many applications. All freely available for customisation using the label editing function, which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery. </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
    <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/jar-labels-1.jpg";
$slider2  = Assets."images/lba/slider/jar-labels-2.jpg";
$slider3  = Assets."images/lba/slider/jar-labels-3.jpg";
$is_slider = 1;

  	 }else if($cat_header=="bakery-chocolates-confectionary"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Bakery,Chocolates & Confectionary</h1>
  <p class="text-justify">The flavour, freshness and quality of these products is what sells and keeps customers returning for more, but it is still all dependent on that important first purchase. Good product labelling assists in creating and reinforcing the brand image that you want to present.</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">Whether you are packaging in bags, sealed sachets or gift boxes you can differentiate from your competitors with well-designed labels and messages. These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your products noticed.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/Bakery-Confectionary-slider-1.jpg";
$slider2  = Assets."images/lba/slider/Bakery-Confectionary-slider-2.jpg";
$slider3  = Assets."images/lba/slider/Bakery-Confectionary-slider-3.jpg";
$is_slider = 1;
  	 

  	 }else if($cat_header=="coffee-tea"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Dry Packaging – Coffee, Tea & Dissolvable Drinks & Flavourings</h1>
  <p class="text-justify">Consumers of artisan coffee and tea are undoubtedly searching for flavour, but buy with their eye. Therefore attractive, well designed labels assist with the engagement process and inevitably get the potential purchaser looking more closely at the product. Provide your packaging with real shelf-appeal, however small the batch, by selecting and personalising our label design templates to produce professional looking labels. </p>
  
  <!-- <div class="collapse" id="collapseExample"> 
 <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  labels for coffee and tea. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.
</p>
      <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
 <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
    </div> --> 
  <!-- <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> 
       <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a>  --> 
</div>
<?
$slider1  = Assets."images/lba/slider/coffee_tea_new.jpg";
$slider2  = Assets."images/lba/slider/coffee-tea-2.jpg";
$slider3  = Assets."images/lba/slider/coffee-tea-3.jpg";
$is_slider = 0;
  	 }else if($cat_header=="dried-food"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Dry Packaging – Fruits, Meats, Pasta, Rice & Vegetables</h1>
  <p class="text-justify">Whether you are packaging fruit, herbs, meat, nuts and other dried foodstuffs you need the product packaging to look attractive, appetising and convey information and your brand values. Often the most cost-effective way of achieving this on smaller packaging volumes is via the labelling element of the package. The label templates in this section have been designed for generic applications with a high level of customisation and personalisation possible to suit various products. </p>
  
  <!-- <div class="collapse" id="collapseExample"> 
 <p class="text-justify">In this section of the website you will find a range of professionally produced, high quality, pre-designed  labels for dried goods. All freely available for customisation using the label editing function. Which is easy to use and provides the opportunity to create professional looking product labels and order online for fast delivery.</p>
      <p class="text-justify">There is a selection of label formats (shape and size) to suit most requirements and once you label design is complete and the order placed your labels will be printed and despatched.</p>
 <p class="text-justify">If you are unable to find a suitable design or shape and size of label you can also use our Label Designer software which can be selected from the main navigation bar above. Alternatively contact us to discuss your requirements.</p>
    </div> --> 
  <!-- <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> 
       <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> --> 
</div>
<?
$slider1  = Assets."images/lba/slider/dried_fruit_new.jpg";
$slider2  = Assets."images/lba/slider/dried-food-2.jpg";
$slider3  = Assets."images/lba/slider/dried-food-3.jpg";
$is_slider = 0;
	 }else if($cat_header=="dried-herbs"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Dry Packaging – Herbs & Food Seasonings</h1>
  <p class="text-justify">The aromatic, flavour enhancement and medicinal qualities of herbs are well known but as with all packaged products the benefits are not always immediately apparent. Therefore, the packaging has to initially look attractive and convey information that will accord with the purchaser's values and prompt purchase. These attractive professionally produced label templates can be adapted for a variety of applications and produce well designed labels that enhance your products appeal.</p>
</div>
<?
$slider1  = Assets."images/lba/slider/dried_herbs_new.jpg";
$slider2  = Assets."images/lba/slider/dried-herbs-2.jpg";
$slider3  = Assets."images/lba/slider/dried-herbs-3.jpg";
$is_slider = 0;
 	 }else if($cat_header=="secondary-promotional-labels"){?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Secondary Promotional Labels</h1>
  <p class="text-justify">While your product, brand or prime label remains the most important in marketing terms and conveying far more information than just the image/s and text on the label, the value of secondary labelling should not be ignored.</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">The use of promotional labels is well established within the retail sector, with stores regularly applying labels informing customers of "Special Offers" e.g. 30% Discount, Sale, 2 for 1 etc. The use of separate secondary labels on packaging to promote a feature or offer can have a very persuasive outcome in terms of buying behaviour and often acts as a CTA (Call to Action) through endorsement e.g. 100% Organic, reinforcement e.g. Premium Organic Product, or added value e.g. 2 for 1.</p>
    <p class="text-justify">By placing a small secondary label close to the main label conveying a succinct message about the product or offer, will often result in this being seen and read before the product label itself, increasing the purchase potential.</p>
    <p class="text-justify">These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your bottles, jars and packaging noticed.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/Secondary-1.jpg";
$slider2  = Assets."images/lba/slider/Secondary-2.jpg";
$slider3  = Assets."images/lba/slider/Secondary-3.jpg";
$is_slider = 1;  

 }else if($cat_header=="environment-organic"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Environment & Organic</h1>
  <p class="text-justify">The growing awareness of the need to protect our environment and consume less artificially produced food is driving change in consumer behaviour and preferences. This is influencing the choice of materials in packaging toward biodegradability and sustainability, while in food production the use of chemicals and preservatives are being used less with more natural options sought by consumers. </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">The use of secondary labels on your bottles, jars and packaging helps to create and promote endorsement of your environmental sustainability values and improves the targeting of your consumer audience through even more prominent labelling.</p>
    <p class="text-justify">By placing one of these small secondary labels close to the main label conveying a succinct message about the products credentials, will often result in this being seen and read before the product label itself, increasing the purchase potential.</p>
    <p class="text-justify">These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your bottles, jars and packaging noticed.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/environment-organic-1.jpg";
$slider2  = Assets."images/lba/slider/environment-organic-2.jpg";
$slider3  = Assets."images/lba/slider/environment-organic-3.jpg";
$is_slider = 1; 
	 
 }else if($cat_header=="flavour-taste"){?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Flavour & Taste</h1>
  <p class="text-justify">The popularity of homogenised, mass produced food is declining and for consumers with a discerning palette, the search for true flavours and taste is something of a passion and increasing in popularity. However, unless you are offering in-store samples or at an event or market stall this option to "try before you buy" is not always available, so another way of informing interested consumers is required. </p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">By placing one of these small promotional labels on your bottles, jars or packaging you can reinforce the associations with flavour and taste, increasing the rate of first-time purchase through consumer appeal.</p>
    <p class="text-justify">These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your bottles, jars and packaging noticed.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/flavour-1.jpg";
$slider2  = Assets."images/lba/slider/flavour-2.jpg";
$slider3  = Assets."images/lba/slider/flavour-3.jpg";
$is_slider = 1; 
 
 }else if($cat_header=="price-product"){?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Price & Product</h1>
  <p class="text-justify">With the advent and growing popularity of discount retailers in the high streets, shopping centres and supermarkets, consumers are becoming increasingly accustomed to shopping for a bargain. Our range of highly visible, attention grabbing promotional labels are ideal to highlight products on promotion and special offer.</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">By placing secondary promotional labels in prominently visible positions on product packaging you reinforce the message and strengthen intent to purchase (CTA).</p>
    <p class="text-justify">These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your bottles, jars, packaging and products noticed.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/price-produt-slider-1.jpg";
$slider2  = Assets."images/lba/slider/price-produt-slider-2.jpg";
$slider3  = Assets."images/lba/slider/price-produt-slider-3.jpg";
$is_slider = 1; 
 
 }else if($cat_header=="quality"){?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm">
  <h1>Labels for Quality</h1>
  <p class="text-justify">As consumers we all value quality in products and services and are often willing to pay extra for it. An assurance from an evaluating organisation such as the Food Standards Agency, or even self-endorsement can be a powerful incentive to purchase.</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">By placing one of these small promotional labels on your bottles, jars or packaging you can reinforce the associations with quality and assurance guarantees, potentially improving the rate of first-time purchase through increased confidence.</p>
    <p class="text-justify">These free label design templates are ideal for this purpose allowing you to quickly customise and create colourful, powerful messages to help get your bottles, jars and packaging noticed.</p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> </div>
<?
$slider1  = Assets."images/lba/slider/quality-slide-1.jpg";
$slider2  = Assets."images/lba/slider/quality-slide-2.jpg";
$slider3  = Assets."images/lba/slider/quality-slide-3.jpg";
$is_slider = 1; 
 
 }else if($cat_header=="bags-sachets-boxes"){ ?>
    <div class="col-md-7 col-sm-6 hidden-md hidden-sm" >
  <h1>Labels for Dry Packaging – Boxes, Containers, Jars, Pouches & Sachets</h1>
  <p class="text-justify">Our label designs for dry packaged goods includes a variety of potential product applications for bags, boxes and sachets. Select the design, label shape and size that most closely matches your requirement and then start amending and rearranging the component elements of the label design to create your own customised version. Once completed save your design and order online for a fast turnaround. </p>
</div>
<?
$slider1  = Assets."images/lba/slider/all_categories_new.jpg";
$slider2  = Assets."images/lba/slider/bags-boxes-satchets-2.jpg";
$slider3  = Assets."images/lba/slider/bags-boxes-satchets-3.jpg";
$is_slider = 0;
}else{
if($coming_soon == 1){ ?>
<div class="col-md-7 col-sm-12">
  <h1>Labels for <span style="text-transform: capitalize;">
    <?=str_replace('-', ' ', $cat_header) ?>
    </span></h1>
  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  <div class="collapse" id="collapseExample">
    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
  <!--<a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> 
       <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> --> 
</div>
<?php
}
}
    if($is_slider == 1){
?>
<div class="col-md-5 col-sm-6  hidden-sm hidden-md   lba-carousel">
  <div id="carousel-example-generic2" class="carousel slide carousel-fullscreen carousel-fade" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic2" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic2" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic2" data-slide-to="2"></li>
    </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="margin-top:-20px;">
      <div class="item active" style="background-image: url(<?=$slider1?>);"></div>
      <div class="item" style="background-image: url(<?=$slider2?>);"></div>
      <div class="item" style="background-image: url(<?=$slider3?>);"></div>
    </div>
  </div>
</div>
<?php
}
else
{
?>
<div class="col-md-5 col-sm-6 lba-carousel m-t-s-45 hidden-md hidden-sm"> <img src="<?=$slider1?>" class="img-responsive"/> </div>
<?php
}
?>
<div class="col-md-7 col-sm-12 hide">
 <h2>Free Label Design Templates</h2>
  <p class="text-justify"> Our high quality designs and easy to use editing tool allow you to personalise your products and create great looking labels in just minutes. Order online for fast delivery.
    
    This easy to use process is intended to provide you with the option to create professionally produced personalised designs, available to create and order online for fast delivery. </p>
  <div class="collapse" id="collapseExample">
    <p>There is a selection of label formats (shape and size) to suit most needs and once your label design is completed and the order placed the labels will be printed and despatched, it's as simple as that.<br />
      <br />
      If you still cannot find what you are looking for from the label designs available here, you also have the option of using our Label Designer free software to create your design, alternatively you can contact us and we will be happy provide a quote to design your label/s. </p>
  </div>
  <a class="collapsed label-text-collapse" data-toggle="collapse" href="#collapseExample"> <span class="if-collapsed">Read More <i class="fa fa-angle-down"></i></span> <span class="if-not-collapsed">Read Less <i class="fa fa-angle-up"></i></span> </a> 
  
  <!-- 9/5/2018 Updates End --> 
</div>
