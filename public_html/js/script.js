$(document).ready(function () {
    var imgItems = $(".slider li").length; // Numero de Slides
    var imgPos = 1;

    // Agregando paginacion --
    for (i = 1; i <= imgItems; i++) {
        $(".pagination").append('<li><span class="fa fa-circle"></span></li>');
    }
    //------------------------

    $(".slider li").hide(); // Ocultanos todos los slides
    $(".slider li:first").show(); // Mostramos el primer slide
    $(".pagination li:first").css({ color: "#e7bb41" }); // Damos estilos al primer item de la paginacion

    // Ejecutamos todas las funciones
    $(".pagination li").click(pagination);
    $(".right").click(nextSlider);
    $(".left").click(prevSlider);

    setInterval(function () {
        nextSlider();
    }, 4000);

    // FUNCIONES =========================================================

    function pagination() {
        var paginationPos = $(this).index() + 1; // Posicion de la paginacion seleccionada

        $(".slider li").hide(); // Ocultamos todos los slides
        $(".slider li:nth-child(" + paginationPos + ")").fadeIn(); // Mostramos el Slide seleccionado

        // Dandole estilos a la paginacion seleccionada
        $(".pagination li").css({ color: "#858585" });
        $(this).css({ color: "#e7bb41" });

        imgPos = paginationPos;
    }
    function setCookie(cookieName, cookieValue) {
        let cookie = $.cookie(cookieName, cookieValue, { expires: 5/1440 });
    }
    if ($.cookie("alert") == "close") {
        console.log($.cookie("alert"));
        $('.footer_alert').addClass('disabled');
    }

    function nextSlider() {
        if (imgPos >= imgItems) {
            imgPos = 1;
        } else {
            imgPos++;
        }

        $(".pagination li").css({ color: "#858585" });
        $(".pagination li:nth-child(" + imgPos + ")").css({ color: "#e7bb41" });

        $(".slider li").hide(); // Ocultamos todos los slides
        $(".slider li:nth-child(" + imgPos + ")").fadeIn(); // Mostramos el Slide seleccionado
    }

    function prevSlider() {
        if (imgPos <= 1) {
            imgPos = imgItems;
        } else {
            imgPos--;
        }

        $(".pagination li").css({ color: "#858585" });
        $(".pagination li:nth-child(" + imgPos + ")").css({ color: "#e7bb41" });

        $(".slider li").hide(); // Ocultamos todos los slides
        $(".slider li:nth-child(" + imgPos + ")").fadeIn(); // Mostramos el Slide seleccionado
    }

    gsap.registerPlugin(ScrollTrigger);
    $(".showOptions").click(showOptions);
    $(".elementos__elemento.add").click(showFormCreate);
    $(".editButton").click(showFormEdit);
    $(".closeAlert").click(hideAlert);
    $(".buttonEdit").click(EditDescription);
    $(".deleteButton").click(showFormDelete);
    $(".buttonDelete").click(showFormDelete);
    $(".header__menu").children("nav").scroll(scrollNav);
    $(".closeAlert").click(function(){setCookie("alert", "close")});
    text_animation_home();
    elements_animation();
    form_animation();
    function hideAlert() {
        $(this).parent().fadeOut();
    }

    function showFormEdit() {
        let element = $(this).parents(".elementos__elemento");
        $(element)
            .siblings("#" + $(element).attr("data-title"))
            .toggleClass("disabled");
        $(element).fadeOut(1);
        $(".buttonCancel").click(function () {
            $(this).parents(".form-container").toggleClass("disabled");
            $(element).fadeIn();
        });
    }
    function showOptions() {
        $(this).siblings(".options__links").fadeToggle();
    }
    function showFormCreate() {
        $(".form-container.create").fadeIn();
        $(".buttonCancel").click(function () {
            $(this).parents(".form-container").fadeOut();
            $(".elementos__elemento.add").fadeIn();
        });
        $(this).fadeOut(1);
    }
    function showFormDelete() {
        $(this).siblings(".alert").children(".warn").fadeIn();
        $(".buttonCancel").click(function () {
            $(this).siblings(".alert").children(".warn").fadeOut();
        });
    }
    function scrollNav() {
        if ($(this).scrollTop() > 1) {
            $(".down").fadeOut();
        } else {
            $(".down").fadeIn();
        }
    }
    function EditDescription() {
        $(".text").fadeToggle(1);
        $(".formEdit").fadeToggle(1);
        $(".fa-trash").fadeToggle(1);
        $(this).toggleClass("fa-times");
        $(this).toggleClass("fa-pen");
    }
    function text_animation_home() {
        let textHeight = $(".portada__texto--animation")
            .children("ul")
            .children("li")
            .innerHeight();
        $(".portada__texto--animation")
            .children("ul")
            .height(textHeight + "px");
        let tl = gsap.timeline({ repeat: 90, yoyo: true });
        tl.from($(".portada__texto--animation").children("ul"), {
            duration: 0.9,
        }),
            "+=6";
        tl.to($(".portada__texto--animation").children("ul"), {
            duration: 1.25,
            y: -textHeight * 1.15,
        }),
            "+=6";
        tl.to($(".portada__texto--animation").children("ul"), {
            duration: 1.25,
            y: -textHeight * 2.15,
        }),
        tl.to($(".portada__texto--animation").children("ul"), {
            duration: 0.5,
            y: -textHeight * 2.15,
        }),
            "+=6";
    }
    function elements_animation() {
        gsap.set(".elementos__elemento", {
            scale: 0,
            opacity: 0,
            overwrite: true,
        }),
            gsap.to(".elementos__elemento", {
                delay: 0.5,
                interval: 0.1,
                opacity: 1,
                scale: 1,
                duration: 0.5,
                stagger: 0.25,
                onComplete() {
                    gsap.to(".elementos__elemento", {
                        scale: 1,
                        opacity: 1,
                        delay: 0.1,
                        duration: 0.2,
                    });
                },
            });
    }
    function form_animation() {
        gsap.from(".contacto .form #text", {
            duration: 2,
            ease: SteppedEase.config(20),
        });
        gsap.to(".contacto .form #text", {
            text: { value: "Contacto" },
            duration: 2,
            delay: 0.3,
            ease: "none",
        });
        gsap.set(".form label", {
            opacity: 0,
        });
        gsap.to(".form label", {
            delay: 0.5,
            interval: 0.1,
            opacity: 1,
            duration: 1,
            stagger: 0.25,
            onComplete() {
                gsap.to(".form input, .form textarea", {
                    opacity: 1,
                    delay: 1,
                    duration: 1,
                });
            },
        });
        gsap.set(".form input, .form textarea", {
            x: -1000,
        });
        gsap.to(".form input, .form textarea", {
            delay: 0.5,
            interval: 0.1,
            x: 0,
            duration: 0.5,
            stagger: 0.25,
            onComplete() {
                gsap.to(".form input, .form textarea", {
                    x: 0,
                    delay: 0.1,
                    duration: 0.2,
                });
            },
        });
    }
    $(".inputImg").each(function () {
        let $file = $(this),
            $label = $file.next("label"),
            $labelText = $label.find("span"),
            labelDefault = $labelText.text();
        $file.on("change", function (event) {
            let fileName = $file.val().split("\\").pop(),
                tmppath = URL.createObjectURL(event.target.files[0]);
            if (fileName) {
                $label
                    .addClass("file-ok")
                    .css("background-image", "url(" + tmppath + ")");
                $labelText.text(fileName);
            } else {
                $label.removeClass("file-ok");
                $labelText.text(labelDefault);
            }
        });
    });
    CKEDITOR.replace("ckeditor");
});
