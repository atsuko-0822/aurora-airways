function togglePassword() {
  const passwordInput = document.getElementById('password');
  const toggleEye = document.getElementById('toggleEye');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleEye.classList.remove('fa-eye');
    toggleEye.classList.add('fa-eye-slash');
  } else {
    passwordInput.type = 'password';
    toggleEye.classList.remove('fa-eye-slash');
    toggleEye.classList.add('fa-eye');
  }
}
