<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

   
  </head>
  <body>
      <div class="container pt-3">
          <form action="{{route('add_registration')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-xl-8 m-auto">
                      <div class="card shadow">
                          <div class="card-body pl-4 pr-4">
                            <h2>User Registration:</h2>
                            {{-- <div class="row"> --}}
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="firstName"> First Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
                                    </div>
                                    @if ($errors->has('firstname'))
                                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
                                    @endif
                                </div>
                               

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="lastName"> Last Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
                                    </div>
                                    @if ($errors->has('lastname'))
                                    <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                           

                            
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="email"> Email <span class="text-danger">*</span> </label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="phone"> Phone <span class="text-danger">*</span> </label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                                    </div>
                                    @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="password"> Password <span class="text-danger">*</span> </label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="address"> Address <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                    </div>
                                    @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="address"> Profile <span class="text-danger">*</span></label>
                                        <input type="file" name="profile" id="profile" class="form-control">
                                    </div>
                                    @if ($errors->has('profile'))
                                    <span class="text-danger">{{ $errors->first('profile') }}</span>
                                    @endif
                                </div>
                            <div class="row">
                                <div class="col-xl-6 offset-lg-6 text-right">
                                    <button type="submit" class="btn btn-success"> Create your account </button>
                                </div>
                            </div>

                       </div>
                    </div>
                </div>
            </div>
          </form>
      </div>
      
    
</body>
</html>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
