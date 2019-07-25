Dropzone.autoDiscover = false;
myDropzone = new Dropzone('div#imageUpload', {
    addRemoveLinks: true,
    autoProcessQueue: true,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 3,
    paramName: 'file',
    params: {},
    clickable: true,
    url: APP_URL+'/admin/media/add',
    init: function () {

        var myDropzone = this;
        // Update selector to match your button
        $btn.click(function (e) {
            e.preventDefault();
            if ( $form.valid() ) {
                myDropzone.processQueue();
            }
            return false;
        });

        this.on('sending', function (file, xhr, formData) {
            // Append all form inputs to the formData Dropzone will POST
            var data = $form.serializeArray();
            $.each(data, function (key, el) {
                formData.append(el.name, el.value);
            });
            console.log(formData);

        });
    },
    error: function (file, response){
        if ($.type(response) === "string")
            var message = response; //dropzone sends it's own error messages in string
        else
            var message = response.message;
        file.previewElement.classList.add("dz-error");
        _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
        _results = [];
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i];
            _results.push(node.textContent = message);
        }
        return _results;
    },
    successmultiple: function (file, response) {
        console.log(file, response);
        $modal.modal("show");
    },
    completemultiple: function (file, response) {
        console.log(file, response, "completemultiple");
        //$modal.modal("show");
    },
    reset: function () {
        console.log("resetFiles");
        this.removeAllFiles(true);
    }
});

