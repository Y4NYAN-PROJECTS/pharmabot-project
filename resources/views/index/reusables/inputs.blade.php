<div class="col-12">
    <div class="form-group position-relative has-icon-left mb-3">
        <input type="text" class="form-control form-control-lg @error('school_id') is-invalid @enderror" name="school_id" value="{{ old('school_id') }}" placeholder="School ID">
        <div class="form-control-icon">
            <i class="bi bi-person-vcard"></i>
        </div>

        @error('school_id')
            <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-12">
    <div class="form-group position-relative has-icon-left mb-3">
        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>

        @error('password')
            <div class="invalid-feedback">
                <i class="bx bx-radio-circle"></i>
                {{ $message }}
            </div>
        @enderror
    </div>
</div>