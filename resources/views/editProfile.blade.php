<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Profile with overview and edit - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('CSS/editProfile.css') }}" rel="stylesheet">
    <link href="{{ asset('CSS/mainPage.css') }}" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

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
                        <div class="cover-body2 d-flex justify-content-between align-items-center">
                            <div>
                                <img class="profile-pic" src="{{ asset($user->image_path) }}" alt="profile">
                                <span class="profile-name">{{ $user->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="page-profile">
        <div class="row">
            <!-- COL 1 -->
            <div class="col-md-3">
                <section class="panel">
                    <div class="panel-body noradius padding-10">
                        <figure class="margin-bottom-10"><!-- image -->
                            <img class="img-responsive" src="{{ asset($user->image_path) }}" alt="">
                        </figure><!-- /image -->


                        <!-- updated -->
                        <ul class="list-unstyled size-13">
                            <li class="text-gray"><b>Name: </b>{{ $user->name }}</li>
                            <li class="text-gray"><b>Email: </b>{{ $user->email }}</li>
                            <li class="text-gray"><b>Role: </b>{{ $user->role }}</li>
                        </ul><!-- /updated -->

                    </div>
                </section>
            </div><!-- /COL 1 -->

            <!-- COL 2 -->
            <div class="col-md-5">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="tabs white nomargin-top">
                    <ul class="nav nav-tabs tabs-primary">

                        <li>
                            Edit
                        </li>
                    </ul>

                    <!-- <div class="tab-content"> -->



                    <!-- Edit -->
                    <div id="edit" class="tab-pane">

                        <form class="form-horizontal padding-10" method="post" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')


                            <h4>Change Personal Information</h4>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Email</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                            </fieldset>


                            <hr>

                            <h4>Change profile image</h4>
                            <fieldset class="mb-xl">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileImage">Choose image</label>
                                    <div class="col-md-8">
                                        <input type="file" accept="image/*" class="form-control" name="profileImage" id="profileImage">
                                    </div>
                                </div>
                            </fieldset>


                            <hr>

                            <h4>Change Password</h4>
                            <fieldset class="mb-xl">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="password" id="profileNewPassword">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="password_confirmation" id="profileNewPasswordRepeat">
                                    </div>
                                </div>
                            </fieldset>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-9 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('dashboard') }}">Home</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div><!-- /COL 2 -->

    </div>
</div>
</div>


<script type="text/javascript">


</script>
</body>
</html>
