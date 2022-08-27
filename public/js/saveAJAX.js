$(document).ready(function (){
    let lastID = ($('#lastID').val())

    for (let i = 0; i <= lastID+1 ; i++) {

        $(document).on('click', `#save${i}`, function () {
            let postId = i;

            $.ajax({
                url: 'save/ajax/save',
                type: "get",
                data: {post_id:postId},
                success: function(response){ // What to do if we succeed
                    console.log(response['view'])
                    if (response['message'] == 'error'){
                        $(`#save-error`).html(response['view']);
                    }
                    else if(response['message'] == 'success'){
                        $(`#features${postId}`).html(response['view']);
                    }
                }
            });

        })
    }
});
