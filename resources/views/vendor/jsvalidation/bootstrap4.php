<script>
    jQuery(document).ready(function(){

        $("<?= $validator['selector']; ?>").each(function() {
            $(this).validate({
                errorElement: 'span',
                errorClass: 'invalid-feedback',
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length ||
                        element.prop('type') === 'checkbox' || element.prop('type') === 'radio') {
                        if(!element.hasClass("product_category"))
                            error.insertAfter(element.parent());
                        // else just place the validation message immediately after the input
                    }
                    else if(element.hasClass("select2-hidden-accessible")) {
                        if(element.attr("id") === 'kt_select2_3'){
                            var emnt = element.siblings('.select2-container--default').find('.select2-selection--multiple');
                            error.insertAfter(emnt);
                        }else{
                            var emnt = $("#select2-" + element.attr("id") + "-container").parent();
                            error.insertAfter(emnt);
                            // element.siblings('.text-muted').addClass('mt-6');
                        }
                    }
                    else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element) {
                    if ($(element).hasClass("select2-hidden-accessible")) {
                        if($(element).attr("id") === 'kt_select2_3'){
                            $(element).siblings('.select2-container--default').find('.select2-selection--multiple').addClass('is-invalid');
                        }else
                        {
                            $("#select2-" + $(element).attr("id") + "-container").parent().addClass('is-invalid');
                        }
                    }
                    else{
                        if($(element).hasClass("product_category"))
                            $(element).parents('ul').addClass('invalid-category');
                        else
                            $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid'); // add the Bootstrap error class to the control group
                    }
                },

                <?php if (isset($validator['ignore']) && is_string($validator['ignore'])): ?>

                ignore: "<?= $validator['ignore']; ?>",
                <?php endif; ?>


                unhighlight: function(element) {
                    if ($(element).hasClass("select2-hidden-accessible")) {
                        if($(element).attr("id") === 'kt_select2_3'){
                            $(element).siblings('.select2-container--default').find('.select2-selection--multiple').removeClass('is-invalid').addClass('is-valid');
                        }else{
                            $("#select2-" + $(element).attr("id") + "-container").parent().removeClass('is-invalid').addClass('is-valid');
                            // $(element).siblings('.text-muted').removeClass('mt-6');
                        }
                    }else
                    {
                        if($(element).hasClass("product_category"))
                            $(element).parents('ul').removeClass('invalid-category');
                        else
                            $(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
                    }
                },

                success: function (element) {
                    if ($(element).hasClass("select2-hidden-accessible")) {
                        if($(element).attr("id") === 'kt_select2_3'){
                            $(element).siblings('.select2-container--default').find('.select2-selection--multiple').removeClass('is-invalid').addClass('is-valid');
                        }else
                            $("#select2-" + $(element).attr("id") + "-container").parent().addClass('is-valid');
                    }else{
                        if($(element).hasClass("product_category"))
                            $(element).parents('ul').removeClass('invalid-category');
                        else
                            $(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid'); // remove the Boostrap error class from the control group
                    }
                },

                focusInvalid: true,
                <?php if (Config::get('jsvalidation.focus_on_error')): ?>
                invalidHandler: function (form, validator) {

                    if (!validator.numberOfInvalids())
                        return;

                    $('html, body').animate({
                        scrollTop: $(validator.errorList[0].element).offset().top
                    }, <?= Config::get('jsvalidation.duration_animate') ?>);

                },
                <?php endif; ?>

                rules: <?= json_encode($validator['rules']); ?>
            });
        });
    });
</script>
