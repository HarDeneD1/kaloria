async function loginUser(data, url) {
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
            alert('Sikeres bejelentkezés!');
            window.location.href = "index.php"
        } else {
            alert('Hibás bejelentkezés!');
        }

    } catch (error) {
        console.error(error.message);
    }
}

const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const data = new FormData(document.forms.loginForm);
    loginUser(data, 'login.php');
});
