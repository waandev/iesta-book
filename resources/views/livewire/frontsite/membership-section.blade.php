<div>
    <!-- ======= Membership Section ======= -->
    <section id="membership" class="section-services section-t3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box-d">
                        <h2 class="title-d">Membership</h2>
                    </div>
                </div>
            </div>
            <div class="text-justify">
                <p class="color-text-a">
                    Becoming an IESTA membership is free of charge. Once registered as IESTA membership, you do not also
                    need to extend you membership. As IESTA member you can be also affiliated as a member of Society of
                    Renewable Energy Systems, Power Plant and Electric Vehicles Technology (SO-RESPECT). Please fill out
                    the following field to register as IESTA membership!
                </p>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="membership-form" action="{{ route('sendEmail') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="type" value="membership">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <select name="title" id="title"
                                                class="form-select @error('title') is-invalid @enderror">
                                                <option value="" selected disabled>-- Select Title --</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>
                                            </select>

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <select name="degree" id="degree"
                                                class="form-select @error('degree') is-invalid @enderror">
                                                <option value="" selected disabled>-- Select Highest Degree --
                                                </option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Bachelor">Bachelor</option>
                                                <option value="Master">Master</option>
                                                <option value="Doctor">Doctor</option>
                                            </select>

                                            @error('degree')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <select name="institution" id="institution"
                                                class="form-select @error('institution') is-invalid @enderror">
                                                <option value="" selected disabled>-- Select Current Institution
                                                    --</option>
                                                <option value="School">School</option>
                                                <option value="Company">Company</option>
                                                <option value="University">University</option>
                                                <option value="Academy">Academy</option>
                                                <option value="Polytechnique">Polytechnique</option>
                                                <option value="NGO">NGO</option>
                                                <option value="Military">Military</option>
                                                <option value="Others">Others</option>
                                            </select>

                                            @error('institution')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <select name="field" id="field"
                                                class="form-select @error('field') is-invalid @enderror">
                                                <option value="" selected disabled>-- Select Field of Work/Study
                                                    --</option>
                                                <option value="Agriculture">Agriculture</option>
                                                <option value="Culture">Culture</option>
                                                <option value="Dentistry">Dentistry</option>
                                                <option value="Economy">Economy</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Forestry">Forestry</option>
                                                <option value="Linguistic">Linguistic</option>
                                                <option value="Law">Law</option>
                                                <option value="Marine Science">Marine Science</option>
                                                <option value="Medical Science">Medical Science</option>
                                                <option value="Natural Science & Mathematic">Natural Science &
                                                    Mathematic</option>
                                                <option value="Sociology & Politic">Sociology & Politic</option>
                                                <option value="Humanity Science">Humanity Science</option>
                                            </select>

                                            @error('field')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Name" required>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input name="current_institution" id="current_institution" type="text"
                                                class="form-control @error('current_institution') is-invalid @enderror"
                                                placeholder="Name of Current Institution" required>

                                            @error('current_institution')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="position" id="position"
                                                class="form-control @error('position') is-invalid @enderror"
                                                placeholder="Current Job Position" required>

                                            @error('position')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input name="email" id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email Address" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select name="membership_type" id="membership_type"
                                                class="form-select @error('membership_type') is-invalid @enderror">
                                                <option value="" selected disabled>-- Select Membership --
                                                </option>
                                                <option value="Regular">Registered only as IESTA member</option>
                                                <option value="Affiliate">Registered also as member of Society of
                                                    Renewable Energy Systems, Power Plant and Electric Vehicles
                                                    Technology (SO-RESPECT)</option>
                                            </select>

                                            @error('membership_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <label for="cv" class="mb-2">
                                                You can also upload your resume/CV should you want
                                            </label>
                                            <input type="file"
                                                class="form-control @error('cv') is-invalid @enderror" id="cv"
                                                name="cv">

                                            @error('cv')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group">
                                            <input type="hidden" name="g-recaptcha-response"
                                                id="g-recaptcha-response-membership">
                                            @if ($errors->has('g-recaptcha-response'))
                                                <p style="font-style: bold; color: red;">
                                                    {{ $errors->first('g-recaptcha-response') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn btn-a">{{ __('Submit') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- End Membership Section -->

</div>
