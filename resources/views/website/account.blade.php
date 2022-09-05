@extends('website.layout')

@section('title')
    Home
@endsection

@section('name')
    My Profile
@endsection


@section('content')
    <div>
        <div id="content" class="py-4">
            <div class="container">
                <div class="row">
            
                    <!-- Left Panel
            ============================================= -->
                    <aside class="col-lg-3">
            
                        <!-- Profile Details
              =============================== -->
                        <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                            <div class="profile-thumb mt-3 mb-4"
                                style="position: relative;
            display: inline-block;">
                                <img class="rounded-circle" src="{{ asset('User_image/' . Auth::user()->image) }}"
                                    alt="" style="width: 200px;height: 200px;" id="output">
                                <div class="profile-thumb-edit bg-success  text-white"
                                    style="font-size: 22px;
              width: 37px;
              height: 37px;
              border-radius: 100%;
              position: absolute;
              overflow: hidden;
              bottom: 0px;
              right: 10px;
              display: -ms-flexbox !important;
              display: flex !important;
              -ms-flex-pack: center !important;
              justify-content: center !important;
              -ms-flex-align: center !important;
              align-items: center !important;"
                                    data-bs-toggle="tooltip" title="" data-bs-original-title="Change Profile Picture">
                                    <i class="fas fa-camera position-absolute"></i>
                                    <form action="{{ route('updateimage') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" class="custom-file-input"name="image"
                                            id="customFile"onchange="loadFile(event)">

                                </div>
                            </div>
                            <button type="submit" class="btn btn-success rounded-3 btn-sm">save change</button>
                            </form>
                            <p class="text-3 fw-500 mb-2 mt-3">Hello, {{ Auth::user()->name }}</p>
                            <p class="mb-2"><a href="settings-profile.html" class="text-5 text-light"
                                    data-bs-toggle="tooltip" title="" data-bs-original-title="Edit Profile"
                                    aria-label="Edit Profile"><i class="fas fa-edit"></i></a></p>
                        </div>
                        <!-- Profile Details End -->

                        {{-- <!-- Need Help?
                  =============================== -->
                        <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                            <div class="text-17 text-light my-3"><i class="fas fa-comments"></i></div>
                            <h3 class="text-5 fw-400 my-4">Need Help?</h3>
                            <p class="text-muted opacity-8 mb-4">Have questions or concerns regrading your account?<br>
                                Our experts are here to help!.</p>
                            <div class="d-grid"><a href="#" class="btn btn-primary">Chate with Us</a></div>
                        </div>
                        <!-- Need Help? End --> --}}

                    </aside>
                    <!-- Left Panel End -->

                    <!-- Middle Panel
            ============================================= -->
                    <div class="col-lg-9">

                        <!-- Personal Details
              ============================================= -->
                        <div class="bg-white shadow-sm rounded p-4 mb-4">
                            <h3 class="text-5 fw-400 d-flex align-items-center mb-4">Personal Details<a
                                    style="margin-left: auto;" data-effect="effect-scale" data-target="#exampleModalCenter"
                                    data-toggle="modal" href="exampleModalCenter" data-bs-toggle="modal"
                                    class="ms-auto text-2 text-uppercase btn-link"><span class="me-1 ml-100"><i
                                            class="fas fa-edit"></i></span>Edit</a></h3>
                            <hr class="mx-n4 mb-4">
                            <div class="row gx-3 align-items-center">
                                <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Name:</p>
                                <p class="col-sm-9 text-3">{{ Auth::user()->name }}</p>
                            </div>
                            <div class="row gx-3 align-items-center">
                                <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email:</p>
                                <p class="col-sm-9 text-3">{{ Auth::user()->email }}&nbsp;&nbsp; <span
                                        class="bg-success text-white rounded-pill d-inline-block px-2 mb-0"><i
                                            class="fas fa-check-circle"></i> Verified </span></p>
                            </div>
                            <div class="row gx-3 align-items-baseline">
                                <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Created_At:</p>
                                <p class="col-sm-9 text-3">{{ Auth::user()->created_at }}</p>
                            </div>
                            <div class="row gx-3 align-items-center">
                                <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Account Status:</p>
                                <p class="col-sm-9 text-3"><span
                                        class="bg-success text-white rounded-pill d-inline-block px-2 mb-0"><i
                                            class="fas fa-check-circle"></i> Active </span></p>
                            </div>
                        </div>
                        <!-- Personal Details
              ============================================= -->

                             <!-- change password account
              ============================================= -->
              <div class="bg-white shadow-sm rounded p-4 mb-4">
              <h3 class="text-5 fw-400 d-flex align-items-center mb-4">Change Your Password <button
                                    type="button" class="btn btn-warning" style="margin-left: auto;" data-toggle="modal"
                                    data-target="#changeModalCenter">Change</button></h3>
            </div>
                 
                        <!-- delete account
              ============================================= -->
                        <div class="bg-white shadow-sm rounded p-4 mb-4">
                            <h3 class="text-5 fw-400 d-flex align-items-center mb-4">Delete Your Account <button
                                    type="button" class="btn btn-danger" style="margin-left: auto;" data-toggle="modal"
                                    data-target="#exampleModalCenter2"> Delete </button></h3>
                        </div>
                        <!-- delete account Details Modal
              ================================== -->
                         <!-- changeModalCenter 
              ================================== -->
              <div id="changeModalCenter" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-400">Change Password</h5>

                                    </div>
                                    <div class="modal-body p-4">
                                    <form id="personaldetails" method="post" action="{{ route('change-password') }}">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12 col-sm-12">
                                                    <label for="firstName" class="form-label">Password</label>
                                                    <input type="password"class="form-control @error('new_password') is-invalid @enderror" data-bv-field="password" id="password" required=""name="new_password" placeholder="new_password">
                                                </div>
                                                <div class="col-12 "style="margin-top:20px">
                                                <label for="birthDate" class="form-label">Confirm Password</label>
                                                    <div class="position-relative">
                                                        <input id="birthDate"
                                                            type="password" class="form-control" required=""
                                                            placeholder="confirm-password"name="new_password_confirmation"id="confirmNewPasswordInput">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4 d-grid">
                                            <button class="btn btn-primary"type="submit">Save Changes</button>
                                         </div>
                                    </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- delete Addresses End -->
                        <div id="exampleModalCenter2" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-400">Delete Account</h5>

                                    </div>
                                    <div class="modal-body p-4">
                                        <form id="emailAddresses" method="post"action="{{ route('destroyAccount') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="emailID2" class="form-label">Do You want to Delete your Account
                                                </label>
                                                <div class="input-group">
                                                </div>
                                            </div>
                                            <div class="d-grid"><button class="btn btn-danger"
                                                    type="submit">Delete</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Email Addresses End -->
                        <!-- Edit Details Modal
              ================================== -->
                        <div id="exampleModalCenter" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-400">Personal Details</h5>

                                    </div>
                                    <div class="modal-body p-4">
                                        <form id="personaldetails" method="post" action="{{ route('updateAccount') }}">
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}"name="id">
                                            <div class="row g-3">
                                                <div class="col-12 col-sm-12">
                                                    <label for="firstName" class="form-label">Name</label>
                                                    <input type="text" value="{{ Auth::user()->name }}"
                                                        class="form-control" data-bv-field="firstName" id="firstName"
                                                        required=""name="name" placeholder="Name">
                                                </div>

                                                <div class="col-12 "style="margin-top:20px">
                                                    <label for="birthDate" class="form-label">Email</label>
                                                    <div class="position-relative">
                                                        <input id="birthDate" value="{{ Auth::user()->email }}"
                                                            type="email" class="form-control" required=""
                                                            placeholder="Email"name="email">

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 mt-4 d-grid"><button class="btn btn-primary"
                                                    type="submit">Save Changes</button></div>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Personal Details End -->


                </div>
            </div>
        </div>
    </div>
@endsection