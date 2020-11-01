Dropzone.autoDiscover = false;
$(document).ready(function () {

    let filesNumber = 0;
    loadImages($('#fk_id_color').val());

    var $divDropzone = document.getElementById("div-drop-zone");
    var myDropzone = new Dropzone('div#div-drop-zone', {
        url: $divDropzone.dataset.url,
        dictDefaultMessage: 'Seleccione o arastre el archivo.',
        paramName: 'file',
        maxFilesize: 5,
        thumbnailMethod: 'contain',
        autoProcessQueue: false,
        acceptedFiles: '.jpg, .png, .jpeg',
        parallelUploads: 10,
        maxFiles: 5,
        addRemoveLinks: true,
        dictFileTooBig: "La imagen es demasiado grande, no debe sobrepasar los 5 MB.",
        dictInvalidFileType: "Sólo de admiten archivos JPG y PNG.",
        dictMaxFilesExceeded: "Sólo de se admiten 5 imagenes a la vez.",
        dictUploadCanceled: "Cancelar carga.",
        dictRemoveFile: 'Eliminar archivo',
        params: function () {
            return getFormData($('#files-form'));
        }
    });

    $(document).on('click', '#btn-process-queue', function () {
        if(myDropzone.files.length > 0){
            myDropzone.processQueue();
        } else {
            saveWithoutNewImages();
        }

    });

    myDropzone.on("sending", function(file, xhr, formData) {
        filesNumber++;
        formData.append("color", $('#fk_id_color').val());
        if(filesNumber === 1)
        {
            formData.append("size", $('#fk_id_size').val());
            formData.append("productId", $('#product-id').val());
            $('.images-list').children('input').each(function () {
                formData.append($(this).attr('name'), $(this).val());
            });
        }
    });

    myDropzone.on('success', function (file, response) {
        myDropzone.processQueue.bind(myDropzone);
        myDropzone.removeFile(file);
        filesNumber = 0;
        window.location.href = $('#variants-index').val();
    });

    myDropzone.on("error", function(file, response) {
        filesNumber = 0;
        myDropzone.removeFile(file);
        $('.images-error').text( typeof response.errors.images !== 'undefined' ? response.errors.images[0] : '');
    });

    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }

});

$(document).on('change', '#fk_id_color', function () {

    const colorId = $(this).val();
    loadImages(colorId);

});

$(document).on('click', '.variant-image', function () {
    const $imagesList = $('.images-list');

    let exist = false;
    const $this = $(this);

    $imagesList.children('input').each(function () {
        if($(this).val() === $this.attr('data-id')){
            $(this).remove();
            $this.removeClass('image-selected');
            exist = true;
        }
    });

    if(!exist){
        $imagesList.append('<input type="hidden" name="image-selected[]" value="'+$this.attr('data-id')+'">');
        $this.addClass('image-selected');
    }

});

function saveWithoutNewImages() {

    let imageSelected = [];
    let url = $('#create-variant').val();
    const _token = $('#inp-url-token').val();

    $('.images-list').children('input').each(function () {
        imageSelected.push($(this).val());
    });

    $.ajax({
        url: url,
        method: 'POST',
        data: {
            _token : _token,
            size: $('#fk_id_size').val(),
            color: $('#fk_id_color').val(),
            productId: $('#product-id').val(),
            "image-selected": imageSelected
        },
        beforeSend: function() {
            Swal.showLoading();
        },
        success: function (response) {
            if(response.success){
                window.location.href = $('#variants-index').val();
            }else {
                Swal.fire(
                    'Atención',
                    'Algo salió mal',
                    'error'
                );
            }

        },
        error: function (response) {
            Swal.fire(
                'Atención',
                typeof response.responseJSON.errors.images !== 'undefined' ? response.responseJSON.errors.images[0] : 'Algo salió mal',
                'error'
            );
        }
    });
}

function loadImages(colorId) {

    const url = $('#inp-url-load-images').val();
    const $imagesContainer = $('.images-container');
    const $imagesList = $('.images-list');
    const $loading = loading();

    $.ajax({
        url: url + '?colorId='+colorId,
        method: 'GET',
        beforeSend: function() {
            $imagesList.addClass('d-none');
            $imagesList.removeClass('d-flex');
            $imagesContainer.append($loading);
        },
        success: function (response) {

            const images = response.data;
            $imagesList.html('');

            if(images.length > 0){

                images.forEach(function (item) {

                    let imageElement =
                        $('<img>', {
                            src: item.absolute_image_url,
                            alt: "Imagen",
                            class: "variant-image m-3 cursor-pointer",
                            "data-id": item.id
                        });

                    $imagesList.append(imageElement);
                });
            } else {
                const text = $('<span>', {html: "No hay imagenes asociadas del color seleccionado para este modelo"});
                $imagesList.append(text);
            }

        },
        error: function () {
            Swal.fire(
                'Atención',
                'Algo salió mal, intente más tarde',
                'error'
            );
        },
        complete: function () {
            $imagesList.removeClass('d-none');
            $imagesList.addClass('d-flex');
            $loading.remove();
        }
    });

}

function loading() {
    let $container = $('<div>', {class: 'w-100 text-center py-5'});
    let $loading = $('<span>', {class: 'fas fa-5x fa-spin fa-spinner'});

    return $container.append($loading);
}

