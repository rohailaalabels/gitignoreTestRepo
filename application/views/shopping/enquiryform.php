<form class="labels-form" id="quote-form" method="post">
    <div class=" ">
        <div class="col-sm-12 col-md-8 p0 "><img onerror='imgError(this);' src="<?= Assets ?>images/pentone_banner.jpg"
                                                 alt="Pentone Colours Banner" width="750" height="268"
                                                 class="img-responsive"></div>
        <div class="col-sm-12 col-md-4 ">
            <div class="p-l-r-10">
                <div class="m-t-b-9 ">
                    <h3>Contact us for a quote</h3>
                </div>
                <div class="">
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                        <input id="firstName" type="text" name="firstName" placeholder="Name" class="required">
                        <b class="tooltip tooltip-bottom-right">Needed to enter the First Name</b> </label>
                </div>
                <div class="">
                    <label class="input"> <i class="icon-append fa fa-phone"></i>
                        <input id="Phone" type="text" name="Phone" placeholder="Phone" class="required">
                        <b class="tooltip tooltip-bottom-right">Needed to enter the Phone</b> </label>
                </div>
                <div class="">
                    <label class="input"> <i class="icon-append fa fa-envelope"></i>
                        <input type="text" name="email" id="email" placeholder="Email" class="required">
                        <b class="tooltip tooltip-bottom-right">Needed to enter the Email</b> </label>
                </div>
                <div>
                    <button class="btn-u btn-u-sm orange text-uppercase" type="submit" style="">submit quote &nbsp;
                        &nbsp; <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    var form = $("#quote-form");

    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.after(error);
        },
        rules: {
            email: {
                required: true,
                email: true,

            }
        },

        submitHandler: function (form) {

            $.post(base + 'ajax/ajax_quote', $("#quote-form").serialize(), function (data) {

                if (data.is_error == 'yes') {

                    swal('Alert', 'Try Again ! unable to Send Quote ', 'warning');
                } else {

                    $('#firstName').val('');
                    $('#Phone').val('');
                    $('#email').val('');
                    swal('', 'Quote Sent ', 'success');

                    /*window.location.href=base+"shoppingcart.php";*/
                }
                //swal("Alright!", "invalid login details", "success");
                return false;
            }, 'json');

            return false;
        }

    });


</script>