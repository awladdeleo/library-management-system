"use strict";
var KTDualListbox = {
    init: function () {
        var t;
        t = document.getElementById("kt_dual_listbox_1"), new DualListbox(t, {
            addEvent: function (t) {
                console.log(t)
            },
            removeEvent: function (t) {
                console.log(t)
            },
            availableTitle: "Available options",
            selectedTitle: "Selected options",
            addButtonText: "Add",
            removeButtonText: "Remove",
            addAllButtonText: "Add All",
            removeAllButtonText: "Remove All"
        }), function () {
            var t = document.getElementById("kt_dual_listbox_2");
            new DualListbox(t, {
                addEvent: function (t) {
                    console.log(t)
                },
                removeEvent: function (t) {
                    console.log(t)
                },
                availableTitle: "Source Options",
                selectedTitle: "Destination Options",
                addButtonText: "<i class='flaticon2-next'></i>",
                removeButtonText: "<i class='flaticon2-back'></i>",
                addAllButtonText: "<i class='flaticon2-fast-next'></i>",
                removeAllButtonText: "<i class='flaticon2-fast-back'></i>"
            })
        }(), function () {
            var t = document.getElementById("kt_dual_listbox_3");
            new DualListbox(t, {
                addEvent: function (t) {
                    console.log(t)
                },
                removeEvent: function (t) {
                    console.log(t)
                },
                availableTitle: "Available options",
                selectedTitle: "Selected options",
                addButtonText: "Add",
                removeButtonText: "Remove",
                addAllButtonText: "Add All",
                removeAllButtonText: "Remove All"
            })
        }(), function () {
            var t = document.getElementById("kt_dual_listbox_4");
            new DualListbox(t, {
                addEvent: function (t) {
                    console.log(t)
                },
                removeEvent: function (t) {
                    console.log(t)
                },
                availableTitle: "Available options",
                selectedTitle: "Selected options",
                addButtonText: "Add",
                removeButtonText: "Remove",
                addAllButtonText: "Add All",
                removeAllButtonText: "Remove All"
            }).search.classList.add("dual-listbox__search--hidden")
        }()
    }
};
window.addEventListener("load", (function () {
    KTDualListbox.init()
}));