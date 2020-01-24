const form = document.querySelector('#changes_form');
const inputs = form.querySelectorAll('input[name]');
const changes_result = document.querySelector('#changes_result');
const modal = document.querySelector('#edit-modal');




form.addEventListener('submit', (e) => {
    e.preventDefault();


    const data = new FormData();

    for (const input of inputs) {
        const name = input.getAttribute('name');
        const value = input.value;
        data.append(name, value);
    }

    fetch('changes.php', {
        credentials: 'include',
        method: 'post',
        body: data
    }).then((data) => data.text())
        .then((data) => {
            changes_result.textContent = data;
            setTimeout(() => {
                modal.style.display = 'none';
                changes_result.textContent = '';
            }, 1000)
        }).catch((e) => {
        console.log(e)
    })
})

