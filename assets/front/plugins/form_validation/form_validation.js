$(document).ready(function() {
    $('#create_article').validate({
        ignore: [],
        rules: {
            article_title: {
                required: true
            },
            article_body: {
                required: true,
                minlength: 1500
            },
            article_desc: {
                required: true
            },
            category_id: {
                required: true
            }
        },
        messages: {
        }
    });
});