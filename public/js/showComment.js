$(document).ready(function (){
    let lastID = ($('#lastID').val())

    for (let i = 0; i <= lastID+1 ; i++) {

        $(document).on('click', `#comment${i}`, function () {
            let postId = i;



            if ($(`#comment-card-status${i}`).val() == 'none'){
                $(`#comment-card${i}`).css('display', 'block')
                $(`#comment-card-status${i}`).val('block')
            }

            else if ($(`#comment-card-status${i}`).val() == 'block'){
                $(`#comment-card${i}`).css('display', 'none')
                $(`#comment-card-status${i}`).val('none')
            }

        })
    }
});
