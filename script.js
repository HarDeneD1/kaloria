

document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('form'); 
  
    loginForm.addEventListener('submit', function (e) {
      e.preventDefault();
  
      var data = new FormData(loginForm);
  
      sendData(data, 'login.php').then(function (response) {
        if (response.success) {
          // Sikeres bejelentkezés után átirányítás
          window.location.href = 'index.html';
        } else {
          console.error('Sikertelen bejelentkezés');
        }
      });
    });
  });
  
  async function sendData(data, url) {
    try {
      const request = await fetch(url, {
        method: 'POST',
        body: data
      });
  
      const result = await request.json();
      return result;
    } catch (error) {
      console.error(error);
    }
  }
