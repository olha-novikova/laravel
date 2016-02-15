/**
 * Created with JetBrains PhpStorm.
 * User: olga
 * Date: 01.10.15
 * Time: 16:44
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function(){
    var windowHeight = $(window).height();
    if( $('.banner')) $('.banner').height(windowHeight-80);
    $('.parallax').parallax();
    $('.collapsible').collapsible();
    $(".button-collapse").sideNav({
            menuWidth: 200,
            closeOnClick: true
        }
    );
    $('.dropdown-button').dropdown();
    $('.like_it').click(function(){
        var $this = $(this), $hostIP = '',$postID = '', $userID = '', $crf = '';

        $postID = parseInt( $this.find('a').data('postid') );
        $crf = $('#client_data').find('input[name=_token]').val();
        $hostIP = $('#client_data').find('input[name=client_ip]').val();

        if ($this.find('a').data('userid') ){
            $userID = parseInt( $this.find('a').data('userid') );
        }

        $.ajax({
            type: "POST",
            data:{
                post_id: $postID,
                user_id: $userID,
                host_ip: $hostIP,
                _token:  $crf
            },
            dataType:'JSON',
            url: '/like/ajax_check_like',
            success: function(response){
                $this.find('.count-likes').html(response.count);

                if(response.count > 0) {$this.find('.material-icons').addClass('active');} else {$this.find('.material-icons').removeClass('active');}
            },
            error: function(response){
                console.log('error');
            }
        });

    });
});

