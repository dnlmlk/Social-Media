<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Clinic</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('CSS/managersPanel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>

<section class="vh-130 gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-10">

                <div class="card mask-custom">
                    <div class="card-body p-4 text-white">

                        <div class="text-center pt-3 pb-2">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-todo-list/check1.webp"
                                 alt="Check" width="60">
                            <h2 class="my-4">User Status</h2>
                        </div>

                        <form class="table text-white mb-0" method="post">
                            @csrf
                            @method('put')


                            <table class="table text-white mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Accessibility</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($users as $user)
                                        <tr class="fw-normal">
                                            <th>
                                                <img src="{{ asset($user->image_path) }}"
                                                     alt="avatar 1" style="width: 45px; height: auto;">
                                                <span class="ms-2">{{ $user->email }}</span>
                                            </th>
                                            <td class="align-middle">
                                                <span>{{ $user->role }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <h6 class="mb-0"><span class="badge {{ $user->is_accepted == "1" ? 'bg-success' : 'bg-danger' }}">{{ $user->is_accepted == "1" ? 'Accepted' : 'Not accepted' }}</span></h6>
                                            </td>
                                            <td class="align-middle">
{{--                                                <input type="radio" class="btn-check" id="btncheck{{ $user->email }}1" name="{{ $user->email }}" value="Confirmed">--}}
{{--                                                <label class="btn btn-outline-success bi bi-check-lg" for="btncheck{{ $user->email }}1"></label>--}}

                                                <button type="submit" class="btn btn-outline-success" formaction="{{ route('accept-users.update', $user->id) }}" name="{{ $user->id }}" value="accept">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>

{{--                                                <input type="radio" class="btn-check" id="btncheck{{ $user->email }}2" name="{{ $user->email }}" value="Not accepted">--}}
{{--                                                <label class="btn btn-outline-danger bi bi-x-lg" for="btncheck{{ $user->email }}2"></label>--}}
                                                <button type="submit" class="btn btn-outline-danger" formaction="{{ route('accept-users.update', $user->id) }}" name="{{ $user->id }}" value="notAccept">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>

                    </div>



                    <div class="m-auto">
                        <a href="{{ route('dashboard') }}"><button class="btn btn-danger rounded-3 py-2 m-2" style="padding:205px">Home</button></a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
