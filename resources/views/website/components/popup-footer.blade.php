<!-- popup call back Modal -->
<div class="modal fade" id="popupCallModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="dialog" aria-modal="true" aria-labelledby="popupCallModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="popupCallModalLabel">Book a Home Visit Now !</h2>
                <button type="button" id="popupClose" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="alertBox1"></div>
                <form id="bookingForm1" method="POST" action="{{ route('book.test') }}">
                    @csrf

                    <div class="form-group position-relative ">
                        <span class="popupicon"><i class="fa fa-user"></i></span>
                        <input class="form-control" style="padding-left: 45px;" type="text" id="name1" name="name"
                            placeholder="Enter Name" required>
                    </div>

                    <div class="form-group position-relative ">

                        <input class="form-control " style="padding-left : 55px !important;" type="tel" id="mobile1"
                            name="mobile" placeholder="Enter Mobile No." required>
                    </div>


                    <input type="hidden" name="source" value="modal_homepage">

                    <div class="form-group ">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                            data-callback="footerCaptcha"></div>
                    </div>
                    <button type="submit" id="bookingSubmit1" class="theme-button style-1 w-100" disabled>
                        <span data-text="Submit">Submit</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>


                </form>
            </div>
        </div>
    </div>
</div>