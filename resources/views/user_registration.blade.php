<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>User Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
    h1, h2, h3, h4, h5, h6 {
      font-family: 'Nunito', sans-serif;
    }

    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-light" style="background: linear-gradient(to bottom, #a1d6e2, #85cdc2,#aed6d7,#d0d5b9,#d6d5b4,#f2d59c,#f3ce9d,#f7b5a1);">

  <h1 class="mt-5 ps-4 display-3 fw-bold">Join Aurora Club!</h1>

  <div class="container mt-3 mb-3">
    <div class="mx-auto p-4 bg-white rounded-4 shadow" style="max-width: 600px;">
      <form>
        <div class="mb-3">
          <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="email" required />
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="password" required />
        </div>

        <div class="mb-3">
          <label for="retypePassword" class="form-label">Retype Password <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="retypePassword" required />
        </div>

        <div class="mb-3">
          <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="fullName" required />
        </div>

        <div class="mb-3">
          <label for="phoneNumber" class="form-label">Phone Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="phoneNumber" required />
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="address" required />
        </div>

        <div class="mb-3">
          <label for="passportNumber" class="form-label">Passport Number <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="passportNumber" required />
        </div>

        <div class="mb-3">
          <label for="emergencyContactName" class="form-label">Emergency Contact (Name) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="emergencyContactName" required />
        </div>

        <div class="mb-3">
          <label for="emergencyContactPhone" class="form-label">Emergency Contact (Phone) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="emergencyContactPhone" required />
        </div>

        <p class="text-secondary small"><span class="text-danger">*</span> are required</p>

        <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold text-white" style="background-color: #b7dee8; width: 200px;">Register</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
