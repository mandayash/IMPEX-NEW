<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Impex Helper</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('aset/logo-zoom.png') }}">
</head>
<body>
  <header class="signup-header">
    {{-- <a href="{{ url('/') }}" class="signup-back-button">
        <img src="{{ asset('aset/back.png') }}" alt="Back" />
    </a> --}}
    <div class="signup-header-content">
      <img src="{{ asset('aset/logo-zoom.png') }}"alt="Impex Helper Logo" class="signup-logo">
      <h1 class="signup-header-title">Welcome to Impex Helper!</h1>
    </div>
  </header>
  <div class="signup-container">
    <div class="signup-form-container">
      <h2>Create Account</h2>
      <br>
      <form class="signup-create-account-form">
        <input type="text" placeholder="Name" required>
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Password" required>
        <select required>
          <option value="" disabled selected>Country</option>
          <option value="Indonesia">Indonesia</option>
          <option value="Malaysia">malaysia</option>
          <option value="Singapore">Singapore</option>
          <option value="Vietnam">Vietnam</option>
          <option value="Laos">Laos</option>
          <option value="Kamboja">Kamboja</option>
          <option value="Timor Leste">Timor Leste</option>
          <option value="Thailand">Thailand</option>
          <option value="Brunei Darussalam">Brunei Darussalam</option>
          <option value="Myanmar">Myanmar</option>
          <option value="Phillippines">Phillippines</option>
        </select>
        <div class="signup-birth-info">
          <input type="text" placeholder="Place of Birth" required>
          <input type="date" required>
        </div>
        <input type="tel" placeholder="Phone Number" required>
        <button type="submit">Create Account</button>
        <p>Already Have An Account? <a href="#">Log In</a></p>
      </form>
    </div>
  </div>
</body>
</html>




