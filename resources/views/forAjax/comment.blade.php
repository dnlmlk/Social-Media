<input id="comment-card-status{{ $post->id }}" type="hidden" value="block">
@if(count($post->comments->toArray()) != '0')
    <div class="conversation-content ">
        <div class="slimScrollDiv bg-dark p-2 rounded-lg" style="position: relative; overflow: auto; with: auto; max-height: 220px">
            <div class="conversation-inner" style="overflow: hidden; width: auto; height: auto;">

                @foreach($post->comments->sortByDesc('created_at') as $comment)
                    <div class="conversation-item item-left clearfix">
                        <div class="conversation-user">
                            <img src="{{ asset($comment->user->image_path) }}" class="img-xs2 rounded-circle"  alt="">
                        </div>
                        <div class="conversation-body">
                            <div class="name">
                                {{ $comment->user->name }}
                            </div>
                            <div class="time hidden-xs">
                                {{ $comment->created_at->isoFormat('D/M/Y') }}
                            </div>
                            <div class="text">
                                {{ $comment->message }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div>
            <div class="slimScrollRail" style="width: 7px; height: 50%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div>
        </div>
    </div>
@endif
<div class="conversation-new-message bg-danger mt-2 p-3 rounded-lg">

    <div class="form-group">
        <textarea id="comment-message{{ $post->id }}" name="comment" class="form-control" rows="2" placeholder="Enter your message..."></textarea>
    </div>

    <div class="clearfix">
        <a id="post-comment{{ $post->id }}" class="btn btn-success pull-right">Send message</a>
    </div>

</div>
