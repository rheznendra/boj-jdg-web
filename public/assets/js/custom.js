if ($(".is-invalid").length) {
    $("html, body").animate(
        {
            scrollTop: $(".is-invalid").offset().top - 15,
        },
        500
    );
}

if ($(".summernote-custom").length) {
    $(".summernote-custom").summernote({
        toolbar: [
            ["style", ["bold", "italic", "underline", "clear"]],
            ["font", ["strikethrough", "superscript", "subscript"]],
            ["fontsize", ["fontsize"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["view", ["codeview"]],
        ],
        minHeight: 250,
    });
}

if ($(".custom-file-input").length) {
    bsCustomFileInput.init();
}
