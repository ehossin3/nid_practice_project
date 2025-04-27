@extends('admin.layouts')

@push('styles')
    <style>
        .voter-card {
            max-width: 700px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            font-family: 'Segoe UI', sans-serif;
        }

        .voter-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .voter-header h2 {
            font-weight: bold;
            color: #2d3748;
        }

        .voter-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .voter-info label {
            font-weight: bold;
            color: #4a5568;
        }

        .photo-signature {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            gap: 10px
        }

        .photo-signature img {
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 50%;
        }

        .generate-btn {
            margin-top: 30px;
            text-align: center;
        }

        .generate-btn button {
            padding: 10px 20px;
            background-color: #38bdf8;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
        }

        .generate-btn button:hover {
            background-color: #0ea5e9;
        }
    </style>
@endpush

@section('content')
    <div class="voter-card">
        <div class="voter-header">
            <h2>ভোটার পরিচিতি</h2>
        </div>

        <div class="voter-info">
            <div>
                <label>নাম (বাংলা):</label>
                <p class="SutonnyMJ">{{ $voter->name_bn }}</p>
            </div>
            <div>
                <label>Name (English):</label>
                <p>{{ $voter->name_en }}</p>
            </div>

            <div>
                <label>পিতার নাম (বাংলা):</label>
                <p class="SutonnyMJ">{{ $voter->fname_bn }}</p>
            </div>
            <div>
                <label>Father's Name (English):</label>
                <p>{{ $voter->fname_en }}</p>
            </div>

            <div>
                <label>মাতার নাম (বাংলা):</label>
                <p class="SutonnyMJ">{{ $voter->mname_bn }}</p>
            </div>
            <div>
                <label>Mother's Name (English):</label>
                <p>{{ $voter->mname_en }}</p>
            </div>

            <div>
                <label>জন্ম তারিখ:</label>
                <p>{{ $voter->dob }}</p>
            </div>
            <div>
                <label>রক্তের গ্রুপ:</label>
                <p>{{ $voter->blood->name }}</p>
            </div>

            <div>
                <label>ID নম্বর:</label>
                <p>{{ $voter->id_no }}</p>
            </div>
            <div>
                <label>জেলা:</label>
                <p class="SutonnyMJ">{{ $voter->district }}</p>
            </div>

            <div class="col-12">
                <label>ঠিকানা:</label>
                <p class="SutonnyMJ">{{ $voter->address }}</p>
            </div>
        </div>

        <div class="photo-signature">
            <div>
                <label>ছবি:</label><br>
                <img src="{{ asset($voter->photo->voter_photo) }}" alt="Voter Photo">
            </div>
            <div>
                <label>স্বাক্ষর:</label><br>
                <img src="{{ asset($voter->photo->voter_signature) }}" alt="Voter Signature">
            </div>
        </div>

        <div class="generate-btn">
            <a class="btn" href="{{ route('nid.generate', $voter->id) }}" type="submit">🖨️ Generate NID</a>
        </div>
    </div>
@endsection
