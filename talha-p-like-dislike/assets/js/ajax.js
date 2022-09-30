function talha_like_btn_ajax(postId,usrid){
    var post_id = postId;
    var usr_ID = usrid;

    jQuery.ajax({

        url : talha_ajax_url.ajax_url,
        type : 'post',
        data : {
            action: 'talha_like_btn_ajax_action',
            pid : post_id,
            uid : usr_ID
        },
        success : function (response){
            jQuery("#talhaAjaxResponse span"). html(response);

        }
    });
}

// function 2 for dislike

function talha_dislike_btn_ajax(postId,usrid){

    var post_id = postId;
    var usr_ID = usrid;
    jQuery.ajax({

        url : talha_ajax_url.ajax_url,
        type : 'post',
        data : {
            action: 'talha_dislike_btn_ajax_action',
            pid : post_id,
            uid : usr_ID
        },
        success : function (response){
            jQuery("#talhaAjaxResponse2 span"). html(response);
            
        }
    });
}