<!-- resources/views/view/admission_form.blade.php -->

<h2>New Student Registration</h2>

<p>Hello Admin,</p>

<p>You have received a new student registration submission. Below are the details:</p>

<p><strong>Name:</strong> {{ $admissionForm->name }}</p>
<p><strong>Gender:</strong> {{ $admissionForm->gender }}</p>
<p><strong>Date of Birth:</strong> {{ $admissionForm->date_of_birth }}</p>
<p><strong>Country of Birth:</strong> {{ $admissionForm->country_of_birth }}</p>
<p><strong>Nationality:</strong> {{ $admissionForm->nationality }}</p>

<p>Thank you </p>
