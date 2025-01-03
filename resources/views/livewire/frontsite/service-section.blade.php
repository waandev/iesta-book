<div>
    <!-- ======= Services Section ======= -->
    <section id="service" class="section-services section-t8">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-box-d">
                        <h2 class="title-d">Service</h2>
                    </div>
                </div>
            </div>
            <div class="text-justify">
                <p class="color-text-a">
                    In line with its missions, IESTA provide the following services:
                </p>
                <ol>
                    <li>Providing consultancy for educational program development with quality assurance and quality
                        control management and with continuous improvement supports.</li>
                    <li>Conducting community development programs especially the implementation of the programs in rural
                        areas.</li>
                    <li>Dissemination of sciences, technologies and arts.</li>
                    <li>Program development to support traditional cultures to face science and technology progressive
                        and keep both in harmony.</li>
                    <li>Awarding scholarship for talented young generation (IESTA Scholarship Program). This program
                        will be implemented in the future.</li>
                </ol>
                <p class="color-text-a">
                    Filling field:
                </p>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="service-form" action="{{ route('sendEmail') }}" method="post">
                                @csrf
                                <input type="hidden" name="type" value="service">
                                <div class="row">
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
                                            <input name="email" type="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="institution" id="institution"
                                                class="form-control @error('institution') is-invalid @enderror"
                                                placeholder="Institution" required>

                                            @error('institution')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <textarea class="form-control @error('messages') is-invalid @enderror" id="messages" name="messages" cols="45"
                                                rows="8" placeholder="Message" required></textarea>

                                            @error('messages')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <input type="hidden" name="g-recaptcha-response"
                                                id="g-recaptcha-response-service">
                                            @if ($errors->has('g-recaptcha-response'))
                                                <p style="font-style: bold; color: red;">
                                                    {{ $errors->first('g-recaptcha-response') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-a">{{ __('Send Message') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section><!-- End Services Section -->
</div>
