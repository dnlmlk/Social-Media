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

    <div class="page-profile">
        <div class="">


            <!-- COL 2 -->
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="tabs white nomargin-top d-flex justify-content-center">
                    <ul class="nav nav-tabs tabs-primary">

                        <li>
                            Add Post
                        </li>
                    </ul>

                    <!-- <div class="tab-content"> -->



                    <!-- Edit -->
                    <div id="edit" class="tab-pane">

                        <form class="form-horizontal padding-10" method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf

                            <h4>Post's image</h4>
                            <fieldset class="mb-xl">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="postImage">Choose image</label>
                                    <div class="col-md-8">
                                        <input type="file" accept="image/*" class="form-control" name="postImage" id="postImage">
                                    </div>
                                </div>
                            </fieldset>


                            <hr>

                            <h4>Post's content</h4>
                            <fieldset class="mb-xl">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="postContent">Content</label>
                                    <div class="col-md-8">
                                        <textarea type="text" class="form-control" name="postContent" id="postContent">

                                        </textarea>
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

                            <div class="row mt-5">
                                <div class="col-md-12 col-md-offset-5 mt-5">
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
