const title = document.querySelector("#title");
const slug = document.querySelector("#slug");

// fetch API untuk mendapatkan slug dari title
title.addEventListener("change", function () {
    fetch("/dashboard/post/fetchSlug?title=" + title.value)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            slug.value = data.slug;
        });
});

// Hilangkan fitur upload files pada trix sementara
document.addEventListener("trix-file-accept", function (e) {
    e.preventDefault();
});

// function untuk menampilkan preview image sementara sebelum diupload oleh user
function previewImage() {
    const image = document.querySelector("#image");
    const imgPreview = document.querySelector(".img-preview");
    imgPreview.style.display = "block";

    // const oFReader = new FileReader();
    // oFReader.readAsDataURL(image.files[0]);
    // oFReader.onload = function (oFREvent) {
    //     imgPreview.src = oFREvent.target.result;
    //     console.log(imgPreview);
    // };

    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;
}
