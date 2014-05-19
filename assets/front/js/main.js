// JavaScript Document

$(document).ready(function(){
	var navTotal = $('ul#nav li').length;
	$('ul#nav').css('width', 70*navTotal);
	$('ul#nav li:last-child').addClass('last');
	
	
	
	$('.tab-nav a').click(function(e){
		e.preventDefault();
		
		$('.tab-nav a').removeClass('current');
		
		var w = $(this).parent().width();
		var index = $(this).index();
		
		$(this).addClass('current');
		$('.tab-wrapper').css('left', -w*index);
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
                } else if (size >= 3) {
                    alert('the image size must <= 3MB');
                    $(test).val('');
                }
            };
            image.src = _URL.createObjectURL(file);
        }

    });
})



//-------------------- Like Method --------------------------//


function processLike(){
	var d = new Date();
	var expireDays = 60;
	d.setTime(d.getTime()+(expireDays*24*60*60*1000));
	var expires = "expires="+d.toGMTString();
	
	var artID = parseInt($('#like-button').attr('data-article_id'));

	var url = siteURL + 'front/set_favorite/' + artID;
	$.ajax({
		type: 'POST',
		url: url,
		processData: false,
		contentType: false,
		dataType: 'json',
		success: function(respond) {
			if(respond.status){
				$('#like-button').attr('disabled', true).addClass('liked').html('Favorite');
			}
		}
	});
}