$(document).ready(function (){
    let lastID = ($('#lastID').val())

    for (let i = 0; i <= lastID+1 ; i++) {

        $(document).on('click', `#like${i}`, function () {
            let postId = i;

            $.ajax({
                url: 'like/ajax/like',
                type: "get",
                data: {post_id:postId},
                success: function(response){ // What to do if we succeed
                    console.log(response)
                    $(`#features${postId}`).html(response);
                }
            });

        })
    }
});
