$(document).ready(function() {
    $('#submit_article').click(function() {
        var conf = confirm('Anda tidak akan bisa melakukan perubahan isi cerita setelah cerita ini terkirim.\n\nApakah Anda ingin melanjutkan ?');
        if (conf) {
            $('#create_article').validate({
                ignore: [],
                rules: {
                    article_title: {
                        required: true
                    },
                    article_body: {
                        required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                            return editorcontent.length === 0;
                        },
                        minlength: 1500
                    },
                    article_desc: {
                        required: true
                    },
                    category_id: {
                        required: true
                    },
					provider: {
                        required: true
                    },
					usage: {
                        required: true
                    }
                },
                messages: {
                }
            });
        }
    });
});