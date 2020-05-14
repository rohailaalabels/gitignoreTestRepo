<div class="unsubscribeBg text-center">
    <div class="container">
        <h1>Unsubscribe</h1>
        <p>If you no longer wish to receive details of special offers and newsletters, then you can unsubscribe. </p>
    </div>
</div>
<div class="bgGray">
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-sm-8 col-md-8 col-lg-9">
                <div class="thumbnail p-l-r-10">
                    <div>
                        <h4>Unsubscribe from our Newsletter</h4>
                    </div>
                    <div class="f-16 m-t-15 "> We are sorry that you have decided to unsubscribe from all aalabels email
                        communications.
                        Please enter the email address registered with  your account and click &ldquo;Unsubscribe&ldquo;
                        to confirm your request.
                    </div>
                    <? if (isset($msg) and $msg != '') { ?>
                        <div role="alert" class="alert alert-<?= $class ?> alert-dismissible fade in padding-lr">
                            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span
                                        aria-hidden="true">×</span></button>
                            <?= $msg ?>
                        </div>
                    <? } ?>
                    <div class="bg-info borderRadius m-t-20">
                        <div id="custom-search-input ">
                            <form id="unsubscribe" name="unsubscribe-form" method="post">
                                <div class="input-group col-md-12 ">
                                    <input type="email" style="" id="email" name="email" placeholder="Email Address"
                                           class="form-control">
                                    <span class="input-group-btn">
                  <button type="submit" class="btn btn-info btn-lg"> <i class=" fa fa-unlink"></i> Unsubscribe </button>
                  </span></div>
                                <label class="error" for="email" style="display: none;">Please enter a valid email
                                    address.</label>
                            </form>
                        </div>
                    </div>
                    <div>
                        <p class="m-t-10">Whether you choose to continue receiving information from AA Labels or to
                            unsubscribe, we promise to continue providing the very best service for you label
                            requirements. </p>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- Advertising Banners for free delivery start-->
            <? $this->load->view('advertising/printer3'); ?>

            <!-- Advertising Banners for free delivery end-->
        </div>
    </div>
</div>
<script>
    var form = $("#unsubscribe");
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
            form.submit();
            return false;
        }
    });
</script>