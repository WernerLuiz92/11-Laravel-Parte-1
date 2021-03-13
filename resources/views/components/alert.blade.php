<div class="position-relative top-0 mt-2 me-2">
    <div class="position-absolute top-0 end-0" style="z-index: 5">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex alert-{{ $type }}">
                <div class="toast-body p-3">
                    <strong>{{ $strongMessage }}</strong> {{ $message }}
                </div>
                <button type="button" class="btn-close btn-close-grey me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>