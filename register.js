async function registerUser(data, url) {
  try {
      const request = await fetch(url, {
          method: 'POST',
          body: data
      });

      if (!request.ok) {
          throw new Error(`HTTP hiba! Státusz: ${request.status}`);
      }

      const result = await request.json();
      console.log(result);

      if (result.success) {
          alert('Sikeres regisztráció!');
          window.location.href= "login.html";
          
      } else {
          alert('Hibás regisztráció!');
      }

  } catch (error) {
      console.error(error.message);
  }
}

const registerForm = document.getElementById('registerForm');

registerForm.addEventListener('submit', function (e) {
  e.preventDefault();

  const data = new FormData(document.forms.registerForm);
  registerUser(data, 'register.php');
});
