// JavaScript Document




$(document).ready(function() {
    var navTotal = $('ul#nav li').length;
    $('ul#nav').css('width', 70 * navTotal);
    $('ul#nav li:last-child').addClass('last');



    $('.tab-nav a').click(function(e) {
        e.preventDefault();

        //var activeTab = $('.tab-nav a.current').attr('href');
        //var clickedTab = $(this).attr('href');

        $('.tab-nav a').removeClass('current');

        var w = $(this).parent().width();
        var index = $(this).index();

        $(this).addClass('current');

        //$(activeTab).hide().removeClass('active');
        //$(clickedTab).show().addClass('active');
        $('.tab-wrapper').css('left', -w * index);
    })


    var _URL = window.URL || window.webkitURL;

    $(".article_pic").change(function(e) {

        var image, file = this.files[0];
        var MB = 1024 * 1024;
        var size = (file.size / MB).toFixed(2);
        var test = this;

        if (file) {

            image = new Image();

            image.onload = function() {
                var width = this.width;
                var height = this.height;
                var widthRule = 500;
                var heightRule = 375;
                if ((width <= widthRule && height <= heightRule)) {
                    alert('the image width must >= ' + widthRule + 'px and height must >= ' + heightRule + 'px');
//                    $(test).val('');
//                    $(fileValue).html('');
//                    $(fileIcon).css('display', 'none');
//                    $(fileBtnNew).css('display', 'initial');
//                    $(fileBtnChange).css('display', 'none');
                } else if (size >= 3) {
                    alert('the image size must <= 3MB');
                    $(test).val('');
//                    $(fileValue).html('');
//                    $(fileIcon).css('display', 'none');
//                    $(fileBtnNew).css('display', 'initial');
//                    $(fileBtnChange).css('display', 'none');
                }
            };
            image.src = _URL.createObjectURL(file);
        }

    });


    //$(window).scroll(function() {
//
//        var length = $('#article').height();
//        var bottom = $('body').height() - (length + $('#article').offset().top);
//        var scroll = $(this).scrollTop();
//        var windowHeight = $(this).height();
//        var trigger = scroll + windowHeight - (bottom + $('#article').offset().top);
//        var id = $('#article').attr('data-val');
//        var url = siteURL + 'front/view_counter/' + id;
//        
//		if (length === trigger) {
//            alert('youve got the bottom of article');
//            $.ajax({
//                type: 'POST',
//                url: url,
//                cache: false,
//                async: false,
//                success: function(data) {
//					
//                },
//                error: function(data) {
////                        alert(JSON.stringify(data));
//                }
//            });
//        }
//    });
})



//-------------------- Like Method --------------------------//

function checkCookie(artID) {
    var likedArticles = new Array();
    if (getCookie("liked") != null) {
        likedArticles = getCookie("liked");
    }

    if ($.inArray(artID, likedArticles) > -1) {
        $('#like-button').attr('disabled', true).addClass('liked').html('Favorite');
    }
}


function processLike() {
    var d = new Date();
    var expireDays = 60;
    d.setTime(d.getTime() + (expireDays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();

    var artID = parseInt($('#like-button').attr('data-article_id'));

    var likedArticles = new Array();
    if (getCookie("liked") != null) {
        likedArticles = getCookie("liked");
    }

    likedArticles.push(artID);


    var url = siteURL + 'front/like_counter/' + artID;
    $.ajax({
        type: 'POST',
        url: url,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(respond) {
            if (respond.status) {
                $('#like-button').attr('disabled', true).addClass('liked').html('Favorite');
                document.cookie = "liked=" + JSON.stringify(likedArticles);
                +"; expires=" + expires + "; path=/";
            }
        }
    });


}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    var jsonSTR;

    for (var i = 0; i < ca.length; i++) {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0) {
            if (c.substring(name.length, c.length) != '' || c.substring(name.length, c.length) != null) {
                jsonSTR = c.substring(name.length, c.length);
            }
        }
    }

    if (jsonSTR != null) {
        return JSON.parse(jsonSTR);
    } else {
        return null;
    }
}

//-------------------------------------------------//