<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Archived Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('CSS/mainPage.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>

<div class="container">

    <div class="profile-page tx-13">
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="profile-header">
                    <div class="cover">
                        <div class="gray-shade"></div>
                        <figure>
                            <img src="https://bootdey.com/img/Content/bg1.jpg" alt="profile cover" style="height: 250px">
                        </figure>
                        <div class="cover-body d-flex justify-content-between align-items-center">
                            <div>
                                <img class="profile-pic" src="{{ asset($user->image_path) }}" alt="profile">
                                <span class="profile-name">{{ $user->name }}</span>
                            </div>
                            <div class="d-none d-md-block">
                                <a href="{{ route('profile.index') }}" class="btn btn-primary btn-icon-text btn-edit-profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit btn-icon-prepend">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg> Edit profile
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-links">
                        <ul class="links d-flex align-items-center mt-3 mt-md-0">

                            <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="mr-1 bi bi-house-door" viewBox="0 0 16 16">
                                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                                </svg>
                                <a class="pt-1px d-none d-md-block" href="{{ route('dashboard') }}">Home</a>
                            </li>

                            <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class=" bi bi-box-arrow-left" viewBox="0 0 16 16" >
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                    </svg>
                                    <button class="btn" type="submint">Logout</button>
                                </form>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row profile-body justify-content-center">
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
                <div class="row">

                    <form method="get">

                        <input type="hidden" id="lastID" name="lastID" value="{{ \App\Models\Post::all()->sortByDesc('id')->first()?->id }}">

                        @foreach($posts as $post)
                            <div id="post-card{{ $post->id }}" class="col-md-12 grid-margin">
                                <div class="card rounded">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="img-xs rounded-circle" src="{{ asset($post->user->image_path) }}" alt="">
                                                <div class="ml-2">
                                                    <p>{{ $post->user->name }}</p>
                                                    @php($time = \Carbon\Carbon::now())
                                                    <p class="tx-11 text-muted">{{ $time->diffInMinutes(\Carbon\Carbon::create($post->created_at)) }} minutes ago</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <p class="mb-3 tx-14">{{ $post->content }}</p>
                                        <img class="img-fluid" src="{{ asset($post->image_path) }}" alt="">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex post-actions" id="features{{ $post->id }}">

                                            <a id="delete{{ $post->id }}"  class="btn d-flex align-items-center text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="remove-post bi bi-file-earmark-minus" viewBox="0 0 16 16">
                                                    <path d="M5.5 9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                                                </svg>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </form>

                </div>
            </div>
            <!-- middle wrapper end -->
        </div>
    </div>
</div>

<script src="{{ asset('js/deleteArchiveAJAX.js') }}"></script>
<script type="text/javascript">

</script>
</body>
</html>
