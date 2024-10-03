import Dropzone from "dropzone";
const dropzoneElement = document.getElementById("dropzone");


Dropzone.autoDiscover = false;
const dropzone = new Dropzone("#dropzone", {
    acceptedFiles: ".png,.jpg,jpeg,.gif",
    maxFiles: 1,
    uploadMultiple: false,
    addRemoveLinks: true,
    init: function () {
        if (document.querySelector('[name="image"]').value.trim()) {
            const imageUploaded = {};
            imageUploaded.size = 1234;
            imageUploaded.name = document
                .querySelector('[name="image"]')
                .value.trim();
            this.options.addedfile.call(this, imageUploaded);
            this.options.thumbnail.call(
                this,
                imageUploaded,
                `/uploads/${imageUploaded.name}`
            );
            imageUploaded.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("success", function (file, response) {
    document.querySelector('[name="image"]').value = response.image;
});
dropzone.on("removedFile", function () {
    document.querySelector('[name="image"]').value = "";
});
