$(document).ready(function() {
    $('#approve_article').click(function() {
        var conf = confirm('Are you sure ?');
        var ini = $(this);
        var id = ini.attr('data-val');
        var stat = 'approved';
        if (conf) {
            $.post(siteURL + '/article/update_status/', {
                id: id,
                stat: stat
            })
                    .done(function(data) {
                        if (data === 'success') {
                            ini.remove();
                            $('#reject_article').remove();
                            $('#article_status').prepend(
                                    $('<a>' + stat + '</a>')
                                    .addClass('btn btn-info btn-squared btn-lg disabled')
                                    );
                            $(function() {
                                setTimeout(function() {
                                    $.bootstrapGrowl("Artikel telah di approved");
                                });
                            });
                        } else {
                            $(function() {
                                setTimeout(function() {
                                    $.bootstrapGrowl("Artikel gagal di approved");
                                });
                            });
                        }
                    });
        }
    });
    $('#reject_article').click(function() {
        var conf = confirm('Are you sure ?');
        var ini = $(this);
        var id = ini.attr('data-val');
        var stat = 'rejected';
        if (conf) {
            $.post(siteURL + '/article/update_status/', {
                id: id,
                stat: stat
            })
                    .done(function(data) {
                        if (data === 'success') {
                            ini.remove();
                            $('#approve_article').remove();
                            $('#article_status').prepend(
                                    $('<a>' + stat + '</a>')
                                    .addClass('btn btn-info btn-squared btn-lg disabled')
                                    );
                            $(function() {
                                setTimeout(function() {
                                    $.bootstrapGrowl("Artikel telah di reject");
                                });
                            });
                        } else {
                            $(function() {
                                setTimeout(function() {
                                    $.bootstrapGrowl("Artikel gagal di reject");
                                });
                            });
                        }
                    });
        }
    });
});