"use strict";var KTCalendarGoogle={init:function(){var e=document.getElementById("kt_calendar");new FullCalendar.Calendar(e,{plugins:["interaction","dayGrid","timeGrid","list","googleCalendar"],isRTL:KTUtil.isRTL(),header:{left:"prev,next today",center:"title",right:"dayGridMonth,timeGridWeek,timeGridDay"},displayEventTime:!1,height:800,contentHeight:780,aspectRatio:3,views:{dayGridMonth:{buttonText:"month"},timeGridWeek:{buttonText:"week"},timeGridDay:{buttonText:"day"}},defaultView:"dayGridMonth",editable:!0,eventLimit:!0,navLinks:!0,googleCalendarApiKey:"AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE",events:"en.usa#holiday@group.v.calendar.google.com",eventClick:function(e){return window.open(e.url,"gcalevent","width=700,height=600"),!1},loading:function(e){},eventRender:function(e){var t=$(e.el);e.event.extendedProps&&e.event.extendedProps.description&&(t.hasClass("fc-day-grid-event")?(t.data("content",e.event.extendedProps.description),t.data("placement","top"),KTApp.initPopover(t)):t.hasClass("fc-time-grid-event")?t.find(".fc-title").append('<div class="fc-description">'+e.event.extendedProps.description+"</div>"):0!==t.find(".fc-list-item-title").lenght&&t.find(".fc-list-item-title").append('<div class="fc-description">'+e.event.extendedProps.description+"</div>"))}}).render()}};jQuery(document).ready((function(){KTCalendarGoogle.init()}));