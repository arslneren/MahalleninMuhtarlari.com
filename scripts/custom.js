/*function getSehir(id){

    var tmp = id.value-1;
    $('.ilce option').remove();
    $('.ilce').append("<option>-</option>");
    for(i=0;i<data[tmp].ilceler.length;i++){
        console.log(data[tmp].ilceler[i]);
        $('.ilce').append("<option value="+i+">"+data[tmp].ilceler[i]+"</option>");
    }
}
*/
function filtre(){
    $('#sehir').on('change',function (e){
        e.preventDefault();
        console.log($('#sehir').val());
        $.ajax({
            type: "GET",
            url: "adres",
            data: {"durum": "ilce", "plakakodu": $('#sehir').val()},
            success: function (data) {
                $('.ilce option').remove();
                $('.mahalle option').remove();
                $('.ilce').append("<option value=''>İlçe Seçiniz</option>");
                $('.mahalle').append("<option value=''>Mahalle Seçiniz</option>");
                $('.ilce').append(data);

            }
        });
        return false;
    });
    $('#ilce').on('change',function (e){
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "adres",
            data: {"durum": "mahalle", "ilcekodu": $('#ilce').val()},
            success: function (data) {
                $('.mahalle option').remove();
                $('.mahalle').append("<option value=''>Mahalle Seçiniz</option>");
                $('.mahalle').append(data);

            }
        });
        return false;
    });
}

function selector(){
    $('#selectorMah').on('submit',function (e){
        e.preventDefault();
        var sehir = $('#sehir').val();
        var ilce = $('#ilce').val();
        var mah = $('#mahalle').val();

        if(sehir == '' || ilce == '' || mah == '') {
            $('.mahSelector input').addClass('redColor');
            $('.mahSelector form select').addClass('redColor');
        }
        else {
            window.location.href='./adaylar/il/' + sehir + '/ilce/' + ilce+'/mahalle/'+ mah ;
        }
    })
}

