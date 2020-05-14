<script type="text/javascript" src="<?= Assets ?>js/hilitor.js"></script>
<script type="text/javascript">

    var myHilitor = new Hilitor("searchscan");
    myHilitor.apply("highlight words");

</script>

<div class="">
    <div class="container m-t-b-8 ">
        <div class="row">
            <div class="col-xs-12  col-sm-6 col-md-8 ">
                <ol class="breadcrumb  m0">
                    <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active">FAQ</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="faqBg text-center">
    <div class="container">
        <h1>FREQUENTLY Asked Questions</h1>
        <p>customercare@aalabels.com</p>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-8 col-md-8 col-lg-9">
                <div class="thumbnail p-l-r-10">
                    <div class="f-16 m-t-15 "> If you cannot find an answer to your question then please contact our
                        Customer Service Team on
                        <?= PHONE ?>
                        or email
                        <?= EMAIL ?>
                        <br>
                        Alternatively use the <a href="<?= SAURL ?>contact-us/">Contact Us</a> page on this website
                    </div>
                    <div class="bg-info borderRadius m-t-20">
                        <form onsubmit="myHilitor.apply(hilite.value);$('.tab-pane').addClass('active'); return false;"
                              method="GET">
                            <div id="custom-search-input ">
                                <div class="input-group col-md-12 ">
                                    <input type="text" placeholder="Type your question ..." name="hilite"
                                           class="form-control input-lg">
                                    <span class="input-group-btn">
                  <button type="submit" class="btn btn-info btn-lg"> <i
                              class="glyphicon glyphicon-search"></i> </button>
                  </span></div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <div id="searchscan" role="tabpanel" class=" m-t-15 ">

                            <!-- Nav tabs -->
                            <ul class="nav orderStep bg_tab_step " role="tablist">
                                <li role="presentation" class="active"><a href="#one" aria-controls="one" role="tab"
                                                                          data-toggle="tab"> <i
                                                class="fa fa-tag f-20 p-t-b"></i>
                                        <p>labels</p>
                                    </a></li>
                                <li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab">
                                        <i class="fa fa-book f-20  p-t-b"></i>
                                        <p>Ordering</p>
                                    </a></li>
                                <li role="presentation"><a href="#three" aria-controls="three" role="tab"
                                                           data-toggle="tab"><i class="fa fa-gbp f-20 p-t-b"></i>
                                        <p>Pricing</p>
                                    </a></li>
                                <li role="presentation"><a href="#four" aria-controls="four" role="tab"
                                                           data-toggle="tab"><i class="fa fa-files-o f-20 p-t-b"></i>
                                        <p>Sheets</p>
                                    </a></li>
                                <li role="presentation"><a href="#five" aria-controls="five" role="tab"
                                                           data-toggle="tab"><i class="fa fa-circle f-20 p-t-b"></i>
                                        <p>Rolls</p>
                                    </a></li>
                            </ul>
                            <div class="">
                                <!-- Tab panes -->
                                <div class="tab-content col-md-12 border1">
                                    <div role="tabpanel" class="tab-pane active" id="one">
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <div class="col-xs-12  col-sm-8 col-md-9 m-t-10">
                                                    <div>
                                                        <h2 class="BlueHeading">Top Rated Questions about Labels? </h2>
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-3 m-t-15">
                                                    <div class="pull-right"><a
                                                                onclick="javascript:$('.tab-pane').addClass('active');$(this).toggleClass('hide')"
                                                                class="btn orange pull-right" role="button"><i
                                                                    class="fa fa-eye faa-horizontal animated"></i>&nbsp;
                                                            View All</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-t-15 ">
                                            <div>
                                                <div aria-multiselectable="true" role="tablist" id="accordion"
                                                     class="panel-group">
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="headingOne" role="tab" class="panel-title_gray">
                                                            <div class=""><a aria-controls="collapseOne"
                                                                             aria-expanded="true" href="#collapseOne"
                                                                             data-parent="#accordion"
                                                                             data-toggle="collapse" role="button"
                                                                             class=""> <i class="fa fa-info-circle"></i>
                                                                    How can I place an order on your website? </a></div>
                                                        </div>
                                                        <div aria-labelledby="headingOne" role="tabpanel"
                                                             class="panel-collapse collapse in" id="collapseOne"
                                                             aria-expanded="true" style="">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-globe "></i></div>
                                                                <p> Browse our product range by selecting a category
                                                                    from menu on the left hand side of the page or
                                                                    alternatively use the search function, in the top
                                                                    right hand corner of the page. When you have found
                                                                    the product you would like to purchase, choose an
                                                                    option from the Select material colour and adhesive
                                                                    type drop down menu. The option prices will be
                                                                    displayed next to the option name. </p>
                                                                <p> Enter the desired amount in the Quantity box and
                                                                    click Add To Cart. Please note that a quantity of 1
                                                                    in the shopping cart, translates to 1 box of 100
                                                                    sheets. For example, if you require 400 sheets,
                                                                    enter a quantity of 4.
                                                                    The selected product will then be added to the
                                                                    shopping cart. If you need to browse the shop for
                                                                    other products to add to the order, the shopping
                                                                    cart will store the added item(s) until you need to
                                                                    make a purchase. </p>
                                                                <p> Products can be added and deleted at any stage
                                                                    whilst you are in the shopping cart. If you would
                                                                    like to adjust the quantity of an item, change the
                                                                    number in the Quantity box and then click Update.
                                                                    The shopping cart will then recalculate the order
                                                                    amount.
                                                                    When you are ready to make a purchase, click
                                                                    Checkout. The invoice location is set to a default
                                                                    of United Kingdom. You can select whether you would
                                                                    like to have your order delivered to a different
                                                                    location from your billing address by ticking the
                                                                    box in the Select Shipping Destination section.
                                                                    Select Next to continue. </p>
                                                                <p> After you have filled in your invoice address and
                                                                    delivery address, if different, select Next to
                                                                    continue to the payment pages.
                                                                    Your browser will then re-direct you to the secure
                                                                    online payment system provided by Protx. You can
                                                                    securely enter your credit/debit card details and
                                                                    pay for your order online. If payment is successful,
                                                                    you will be re-directed back to the Order Receipt
                                                                    page, which acts as confirmation of your order.
                                                                    You will receive an order confirmation email and
                                                                    payment confirmation email from Protx. If you do not
                                                                    receive either of these emails, please contact us,
                                                                    quoting your name and order details.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="headingTwo" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse24" aria-expanded="false"
                                                                    href="#collapse24" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Do you offer volume discounts? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading24" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse24"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-tag "></i></div>
                                                                <p>Yes all of our label and print prices include volume
                                                                    related price breaks, which means that the more you
                                                                    order the lower the unitary price and the greater
                                                                    the value for money of your purchase.</p>
                                                                <p>The price breaks will display each time that you
                                                                    enter a sheet or roll quantity, enabling you to see
                                                                    the next volume discount.</p>
                                                                <p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="headingTwo" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapseTwo" aria-expanded="false"
                                                                    href="#collapseTwo" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can I place an order over the telephone? </a></div>
                                                        </div>
                                                        <div aria-labelledby="headingTwo" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapseTwo"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-phone "></i></div>
                                                                <p>If you would prefer to place an order via the
                                                                    telephone you can do so by calling
                                                                    <?= PHONE ?>
                                                                    between the hours of 08:30 to 17:30 Monday to Friday
                                                                    and a member of our Customer Care team will assist
                                                                    you.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="headingThree52" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapseThree52"
                                                                    aria-expanded="false" href="#collapseThree52"
                                                                    data-parent="#accordion" data-toggle="collapse"
                                                                    role="button" class="collapsed"> <i
                                                                            class="fa fa-info-circle"></i> Can I get
                                                                    advice about my label requirements? </a></div>
                                                        </div>
                                                        <div aria-labelledby="headingThree52" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapseThree52"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-users "></i></div>
                                                                <p>If you would like assistance with the choice of
                                                                    face-stock materials, adhesive and release liner
                                                                    most appropriate for your intended label
                                                                    application, then please contact our Customer Care
                                                                    team on
                                                                    <?= PHONE ?>
                                                                    who will be pleased to help you.

                                                                    This service is available between the hours of 08:30
                                                                    to 17:30 Monday to Friday. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="headingThree" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapseThree" aria-expanded="false"
                                                                    href="#collapseThree" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Which debit/credit cards do you accept? </a></div>
                                                        </div>
                                                        <div aria-labelledby="headingThree" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapseThree"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-credit-card "></i>
                                                                </div>
                                                                <p>We accept VISA, MasterCard, Delta, Switch/Maestro,
                                                                    Solo, VISA Debit and VISA Electron.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading4" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse4" aria-expanded="false"
                                                                    href="#collapse4" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Are my credit/debit cards details secure when
                                                                    placing an order through the website? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading4" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse4"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-cc-paypal "></i></div>
                                                                <p>All payment card information is processed using a
                                                                    secure payment system provided by PayPal. PayPal is
                                                                    now integrated as a payment method with Protx, one
                                                                    of the largest payment service providers in the UK;
                                                                    providing secure online payment solutions to
                                                                    thousands of online and mail-order businesses.</p>
                                                                <p>Our complete checkout system is hosted on a secure
                                                                    server and when making payment a padlock symbol will
                                                                    appear at the bottom of your browser window to
                                                                    confirm that you have entered a secure area.</p>
                                                                <p>PayPal uses enhanced security protocols called 3DS
                                                                    for safe online purchases. 3D-Secure is the secure
                                                                    protocol designed to ensure enhanced security and
                                                                    strong authentication for you when you use your
                                                                    debit or credit cards for online purchases. It is
                                                                    called, depending on the card type, &ldquo;MasterCard
                                                                    SecureCode&rdquo;, &ldquo;Verified by Visa&rdquo;
                                                                    when you transact, you may be asked to provide a
                                                                    special security code to the card issuing bank in
                                                                    order for the bank to authorise the online
                                                                    transaction when prompted in the PayPal payments
                                                                    page. Card issuing banks have different methods of
                                                                    generating and delivering these codes and so if you
                                                                    don&rsquo;t know your 3D-Secure pass-code or
                                                                    password, then you will need to contact your
                                                                    bank. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading5" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse5" aria-expanded="false"
                                                                    href="#collapse5" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    What are your delivery charges? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading5" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse5"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-truck "></i></div>
                                                                <p>All of our delivery charges are displayed <a
                                                                            href="<?= base_url() ?>delivery/">here</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading6" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse6" aria-expanded="false"
                                                                    href="#collapse6" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    What is the most popular material for self-adhesive
                                                                    labels? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading6" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse6"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-tags "></i></div>
                                                                <p>This varies and is largely  dependant upon the label
                                                                    application and finished format. For example address
                                                                    labels, packaging labels and shipping labels in
                                                                    sheet and roll formats are normally produced on a
                                                                    matt-white paper with a permanent adhesive, although
                                                                    occasional and seasonal address labels are popular
                                                                    on luxury paper face-stocks and often with
                                                                    pre-printed designs included.</p>
                                                                <p>Paper labels for product labelling and/or promotional
                                                                    purposes that display some of the background
                                                                    face-stock are usually on a semi-gloss, or high
                                                                    gloss paper or film, such as polypropylene in both
                                                                    sheet and roll formats.</p>
                                                                <p>High visibility labels in industrial and warehouse
                                                                    applications e.g. Bin location and pallet labels,
                                                                    are often in fluorescent films to resist abrasion
                                                                    and wear.</p>
                                                                <p>Labels that require to resist extreme temperatures or
                                                                    weather conditions, require specialist adhesives and
                                                                    finishes for protection.</p>
                                                                <p>The list of considerations is extensive and this is
                                                                    why our Customer Care team will always enquire first
                                                                    about the label application to provide the best
                                                                    advice on materials and adhesives.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading7" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse7" aria-expanded="false"
                                                                    href="#collapse7" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    I have specific label size requirements and I cannot
                                                                    find suitable labels within your standard range. Can
                                                                    you supply labels to my exact specifications? </a>
                                                            </div>
                                                        </div>
                                                        <div aria-labelledby="heading7" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse7"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-envelope "></i></div>
                                                                <p>Yes we can produce labels to your exact dimensions
                                                                    and shape requirements. Please complete our <a
                                                                            href="<?= SAURL ?>customlabels.php/">custom
                                                                        labels</a> enquiry form and a member of our
                                                                    Customer Care team will contact you.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading8" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse8" aria-expanded="false"
                                                                    href="#collapse8" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Do You Supply Labels on a Roll? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading8" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse8"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-circle "></i></div>
                                                                <p>We produce both plain and printed labels in roll
                                                                    formats on a variety of paper face-stocks suitable
                                                                    for direct thermal and thermal  transfer printing,
                                                                    in a range of colours and both clear and white
                                                                    films.</p>
                                                                <p>Printed roll labels can be produced in monochrome and
                                                                    full colour up to 8 colour process including
                                                                    specialist foils e.g. gold and silver and a number
                                                                    of gloss and matt finishes.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading9" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse9" aria-expanded="false"
                                                                    href="#collapse9" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can You Provide Free Samples? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading9" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse9"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-send-o "></i></div>
                                                                <p>Yes at AA Labels we can provide you with up to 3
                                                                    different A4 sample sheets  of label materials. We
                                                                    cannot promise that the samples sent will be the
                                                                    template you require, but you will still be able to
                                                                    access the suitability and undertake a test print.
                                                                    Please complete the samples request from the &ldquo;Contact
                                                                    us/Sample request&rdquo; page found under the
                                                                    &ldquo;SERVICES&rdquo; heading at the bottom of the
                                                                    page, or call our Customer Care team on
                                                                    <?= PHONE ?>
                                                                    to order your free samples.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading10" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse10" aria-expanded="false"
                                                                    href="#collapse10" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can You Provide A Free Sample Of A Particular Label
                                                                    Material? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading10" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse10"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-image "></i></div>
                                                                <p>Yes at AA Labels we can provide you with up to 3 A4
                                                                    sample sheets of a specific label material. We
                                                                    cannot promise that the sample sent will be the
                                                                    template you require, but you will still be able to
                                                                    access the suitability and undertake a test print.
                                                                    Please complete the samples request from the
                                                                    “Contact us/Sample request” page found under the
                                                                    “SERVICES” heading at the bottom of the page, or
                                                                    call our Customer Care team on
                                                                    <?= PHONE ?>
                                                                    to order your free samples. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="two">
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <div class="col-xs-12  col-sm-8 col-md-9 m-t-10">
                                                    <div>
                                                        <h2 class="BlueHeading">Top Rated Questions about Ordering?</h2>
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-3 m-t-10">
                                                    <div class="pull-right"><a
                                                                onclick="javascript:$('.tab-pane').addClass('active');$(this).toggleClass('hide');return false"
                                                                href="#" class="btn orange pull-right" role="button"><i
                                                                    class="fa fa-eye faa-horizontal animated"></i>&nbsp;
                                                            View All</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-t-15 ">
                                            <div>
                                                <div aria-multiselectable="true" role="tablist" id="accordion"
                                                     class="panel-group">
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading11" role="tab" class="panel-title_gray">
                                                            <div class=""><a aria-controls="collapse11"
                                                                             aria-expanded="true" href="#collapse11"
                                                                             data-parent="#accordion"
                                                                             data-toggle="collapse" role="button"
                                                                             class=""> <i class="fa fa-info-circle"></i>
                                                                    How can I place an order on your website? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading11" role="tabpanel"
                                                             class="panel-collapse collapse in" id="collapse11"
                                                             aria-expanded="true" style="">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-globe "></i></div>
                                                                <p> Browse our product range by selecting a category
                                                                    from menu on the left hand side of the page or
                                                                    alternatively use the search function, in the top
                                                                    right hand corner of the page.
                                                                    When you have found the product you would like to
                                                                    purchase, choose an option from the Select material
                                                                    colour and adhesive type drop down menu. The option
                                                                    prices will be displayed next to the option
                                                                    name.</p>
                                                                <p> Enter the desired amount in the Quantity box and
                                                                    click Add To Cart. Please note that a quantity of 1
                                                                    in the shopping cart, translates to 1 box of 100
                                                                    sheets. For example, if you require 400 sheets,
                                                                    enter a quantity of 4.
                                                                    The selected product will then be added to the
                                                                    shopping cart. If you need to browse the shop for
                                                                    other products to add to the order, the shopping
                                                                    cart will store the added item(s) until you need to
                                                                    make a purchase.</p>
                                                                <p> Products can be added and deleted at any stage
                                                                    whilst you are in the shopping cart. If you would
                                                                    like to adjust the quantity of an item, change the
                                                                    number in the Quantity box and then click Update.
                                                                    The shopping cart will then recalculate the order
                                                                    amount.</p>
                                                                <p> When you are ready to make a purchase, click
                                                                    Checkout. The invoice location is set to a default
                                                                    of United Kingdom. You can select whether you would
                                                                    like to have your order delivered to a different
                                                                    location from your billing address by ticking the
                                                                    box in the Select Shipping Destination section.
                                                                    Select Next to continue.</p>
                                                                <p> After you have filled in your invoice address and
                                                                    delivery address, if different, select Next to
                                                                    continue to the payment pages.
                                                                    Your browser will then re-direct you to the secure
                                                                    online payment system provided by Protx. You can
                                                                    securely enter your credit/debit card details and
                                                                    pay for your order online. If payment is successful,
                                                                    you will be re-directed back to the Order Receipt
                                                                    page, which acts as confirmation of your order.</p>
                                                                <p> You will receive an order confirmation email and
                                                                    payment confirmation email from Protx. If you do not
                                                                    receive either of these emails, please contact us,
                                                                    quoting your name and order details. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading24or" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse24or" aria-expanded="false"
                                                                    href="#collapse24or" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Do you offer volume discounts? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading24or" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse24or"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-tag "></i></div>
                                                                <p>Yes all of our label and print prices include volume
                                                                    related price breaks, which means that the more you
                                                                    order the lower the unitary price and the greater
                                                                    the value for money of your purchase.</p>
                                                                <p>The price breaks will display each time that you
                                                                    enter a sheet or roll quantity, enabling you to see
                                                                    the next volume discount.</p>
                                                                <p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading12" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse12" aria-expanded="false"
                                                                    href="#collapse12" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can I place an order over the telephone? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading12" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse12"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-phone "></i></div>
                                                                <p> If you would like to place an order over the phone,
                                                                    our sales line is open from 8:30am – 5pm, Monday to
                                                                    Friday. </p>
                                                                <p> Telephone:
                                                                    <?= PHONE ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading13" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse13" aria-expanded="false"
                                                                    href="#collapse13" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Are my credit/debit cards details secure when
                                                                    placing an order through the website? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading13" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse13"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-credit-card "></i>
                                                                </div>
                                                                <p>All credit card information is processed using a
                                                                    secure payment system provided by Protx, a leading
                                                                    online payment processor. Our complete Checkout
                                                                    system is hosted on a secure server. A padlock
                                                                    symbol will appear at bottom of your browser window
                                                                    to confirm that you have entered a secure area.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading14" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse14" aria-expanded="false"
                                                                    href="#collapse14" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can You Provide A Free Sample Of A Particular Label
                                                                    Material? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading14" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse14"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-file-image-o "></i>
                                                                </div>
                                                                <p>Yes. AA Labels can provide you a free sample of a
                                                                    specific label material but it's tricky to supply
                                                                    individual label templates since we make most of our
                                                                    orders to order. Please contact the AA Labels
                                                                    Helpdesk to order your free samples on
                                                                    <?= PHONE ?>
                                                                    .</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading15" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse15" aria-expanded="false"
                                                                    href="#collapse15" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can I Order Free Samples? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading15" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse15"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-paper-plane-o "></i>
                                                                </div>
                                                                <p>We're more than happy to provide up to 3 free
                                                                    material sheets of your choice of label colour,
                                                                    material or adhesive. Please <a href="#">click
                                                                        here</a> to order your <a href="#">free
                                                                        samples</a>.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading16" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse16" aria-expanded="false"
                                                                    href="#collapse16" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    How Do I Create An AA Labels Account? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading16" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse16"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-user"></i></div>
                                                                <p> You can create a new account in following two ways.

                                                                    Point your cursor to the "Sign in" tab on the top of
                                                                    the right side module. It will slide down and you
                                                                    could see a link "New users register here" right
                                                                    below the "Sign in" button. Click this link. You
                                                                    will be directed to the account creation page. Fill
                                                                    out the form here following the instructions.
                                                                    After adding all of your labels to the cart, go to
                                                                    the checkout page. Here you will see a form under
                                                                    the 'Your Details' heading right below the details
                                                                    of your order. Fill out this form and make sure the
                                                                    'Create new account' checkbox is checked.After
                                                                    making sure you have provided all the required
                                                                    details and reading our terms and conditions, click
                                                                    the 'Confirm and Pay' button in the bottom right of
                                                                    the page.

                                                                    Your account will then be created and the next time
                                                                    you visit the AA Labels website you will only have
                                                                    to provide your email and password to sign in. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading17" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse17" aria-expanded="false"
                                                                    href="#collapse17" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    I Have Forgotten My Login Password, What Should I
                                                                    Do? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading17" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse17"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-lock "></i></div>
                                                                <p>If you have forgotten the password of your AA Labels
                                                                    account, click the 'Forgotten Your Password' link
                                                                    below the 'Sign in' button. You'll be asked to
                                                                    provide your email address. Your password will then
                                                                    be sent to you on the same email address.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading18" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse18" aria-expanded="false"
                                                                    href="#collapse18" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Do You Offer Bulk Labels Discounts? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading18" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse18"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-tag "></i></div>
                                                                <p>Yes. We offer bulk discounts of 65% for orders of
                                                                    200+ boxes of labels. For details click the 'Bulk
                                                                    Discounts 75+' tab above the labels price on the
                                                                    product page.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading19" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse19" aria-expanded="false"
                                                                    href="#collapse19" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    What Are The Payment Terms? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading19" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse19"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-paypal "></i></div>
                                                                <p> Unless otherwise agreed by us, payment for all goods
                                                                    must be made in advance in cleared funds or by
                                                                    credit or debit card. Credit terms of up to 30 days
                                                                    may be available from us which we will be happy to
                                                                    discuss separately.

                                                                    You can find the full payment terms under 'Price and
                                                                    Payment' heading in our <a href="#">terms and
                                                                        conditions</a>. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading20" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse20" aria-expanded="false"
                                                                    href="#collapse20" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    What Is The Minimum Order Quantity? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading20" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse20"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-qrcode "></i></div>
                                                                <p>The minimum order quantity is one box of A4 sheets of
                                                                    AA labels.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="three">
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <div class="col-xs-12  col-sm-8 col-md-9 m-t-10">
                                                    <div>
                                                        <h2 class="BlueHeading">Top Rated Questions about Pricing?</h2>
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-3 m-t-10">
                                                    <div class="pull-right"><a
                                                                onclick="javascript:$('.tab-pane').addClass('active');$(this).toggleClass('hide');return false"
                                                                href="#" class="btn orange pull-right" role="button"><i
                                                                    class="fa fa-eye faa-horizontal animated"></i>&nbsp;
                                                            View All</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-t-15 ">
                                            <div>
                                                <div aria-multiselectable="true" role="tablist" id="accordion"
                                                     class="panel-group">
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading23" role="tab" class="panel-title_gray">
                                                            <div class=""><a aria-controls="collapse23"
                                                                             aria-expanded="true" href="#collapse23"
                                                                             data-parent="#accordion"
                                                                             data-toggle="collapse" role="button"
                                                                             class=""> <i class="fa fa-info-circle"></i>
                                                                    Is VAT Included In The Price Of Labels? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading23" role="tabpanel"
                                                             class="panel-collapse collapse in" id="collapse23"
                                                             aria-expanded="true" style="">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-gbp "></i></div>
                                                                <p> Yes. VAT is included in the prices of all the labels
                                                                    or services at AA Labels. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading24pr" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse24pr" aria-expanded="false"
                                                                    href="#collapse24pr" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Do you offer volume discounts? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading24pr" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse24pr"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-tag "></i></div>
                                                                <p>Yes all of our label and print prices include volume
                                                                    related price breaks, which means that the more you
                                                                    order the lower the unitary price and the greater
                                                                    the value for money of your purchase.</p>
                                                                <p>The price breaks will display each time that you
                                                                    enter a sheet or roll quantity, enabling you to see
                                                                    the next volume discount.</p>
                                                                <p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading25" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse25" aria-expanded="false"
                                                                    href="#collapse25" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    How do I get an invoice? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading25" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse25"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-print "></i></div>
                                                                <p>You will receive an order confirmation as soon as you
                                                                    place your order. You will then receive a dispatch
                                                                    email when your order is completed. Attached to this
                                                                    email will be a pdf invoice for your records.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading26" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse26" aria-expanded="false"
                                                                    href="#collapse26" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can I pay by BACS? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading26" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse26"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-credit-card "></i>
                                                                </div>
                                                                <p>BACS payments are an accepted payment option and we
                                                                    will provide a pro-forma invoice against which
                                                                    payment should be made. However we are unable to
                                                                    process your order for production and artwork
                                                                    approval if required, until the payment has been
                                                                    cleared by our bank. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading26q" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse26q" aria-expanded="false"
                                                                    href="#collapse26q" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can I pay by PayPal? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading26q" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse26q"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-credit-card "></i>
                                                                </div>
                                                                <p>Payments via PayPal accounts are an accepted payment
                                                                    option and we will provide a pro-forma invoice
                                                                    against which payment should be made. However we are
                                                                    unable to process your order for production and
                                                                    artwork approval if required, until the payment by
                                                                    e-cheque has been cleared by our bank. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading26r" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse26r" aria-expanded="false"
                                                                    href="#collapse26r" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can I pay by PO? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading26r" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse26r"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-credit-card "></i>
                                                                </div>
                                                                <p>Purchase orders as confirmation of payment are only
                                                                    accepted from the educational sector e.g. Academies,
                                                                    schools, colleges and universities, along with
                                                                    government bodies e.g. Local, regional and national
                                                                    departments and the MOD. Payment is required within
                                                                    30 days from the date of invoice. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading27" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse27" aria-expanded="false"
                                                                    href="#collapse27" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    How will my labels be packed and despatched? </a>
                                                            </div>
                                                        </div>
                                                        <div aria-labelledby="heading27" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse27"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-cubes "></i></div>
                                                                <p>We currently pack A4 sheet labels in quantities of
                                                                    25, 100 and 250 sheets. Dependant upon the quantity
                                                                    of sheets ordered we may also use an outer box and
                                                                    in the case of larger volumes the labels will be
                                                                    palletised.</p>
                                                                <p>A3 and SRA3 sheets are packed in quantities of 100
                                                                    sheets in loose leaf format within boxes and roll
                                                                    labels are also boxed for delivery.</p>
                                                                <p>All customer deliveries are carried out by
                                                                    courier</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading28" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse28" aria-expanded="false"
                                                                    href="#collapse28" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    What is the most common and standard material for
                                                                    self adhesive labels? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading28" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse28"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-file-image-o "></i>
                                                                </div>
                                                                <p>Standard matt white paper is widely used for inkjet,
                                                                    laser and flexo printing. It provides an excellent
                                                                    multi purpose printing surface, a high quality
                                                                    finish and long shelf life.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading29" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse29" aria-expanded="false"
                                                                    href="#collapse29" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    I have specific label size requirements and I cannot
                                                                    find suitable labels within your standard range. Can
                                                                    you supply labels to my exact specifications? </a>
                                                            </div>
                                                        </div>
                                                        <div aria-labelledby="heading29" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse29"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-envelope-o "></i>
                                                                </div>
                                                                <p>Yes, we can supply custom labels to your exact
                                                                    specifications. Please fill in our custom labels
                                                                    quotation form and we will contact you by email or
                                                                    telephone within 24 hours with a quote.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading30" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse30" aria-expanded="false"
                                                                    href="#collapse30" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Do You Supply Labels on a Roll? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading30" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse30"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-circle "></i></div>
                                                                <p>Yes we do supply Labels on roll.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading31" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse31" aria-expanded="false"
                                                                    href="#collapse31" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can You Provide Free Samples? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading31" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse31"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-image "></i></div>
                                                                <p>Yes. AA Labels can provide up to 3 samples of
                                                                    specific label materials. We can't promise to
                                                                    provide the exact labels template with our free
                                                                    samples but we can certainly send you up to 3 free
                                                                    material samples so you can test them out on your
                                                                    laser or inkjet printer or photocopier . Please
                                                                    contact the AA Labels Helpdesk on
                                                                    <?= PHONE ?>
                                                                    or simply choose the material samples and email us
                                                                    on this page, and we'll pop them in the post
                                                                    today.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading32" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse32" aria-expanded="false"
                                                                    href="#collapse32" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can You Provide A Free Sample Of A Particular Label
                                                                    Material? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading32" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse32"
                                                             aria-expanded="false">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-gift "></i></div>
                                                                <p>Yes. AA Labels can provide you a free sample of a
                                                                    specific label material but it's tricky to supply
                                                                    individual label templates since we make most of our
                                                                    orders to order. Please contact the AA Labels
                                                                    Helpdesk to order your free samples on
                                                                    <?= PHONE ?>
                                                                    .</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="four">
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <div class="col-xs-12  col-sm-8 col-md-9 m-t-10">
                                                    <div>
                                                        <h2 class="BlueHeading"> Top Rated Questions about Sheets? </h2>
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-3 m-t-10">
                                                    <div class="pull-right"><a
                                                                onclick="javascript:$('.tab-pane').addClass('active');$(this).toggleClass('hide');return false"
                                                                href="#" class="btn orange pull-right" role="button"><i
                                                                    class="fa fa-eye faa-horizontal animated"></i>&nbsp;
                                                            View All</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-t-15 ">
                                            <div>
                                                <div aria-multiselectable="true" role="tablist" id="accordion"
                                                     class="panel-group">
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading35" role="tab" class="panel-title_gray">
                                                            <div class=""><a aria-controls="collapse35"
                                                                             aria-expanded="true" href="#collapse35"
                                                                             data-parent="#accordion"
                                                                             data-toggle="collapse" role="button"
                                                                             class=""> <i class="fa fa-info-circle"></i>
                                                                    How can I place an order on your website? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading35" role="tabpanel"
                                                             class="panel-collapse collapse in" id="collapse35"
                                                             aria-expanded="true" style="">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-globe "></i></div>
                                                                <p> Browse our product range by selecting a category
                                                                    from menu on the left hand side of the page or
                                                                    alternatively use the search function, in the top
                                                                    right hand corner of the page. When you have found
                                                                    the product you would like to purchase, choose an
                                                                    option from the Select material colour and adhesive
                                                                    type drop down menu. The option prices will be
                                                                    displayed next to the option name. </p>
                                                                <p> Enter the desired amount in the Quantity box and
                                                                    click Add To Cart. Please note that a quantity of 1
                                                                    in the shopping cart, translates to 1 box of 100
                                                                    sheets. For example, if you require 400 sheets,
                                                                    enter a quantity of 4.
                                                                    The selected product will then be added to the
                                                                    shopping cart. If you need to browse the shop for
                                                                    other products to add to the order, the shopping
                                                                    cart will store the added item(s) until you need to
                                                                    make a purchase. </p>
                                                                <p> Products can be added and deleted at any stage
                                                                    whilst you are in the shopping cart. If you would
                                                                    like to adjust the quantity of an item, change the
                                                                    number in the Quantity box and then click Update.
                                                                    The shopping cart will then recalculate the order
                                                                    amount.
                                                                    When you are ready to make a purchase, click
                                                                    Checkout. The invoice location is set to a default
                                                                    of United Kingdom. You can select whether you would
                                                                    like to have your order delivered to a different
                                                                    location from your billing address by ticking the
                                                                    box in the Select Shipping Destination section.
                                                                    Select Next to continue. </p>
                                                                <p> After you have filled in your invoice address and
                                                                    delivery address, if different, select Next to
                                                                    continue to the payment pages.
                                                                    Your browser will then re-direct you to the secure
                                                                    online payment system provided by Protx. You can
                                                                    securely enter your credit/debit card details and
                                                                    pay for your order online. If payment is successful,
                                                                    you will be re-directed back to the Order Receipt
                                                                    page, which acts as confirmation of your order.
                                                                    You will receive an order confirmation email and
                                                                    payment confirmation email from Protx. If you do not
                                                                    receive either of these emails, please contact us,
                                                                    quoting your name and order details.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading24sh" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse24sh" aria-expanded="false"
                                                                    href="#collapse24sh" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Do you offer volume discounts? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading24sh" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse24sh"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-tag "></i></div>
                                                                <p>Yes all of our label and print prices include volume
                                                                    related price breaks, which means that the more you
                                                                    order the lower the unitary price and the greater
                                                                    the value for money of your purchase.</p>
                                                                <p>The price breaks will display each time that you
                                                                    enter a sheet or roll quantity, enabling you to see
                                                                    the next volume discount.</p>
                                                                <p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading36" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse36" aria-expanded="false"
                                                                    href="#collapse36" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    How many sheets per box? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading36" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse36"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-cubes "></i></div>
                                                                <p> We don't do boxes as such everything is priced per
                                                                    the sheet

                                                                    Min order is 25 sheets but you can order as many
                                                                    sheets as you like. We provide a calculator on each
                                                                    product page where you can input how many sheets you
                                                                    want and it will tell you the price ex vat. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="five">
                                        <div class="col-md-12 ">
                                            <div class="row">
                                                <div class="col-xs-12  col-sm-8 col-md-9 m-t-10">
                                                    <div>
                                                        <h2 class="BlueHeading"> Top Rated Questions about Roll
                                                            Labels? </h2>
                                                    </div>
                                                </div>
                                                <div class="col-xs-5 col-sm-4 col-md-3 m-t-10">
                                                    <div class="pull-right"><a
                                                                onclick="javascript:$('.tab-pane').addClass('active');$(this).toggleClass('hide');return false"
                                                                href="#" class="btn orange pull-right" role="button"><i
                                                                    class="fa fa-eye faa-horizontal animated"></i>&nbsp;
                                                            View All</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 m-t-15 ">
                                            <div>
                                                <div aria-multiselectable="true" role="tablist" id="accordion"
                                                     class="panel-group">
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading3x5" role="tab" class="panel-title_gray">
                                                            <div class=""><a aria-controls="collapse3x5"
                                                                             aria-expanded="true" href="#collapse3x5"
                                                                             data-parent="#accordion"
                                                                             data-toggle="collapse" role="button"
                                                                             class=""> <i class="fa fa-info-circle"></i>
                                                                    Is there a minimum quantity of labels required? </a>
                                                            </div>
                                                        </div>
                                                        <div aria-labelledby="heading3x5" role="tabpanel"
                                                             class="panel-collapse collapse in" id="collapse3x5"
                                                             aria-expanded="true" style="">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-globe "></i></div>
                                                                <p> The die-cutter for roll labels will vary by size
                                                                    e.g. Smaller label sizes might be produced 10 rolls
                                                                    per press-run and larger label sizes less rolls per
                                                                    press-run. </p>
                                                                <p> The number of rolls to be produced will be shown
                                                                    against the label size being considered and
                                                                    generally speaking the smaller the label dimensions
                                                                    the higher the number of labels to be ordered should
                                                                    be for purpose of cost effectiveness. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading24roll" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse24roll" aria-expanded="false"
                                                                    href="#collapse24roll" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Do you offer volume discounts? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading24roll" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse24roll"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-tag "></i></div>
                                                                <p>Yes all of our label and print prices include volume
                                                                    related price breaks, which means that the more you
                                                                    order the lower the unitary price and the greater
                                                                    the value for money of your purchase.</p>
                                                                <p>The price breaks will display each time that you
                                                                    enter a sheet or roll quantity, enabling you to see
                                                                    the next volume discount.</p>
                                                                <p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading3x16" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse3x16" aria-expanded="false"
                                                                    href="#collapse3x16" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    How will my labels be orientated on the roll? </a>
                                                            </div>
                                                        </div>
                                                        <div aria-labelledby="heading3x16" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse3x16"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-circle "></i></div>
                                                                <p> There are two ways in which your labels can present
                                                                    from a roll which on the outside (wound out) or
                                                                    inside of the roll (wound In) and a number of
                                                                    factors influence the choice of having label on the
                                                                    outside or inside of the roll including label size
                                                                    and surface, adhesive type and means of
                                                                    application. </p>
                                                                <p> Irrespective of whether your labels are on the
                                                                    outside or inside of the roll there are four ways in
                                                                    which the label can be orientated for mechanical
                                                                    application and often personal preference in manual
                                                                    application processes. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading3x26" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse3x26" aria-expanded="false"
                                                                    href="#collapse3x26" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    What is the core size? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading3x26" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse3x26"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-circle "></i></div>
                                                                <p>The core size refers to the diameter of the cardboard
                                                                    core around which the labels are wound and this can
                                                                    be an importnat measurement in machine applications
                                                                    and printers, so it is importatn to know the maximum
                                                                    and minimum core sizes taht are compatible.</p>
                                                                <p>AA Labels provide a choice of four core size
                                                                    daimeters to choose from e.g. 25mm; 38mm; 44.5mm
                                                                    &amp; 78mm.</p>
                                                                <p>If no core size is specified labels will be produced
                                                                    on a 25mm diameter core.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default"
                                                         style="box-shadow: none !important;">
                                                        <div id="heading3x36" role="tab" class="panel-title_gray">
                                                            <div><a aria-controls="collapse3x36" aria-expanded="false"
                                                                    href="#collapse3x36" data-parent="#accordion"
                                                                    data-toggle="collapse" role="button"
                                                                    class="collapsed"> <i class="fa fa-info-circle"></i>
                                                                    Can my roll labels be printed? </a></div>
                                                        </div>
                                                        <div aria-labelledby="heading3x36" role="tabpanel"
                                                             class="panel-collapse collapse" id="collapse3x36"
                                                             aria-expanded="false" style="height: 0px;">
                                                            <div class="panel-body">
                                                                <div class="pull-right"><i
                                                                            class="fa f-100 fa fa-circle "></i></div>
                                                                <p> We produce both plain and printed roll labels in
                                                                    monochrome or full process colour options including
                                                                    up to 8 colours and specialist finishes such as gold
                                                                    and silver foils. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>

            <!-- Advertising Banners for free delivery start-->
            <? $this->load->view('advertising/free_delivery'); ?>
            <? $this->load->view('advertising/free_shipping'); ?>

            <!-- Advertising Banners for free delivery end-->

        </div>
    </div>
</div>
