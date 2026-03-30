function addFields(sectionId) {
    const section = document.getElementById(sectionId);
    const wrapper = section.querySelector('.dynamic-wrapper');
    const originalEntry = wrapper.querySelector('.entry');

    const newEntry = originalEntry.cloneNode(true);


    const inputs = newEntry.querySelectorAll('input, textarea');
    inputs.forEach(input => input.value = '');


    wrapper.appendChild(newEntry);
}

function addFields(sectionId) {
    const section = document.getElementById(sectionId);
    const wrapper = section.querySelector('.dynamic-wrapper');
    const originalEntry = wrapper.querySelector('.entry');
    const newEntry = originalEntry.cloneNode(true);
    const inputs = newEntry.querySelectorAll('input, textarea');
    inputs.forEach(input => input.value = '');
    wrapper.appendChild(newEntry);
}

document.getElementById('imageInput').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById('imagePreview');

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; e
        }

        reader.readAsDataURL(file);
    } else {
        preview.src = "#";
        preview.style.display = 'none';
    }
});