function selectorMuhtar(){
    $('#selectorMuh').on('submit',function (e){
        e.preventDefault();
        $('.muhtarArea *').remove();
        var $container = $("html,body");
        var sehir = $('#sehir').val();
        var ilce = $('#ilce').val();
        var mah = $('#mahalle').val();

        if(sehir == '' || ilce == '' || mah == '') {
            $('.mahSelector input').addClass('redColor');
            $('.mahSelector form select').addClass('redColor');
        }
        else {
            $('.loading').fadeIn();
            $container.animate({scrollTop:$('.allMuhtar').offset().top},500);
            $.ajax({
                type: "POST",
                url: "query/muhtarget",
                data: {"il": $('#sehir').val(), "ilce": $('#ilce').val(), "mahalle": $('#mahalle').val(), "status": "aday"},
                success: function (response) {
                    $('.muhtarArea *').remove();
                    $('.muhtarArea').append(response);
                    $('.loading').fadeOut();
                    window.history.pushState("","" , './adaylar/il/' + sehir + '/ilce/' + ilce+'/mahalle/'+ mah);
                },error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
    $('#selectorMuh2').on('submit',function (e){
        e.preventDefault();
        $('.muhtarArea *').remove();
        var $container = $("html,body");
        var sehir = $('#sehir').val();
        var ilce = $('#ilce').val();
        var mah = $('#mahalle').val();

        if(sehir == '' || ilce == '' || mah == '') {
            $('.mahSelector input').addClass('redColor');
            $('.mahSelector form select').addClass('redColor');
        }
        else {
            $('.loading').fadeIn();
            $container.animate({scrollTop:$('.allMuhtar').offset().top},500);
            $.ajax({
                type: "POST",
                url: "query/muhtarget",
                data: {"il": $('#sehir').val(), "ilce": $('#ilce').val(), "mahalle": $('#mahalle').val(), "status":"mevcut"},
                success: function (response) {
                    $('.muhtarArea *').remove();
                    $('.muhtarArea').append(response);
                    $('.loading').fadeOut();
                    window.history.pushState("","" , './muhtarlar/il/' + sehir + '/ilce/' + ilce+'/mahalle/'+ mah);

                },error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                }
            });
        }
        return false;
    });
}


$(window).resize(function() {

});

$(window).scroll(function() {
    var scrTop = $(window).scrollTop();
    if(scrTop<=260){
        $('.layer1').css('transform','translateY('+scrTop+'px)');
    }
    if(scrTop != 0){
        //$('.menu').addClass('menuFix');
    }
    else{
        //$('.menu').removeClass('menuFix');
    }
});
function mobMenu() {
    $('.mMenuBtn').toggleClass('change')
    $('.mobMenuArea').toggleClass('menuActive');
    $('.overlay').toggleClass('overActive');
}

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
        return false;
    }else{
        return true;
    }
}

function formValid(){
    $('.formAction').on('submit', function (e){
        e.preventDefault();
        var name = $('#names').val();
        var email = $('#mails').val();
        var message = $('#messages').val().length;
        isValid = false;
        if(name == ""){
            $('#names').addClass('inputAlert');
            isValid = false;
        }
        else{
            $('#names').removeClass('inputAlert');
            isValid = true;
        }
        if(IsEmail(email)==false){
            $('#mails').addClass('inputAlert');
            isValid = false;
        }
        else{
            $('#mails').removeClass('inputAlert');
            isValid = true;
        }
        if(message <= 30){
            $('#messages').addClass('inputAlert');
            isValid = false;
        }
        else{
            $('#messages').removeClass('inputAlert');
            isValid = true;
        }
        if(isValid ==false){
            $('.errorShow').addClass('show');
        }
        else{
            $('.errorShow').removeClass('show');
        }

        if(isValid){
            $.ajax({
                type: "POST",
                url: "mail_post/mail.php",
                data: $(".formAction").serialize(),
                success: function (response) {
                    if(response == "ok"){
                        $('.formAction')[0].reset();
                        $('.sucShow').fadeIn();
                        $('.errorShowImp').fadeOut();
                        $('.errorShow').fadeOut();
                        setTimeout(function (){
                            $('.sucShow').fadeOut();
                        },2000);
                    }
                    else{
                        $('.errorShowImp').fadeIn();
                    }
                }
            });
        }


    });
}

function cookie(){
    let popUp = document.getElementById("cookiePopup");
//When user clicks the accept button
    document.getElementById("acceptCookie").addEventListener("click", () => {
        //Create date object
        let d = new Date();
        //Increment the current time by 1 minute (cookie will expire after 1 minute)
        d.setMonth(1 + d.getMonth());
        //Create Cookie withname = myCookieName, value = thisIsMyCookie and expiry time=1 minute
        document.cookie = "KVKK_AcceptSuc=KVKK_Kabul; expires = " + d + ";";
        //Hide the popup
        popUp.classList.add("hide");
        popUp.classList.remove("show");
    });
//Check if cookie is already present
    const checkCookie = () => {
        //Read the cookie and split on "="

        if(getCookie("KVKK_AcceptSuc") == "KVKK_Kabul"){
            popUp.classList.add("hide");
            popUp.classList.remove("show");
        }
        else {
            //Show the popup
            popUp.classList.add("show");
            popUp.classList.remove("hide");
        }
        //Check for our cookie

    };
//Check if cookie exists when page loads
    window.onload = () => {
        setTimeout(() => {
            checkCookie();
        }, 2000);
    };
}

function getCookie(name) {
    function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
    return match ? match[1] : null;
}

function mahalleFiltreScroll(){
    const url = window.location.href;
    const array = url.split('/');

    const lastsegment = array[array.length-2];
    if(lastsegment == "mahalle"){
        var $container = $("html,body");
        $container.animate({scrollTop:$('.allMuhtar').offset().top},1000);
    }
}

$(document).ready(function(){
    filtre();
    selector();
    selectorMuhtar();
    formValid();
    cookie();
    mahalleFiltreScroll();
    $('.icon-scroll').on('click',function (e){
        var $container = $("html,body");
        $container.animate({scrollTop:$('.scrollby').offset().top - 40},500);
    });
    $('.highlight').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow:"<span class='a-left control-c prev slick-prev'></span>",
        nextArrow:"<span class='a-right control-c next slick-next'></span>",
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 705,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    setTimeout(function (){
        $('.layer2').addClass('activeLayer');
        $('.layer3').addClass('activeLayer');
        $('.bigText h1').addClass('activeSection');
        $('.bigText h1 span').addClass('activeSection');
        $('.layer1').addClass('activeSectionOp');
    },500);
    setTimeout(function (){
        $('.socials').addClass('activeSectionOp');
    },1200);
    setTimeout(function (){
        $('.mouseIcon').addClass('activeSectionOp');
    },1500);
});