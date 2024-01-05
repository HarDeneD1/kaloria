document.addEventListener('DOMContentLoaded', function () {
    const kaloriaForm = document.getElementById('kaloriaForm');

    kaloriaForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const nevInput = document.getElementById('nev');
        const kaloriaInput = document.getElementById('kaloria');
        const napInput = document.getElementById('nap');

        const nev = nevInput.value;
        const kaloria = kaloriaInput.value;
        const nap = napInput.value;

        const data = new FormData();
        data.append('nev', nev);
        data.append('kaloria', kaloria);
        data.append('nap', nap);

        try {
            const request = await fetch('save_food.php', {
                method: 'POST',
                body: data
            });

            const result = await request.json();

            if (result.success) {
                alert('Étel sikeresen hozzáadva!');
                
                nevInput.value = '';
                kaloriaInput.value = '';
                napInput.value = '';
            } else {
                alert('Hiba az étel hozzáadása során:', result.error);
            }
        } catch (error) {
            console.error('Hiba az adatküldés során:', error);
            alert('Hiba történt az adatküldés során.');
        }
    });
});
