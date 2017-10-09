$(document).ready(function() {

    //параллакс фона
    $(window).bind("scroll", function(e) {
        parallaxScroll();
    });

    function parallaxScroll() {
        var scrolled = $(window).scrollTop();
        $("body").css("background-position-y", (0 + (scrolled * .80)) + "px");
    }
    parallaxScroll();

    //плавный якорь
    $("a.scrollto").click(function() {
        var elementClick = $(this).attr("href")
        var destination = $(elementClick).offset().top - 80;
        jQuery("html:not(:animated),body:not(:animated)").animate({
            scrollTop: destination
        }, 800);
        return false;
    });

    //кнопка "вверх"
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    //модальные окна
    var feedbackModal = new jBox('Modal', {
      title: "<div class='modaltitle'>Заявка отправлена</div>",
      content: "<div class='modaltext'>Заявка отправлена! В ближайшее время мы свяжемся с вами.</div>",
      width: "500px"
    });

    var buyModal = new jBox('Modal', {
      title: "Заказать карту",
      content: $("#buyform-modal"),
      width: "380px"
    });

    $(".btn-buy").click(function() {
        buyModal.open();
    })

    //маска для мобильного телефона
    $("input[type='tel']").mask("+7(000)-000-00-00");

    //отправка форм
    $("#buyform").submit(function() {
        return false;
    })

    $("#feedbackform").submit(function() {
        $(".feedback-input").attr("disabled", "disabled");
            $.ajax({
                type: "POST",
                url: "/main/feedback/ajaxsend/",
                data: {
                    "name": $("#feedback-name").val(),
                    "email": $("#feedback-email").val(),
                    "text": "<b>(Тема:" + $("#feedback-theme").val() + ")</b> " + $("#feedback-text").val()
                },
                success: function(data) {
                $(".feedback-input").removeAttr("disabled");
                if(data.status == "success") {
                    buyModal.close();
                    feedbackModal.open();
                    $("#feedbackform")[0].reset();
                } else {
                }
                },
                dataType: "json"
            });
            return false;
        })

    $("#buyform").submit(function() {
        $(".feedback-input").attr("disabled", "disabled");
            $.ajax({
                type: "POST",
                url: "/main/feedback/ajaxsend/",
                data: {
                    "name": $("#buy-feedback-name").val(),
                    "email": $("#buy-feedback-email").val(),
                    "phone": $("#buy-feedback-phone").val()
                },
                success: function(data) {
                $(".feedback-input").removeAttr("disabled");
                if(data.status == "success") {
                    feedbackModal.open();
                    $("#buyform")[0].reset();
                } else {
                }
                },
                dataType: "json"
            });
            return false;
        })

})