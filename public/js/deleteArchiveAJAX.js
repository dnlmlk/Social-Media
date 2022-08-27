$(document).ready(function (){
    let lastID = ($('#lastID').val())

    for (let i = 0; i <= lastID+1 ; i++) {

        $(document).on('click', `#delete${i}`, function () {
            let postId = i;

            $.ajax({
                url: 'save/ajax/delete',
                type: "get",
                data: {post_id:postId},
                success: function(response){ // What to do if we succeed
                    console.log(response)
                    if (response['message'] == 'success'){
                        $(`#post-card${postId}`).css('display', 'none');
                        console.log('yes')
                    }
                }
            });

        })
    }
});
