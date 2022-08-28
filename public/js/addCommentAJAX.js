$(document).ready(function (){
    let lastID = ($('#lastID').val())

    for (let i = 0; i <= lastID+1 ; i++) {

        $(document).on('click', `#post-comment${i}`, function () {
            let postId = i;
            let message = $(`#comment-message${i}`).val();

            $.ajax({
                url: 'comment/ajax/comment',
                type: "get",
                data: {
                    post_id:postId,
                    message:message
                },
                success: function(response){ // What to do if we succeed
                    console.log(response)
                    $(`#comment-card${postId}`).html(response);
                }
            });

        })
    }
});
