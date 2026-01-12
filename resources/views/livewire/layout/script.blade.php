<!-- latest jquery-->
<script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets/vendor/bootstrap/bootstrap.bundle.min.js')}}"></script>

<!-- Simple bar js-->
<script src="{{asset('assets/vendor/simplebar/simplebar.js')}}"></script>

<!-- phosphor js -->
<script src="{{asset('assets/vendor/phosphor/phosphor.js')}}"></script>

<!-- Customizer js-->
<script src="{{asset('assets/js/customizer.js')}}"></script>

<!-- prism js-->
<script src="{{asset('assets/vendor/prism/prism.min.js')}}"></script>

<!-- App js-->
<script src="{{asset('assets/js/script.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--customizer-->
<div id="customizer"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const body = document.body;

        // Force the class to be exactly "ltr dark" on initial load.
        body.className = 'ltr dark';

        // Optional: MutationObserver to monitor and enforce "ltr dark".
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class' && body.className !== 'ltr dark') {
                    body.className = 'ltr dark';
                }
            });
        });

        observer.observe(body, { attributes: true, attributeFilter: ['class'] });

        // Optional: prevent other javascript from changing the class.
        const originalSetAttribute = body.setAttribute;
        body.setAttribute = function(name, value) {
            if (name === 'class') {
                originalSetAttribute.call(this, 'class', 'ltr dark');
            } else {
                originalSetAttribute.call(this, name, value);
            }
        };
    });
</script>
