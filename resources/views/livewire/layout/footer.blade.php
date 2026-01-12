<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 col-12">
                <ul class="footer-text">
                    <li>
                        <p class="mb-0">
                            Copyright � {{ date('Y') }} {{ env('APP_NAME', 'cyclux') }}. All rights reserved
                        </p>
                    </li>
                    <li>
                        <a href="#"> {{ env('APP_VERSION', 'V1.0.0') }} </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer-text text-end">
                    <li>
                        <a href="{{ env('APP_HELP_DOCUMENT_URL', 'document.html') }}"> Need Help <i class="ti ti-help"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
