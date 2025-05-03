@extends('admin.layouts')

@push('styles')
    <!-- CropperJS -->
    <link href="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet" />
    <style>
        .card {
            border-radius: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            font-weight: bold;
        }

        .img-preview {
            width: 40%;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 0.5rem;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-4">
        <div class="card p-4">
            <h4 class="mb-4">Add ID Information</h4>

            <form method="POST" action="{{ route('nid.store') }}">
                @csrf
                <div class="row g-3">
                    <!-- Name fields -->
                    <div class="col-md-6">
                        <label class="form-label">Name (বাংলা)</label>
                        <input type="text" name="name_bangla" value="{{ old('name_bangla') }}"
                            class="form-control SutonnyMJ">
                        @error('name_bangla')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Name (English)</label>
                        <input type="text" name="name_english" value="{{ old('name_english') }}" class="form-control">
                        @error('name_english')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                        <p>
                            <input type="checkbox" name="isCapitalLetter" id="isCapital">
                            <span>সব বড় হাতের</span>
                        </p>

                    </div>

                    <!-- Father's Name -->
                    <div class="col-md-6">
                        <label class="form-label">Father's Name (বাংলা)</label>
                        <input type="text" name="fathers_name_bn" value="{{ old('fathers_name_bn') }}"
                            class="form-control SutonnyMJ">
                        @error('fathers_name_bn')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Father's Name (English)</label>
                        <input type="text" name="fathers_name_en" value="{{ old('fathers_name_en') }}"
                            class="form-control">
                        @error('fathers_name_en')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>

                    <!-- Mother's Name -->
                    <div class="col-md-6">
                        <label class="form-label">Mother's Name (বাংলা)</label>
                        <input type="text" name="mothers_name_bn" value="{{ old('mothers_name_bn') }}"
                            class="form-control SutonnyMJ">
                        @error('mothers_name_bn')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mother's Name (English)</label>
                        <input type="text" name="mothers_name_en" value="{{ old('mothers_name_en') }}"
                            class="form-control">
                        @error('mothers_name_en')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control">
                        @error('date_of_birth')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ID Number</label>
                        <input type="text" name="id_no" value="{{ old('id_no') }}" class="form-control">
                        @error('id_no')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Blood Group</label>
                        <select name="blood_group" class="form-select">
                            <option value="">Select</option>
                            @foreach ($bloodsgroup as $b)
                                <option value="{{ $b->id }}" {{ old('blood_group') == $b->id ? 'selected' : '' }}>
                                    {{ $b->name }}</option>
                            @endforeach
                        </select>
                        @error('blood_group')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>

                    <!-- NID Photo Upload -->
                    <div class="col-md-6">
                        <label class="form-label">NID Photo</label>
                        <input type="file" id="photoInput" class="form-control" accept="image/*">
                        <input type="hidden" name="nid_photo" id="nidPhotoData">
                        <img src="{{ asset('images/user.jpg') }}" id="photoPreview" class="img-preview"
                            alt="Photo Preview">
                        @error('nid_photo')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>

                    <!-- Signature Upload -->
                    <div class="col-md-6">
                        <label class="form-label">Signature</label>
                        <input type="file" id="signatureInput" class="form-control" accept="image/*">
                        <input type="hidden" name="signature" id="signatureData">
                        <img src="{{ asset('images/sig.png') }}" id="signaturePreview" class="img-preview"
                            alt="Signature Preview">

                        @error('signature')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>

                    <!-- Address and District -->
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <textarea class="form-control SutonnyMJ" name="address" rows="3">{{ old('address') }}</textarea>
                        @error('address')
                            <em class="text-danger">{{ $message }}</em>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">District</label>
                        <input type="text" name="district" class="form-control SutonnyMJ">
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-4">Save ID Info</button>
            </form>
        </div>
    </div>

    <!-- Cropper Modal -->
    <div class="modal fade" id="cropModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Crop NID Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="cropImage" style="max-width: 100%; max-height: 500px;">
                </div>
                <div class="modal-footer">
                    <button type="button" id="cropConfirm" class="btn btn-primary">Crop & Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CropperJS -->
    <script src="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.js"></script>

    <script>
        let cropper, selectedType;

        function readAndShowCropModal(input, type) {
            selectedType = type;
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#cropImage').attr('src', e.target.result);
                $('#cropModal').modal('show');
            };
            if (file) reader.readAsDataURL(file);
        }

        $('#photoInput').on('change', function() {
            readAndShowCropModal(this, 'photo');
        });

        $('#signatureInput').on('change', function() {
            readAndShowCropModal(this, 'signature');
        });

        $('#cropModal').on('shown.bs.modal', function() {
            if (cropper) cropper.destroy();
            cropper = new Cropper(document.getElementById('cropImage'), {
                aspectRatio: selectedType === 'photo' ? 53 / 61 : 6 / 1.7,
                viewMode: 1,
            });
        });

        $('#cropConfirm').on('click', function() {
            const canvas = cropper.getCroppedCanvas({
                width: selectedType === 'photo' ? 212 : 150,
                height: selectedType === 'photo' ? 242 : 35,
            });

            const base64 = canvas.toDataURL('image/png');

            if (selectedType === 'photo') {
                $('#photoPreview').attr('src', base64);
                $('#nidPhotoData').val(base64);
            } else {
                $('#signaturePreview').attr('src', base64);
                $('#signatureData').val(base64);
            }

            cropper.destroy();
            $('#cropModal').modal('hide');
        });
    </script>
@endpush
