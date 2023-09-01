<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Job Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .section {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 20px 0;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .section h2 {
            color: #007bff;
        }

        .strong {
            font-weight: bold;
        }

        ol {
            list-style-type: decimal;
            padding-left: 20px;
        }

        li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>School Job Application</h1>

    <div class="section">
        <h2>Applicant Personal Information</h2>
        <p><span class="strong">Name:</span> {{ $data['name'] }}</p>
        <p><span class="strong">Email:</span> {{ $data['email'] }}</p>
        <p><span class="strong">Date of Birth:</span> {{ date('d F Y', strtotime($data['date_of_birth'])) }}</p>
        <p><span class="strong">Marital Status:</span> {{ $data['marital_status'] }}</p>
        <p><span class="strong">Address:</span> {{ $data['address'] }}</p>
        <p><span class="strong">Mobile No:</span> {{ $data['mobile_no'] }}</p>
        <p><span class="strong">Phone No:</span> {{ $data['phone_no'] }}</p>
        <p><span class="strong">Landline No:</span> {{ $data['landline_no'] }}</p>
    </div>

    <!-- Add more sections for other data fields -->
    
    
    <div class="section">
        <h2>Education Information</h2>
        <p><span class="strong">Post Group:</span> {{ $data['post_group'] }}</p>
        <p><span class="strong">Post Name:</span> {{ $data['post_name'] }}</p>
        <p><span class="strong">Can Teach:</span> {{getSubjectname( $data['can_teach']) }}</p>
        <p><span class="strong">Up to Class:</span> {{ getClassName($data['upto_class']) }}</p>
    </div>

    <!-- Education Information section -->
<div class="section">
    <h2>Educational Qualifications</h2>
    
    <!-- 10th Grade Information -->
    <p><strong>10th Grade Stream:</strong> {{ $data['stream_10th'] }}</p>
    <p><strong>10th Grade Subject:</strong> {{ getSubjectname( $data['subject_10th'] )}}</p>
    <p><strong>10th Grade University:</strong> {{ $data['university_10th'] }}</p>
    <p><strong>10th Grade Percentage:</strong> {{ $data['percentage_10th'] }}%</p>
    
    <!-- 12th Grade Information -->
    <p><strong>12th Grade Stream:</strong> {{ $data['stream_12'] }}</p>
    <p><strong>12th Grade Subject:</strong> {{  getSubjectname($data['subject_12'] )}}</p>
    <p><strong>12th Grade University:</strong> {{ $data['university_12'] }}</p>
    <p><strong>12th Grade Percentage:</strong> {{ $data['percentage_12'] }}%</p>
    
    <!-- Graduation Information -->
    <p><strong>Graduation Stream:</strong> {{ $data['stream_graduation'] }}</p>
    <p><strong>Graduation Subject:</strong> {{ getSubjectname( $data['subject_graduation'] )}}</p>
    <p><strong>Graduation University:</strong> {{ $data['university_graduation'] }}</p>
    <p><strong>Graduation Percentage:</strong> {{ $data['percentage_graduation'] }}%</p>
    
    <!-- Post Graduation Information -->
    <p><strong>Post Graduation Stream:</strong> {{ $data['stream_post_graduation'] }}</p>
    <p><strong>Post Graduation Subject:</strong> {{  getSubjectname($data['subject_post_graduation'] )}}</p>
    <p><strong>Post Graduation University:</strong> {{ $data['university_post_graduation'] }}</p>
    <p><strong>Post Graduation Percentage:</strong> {{ $data['percentage_post_graduation'] }}%</p>
    
    <!-- B.Ed Information -->
    <p><strong>B.Ed Stream:</strong> {{ $data['stream_bed'] }}</p>
    <p><strong>B.Ed Subject:</strong> {{  getSubjectname($data['subject_bed'] )}}</p>
    <p><strong>B.Ed University:</strong> {{ $data['university_bed'] }}</p>
    <p><strong>B.Ed Percentage:</strong> {{ $data['percentage_bed'] }}%</p>
</div>

    <!-- Add more sections for education data -->

    <div class="section">
        <h2>Experiences</h2>
        <ol>
            @foreach ($experiencedata as $experience)
                <li>
                    <p><span class="strong">Institution Name:</span> {{ $experience['institution_name'] }}</p>
                    <p><span class="strong">Period From:</span> {{ date('d F Y', strtotime($experience['experience_period_from'])) }}</p>
                    <p><span class="strong">Period To:</span> {{ date('d F Y', strtotime($experience['experience_period_to'])) }}</p>
                </li>
            @endforeach
        </ol>
    </div>
    <div class="section">
        <h2>Photo</h2>
        <img src="{{ asset('storage/uploads/application/' . $data['photo']) }}" alt="Applicant Photo" style="max-width: 25%;">
    </div>
    <!-- Add more sections for other data fields -->

</body>
</html>
