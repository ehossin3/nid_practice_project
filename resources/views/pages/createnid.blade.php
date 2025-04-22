@extends('layouts.app')

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
            width: 100%;
            max-height: 200px;
            object-fit: cover;
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

            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Bangla Name</label>
                        <input type="text" name="name_bangla" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">English Name</label>
                        <input type="text" name="name_english" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Father's Name</label>
                        <input type="text" name="fathers_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Mother's Name</label>
                        <input type="text" name="mothers_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">ID Number</label>
                        <input type="text" name="id_no" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Blood Group</label>
                        <select name="blood_group" class="form-select">
                            <option value="">Select</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                            <option>O+</option>
                            <option>O-</option>
                        </select>
                    </div>

                    <!-- NID Photo Upload -->
                    <div class="col-md-6">
                        <label class="form-label">NID Photo</label>
                        <input type="file" id="photoInput" class="form-control" accept="image/*">
                        <input type="hidden" name="nid_photo" id="nidPhotoData">
                        <img id="photoPreview" class="img-preview" alt="Photo Preview">
                    </div>

                    <!-- Signature Upload -->
                    <div class="col-md-6">
                        <label class="form-label">Signature</label>
                        <input type="file" id="signatureInput" class="form-control" accept="image/*">
                        <input type="hidden" name="signature" id="signatureData">
                        <img id="signaturePreview" class="img-preview" alt="Signature Preview">
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
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image</h5>
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
            cropper = new Cropper(document.getElementById('cropImage'), {
                aspectRatio: selectedType === 'photo' ? 53 / 61 : 6 / 1,
                viewMode: 1,
            });
        });

        $('#cropConfirm').on('click', function() {
            const canvas = cropper.getCroppedCanvas({
                width: selectedType === 'photo' ? 212 : 150,
                height: selectedType === 'photo' ? 242 : 25,
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
