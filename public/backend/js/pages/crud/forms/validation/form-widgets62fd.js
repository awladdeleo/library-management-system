var KTFormWidgetsValidation = function () {
    var e;
    return {
        init: function () {
            !function () {
                $("#kt_datepicker").datepicker({
                    todayHighlight: !0,
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                }).on("changeDate", (function (t) {
                    e.revalidateField("date")
                })), $("#kt_datetimepicker").datetimepicker({
                    pickerPosition: "bottom-left",
                    todayHighlight: !0,
                    autoclose: !0,
                    format: "yyyy.mm.dd hh:ii"
                }), $("#kt_datetimepicker").change((function () {
                    e.revalidateField("datetime")
                })), $("#kt_timepicker").timepicker({
                    minuteStep: 1,
                    showSeconds: !0,
                    showMeridian: !0
                }), $("#kt_timepicker").change((function () {
                    e.revalidateField("time")
                })), $("#kt_daterangepicker").daterangepicker({
                    buttonClasses: " btn",
                    applyClass: "btn-primary",
                    cancelClass: "btn-light-primary"
                }, (function (t, a, i) {
                    $("#kt_daterangepicker").find(".form-control").val(t.format("YYYY/MM/DD") + " / " + a.format("YYYY/MM/DD")), e.revalidateField("daterangepicker")
                })), $("[data-switch=true]").bootstrapSwitch(), $("[data-switch=true]").on("switchChange.bootstrapSwitch", (function () {
                    e.revalidateField("switch")
                })), $("#kt_bootstrap_select").selectpicker(), $("#kt_bootstrap_select").on("changed.bs.select", (function () {
                    e.revalidateField("select")
                })), $("#kt_select2").select2({placeholder: "Select a state"}), $("#kt_select2").on("change", (function () {
                    e.revalidateField("select2")
                }));
                var t = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    prefetch: HOST_URL + "/api/?file=typeahead/countries.json"
                });
                $("#kt_typeahead").typeahead(null, {
                    name: "countries",
                    source: t
                }), $("#kt_typeahead").bind("typeahead:select", (function (t, a) {
                    e.revalidateField("typeahead")
                }))
            }(), e = FormValidation.formValidation(document.getElementById("kt_form"), {
                fields: {
                    date: {validators: {notEmpty: {message: "Date is required"}}},
                    daterangepicker: {validators: {notEmpty: {message: "Daterange is required"}}},
                    datetime: {validators: {notEmpty: {message: "Datetime is required"}}},
                    time: {validators: {notEmpty: {message: "Time is required"}}},
                    select: {validators: {notEmpty: {message: "Select is required"}}},
                    select2: {validators: {notEmpty: {message: "Select2 is required"}}},
                    typeahead: {validators: {notEmpty: {message: "Typeahead is required"}}},
                    switch: {validators: {notEmpty: {message: "Typeahead is required"}}},
                    markdown: {validators: {notEmpty: {message: "Typeahead is required"}}}
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    submitButton: new FormValidation.plugins.SubmitButton,
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit,
                    bootstrap: new FormValidation.plugins.Bootstrap({eleInvalidClass: "", eleValidClass: ""})
                }
            })
        }
    }
}();
jQuery(document).ready((function () {
    KTFormWidgetsValidation.init()
}));